<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use App\Models\SurveyModel;


class AdminController extends BaseController
{
    private function isSessionActive(): bool
    {
        $session = session();
        return $session->has('logged_in') && $session->get('logged_in') === true && $session->has('active') && $session->get('active') === true;
    }

    private function hasRole($requiredRole): bool
    {
        $session = session();
        return $session->has('role') && $session->get('role') === $requiredRole;
    }

    private function authorize($requiredRole): bool
    {
        return $this->isSessionActive() && $this->hasRole($requiredRole);
    }

    private function redirectUnauthorized(): RedirectResponse
    {
        return redirect()->to('/')->with('error', 'Access denied');
    }

    public function HolidayAdminDashboard()
    {
        if (!$this->authorize('super_admin')) {
            return $this->redirectUnauthorized();
        }
    
        $surveyModel = new SurveyModel();
        $data = [];
    
        // Fetch general data
        $data['total_responses'] = $surveyModel->countAllResults();
        $data['avg_age'] = $this->getAverageAge($surveyModel);
        $data['interested_in_income'] = $surveyModel->where('additional_income', 'Yes')->countAllResults();
    
        // Fetch data for house type chart
        list($data['house_types'], $data['house_counts'], $data['house_percentages']) = $this->getHouseTypeData($surveyModel, $data['total_responses']);
    
        // Fetch data for additional income interest chart
        list($data['income_interest_labels'], $data['income_interest_counts']) = $this->getIncomeInterestData($surveyModel);
    
        // Fetch gender data
        list($data['male_count'], $data['female_count'], $data['other_count'], $data['male_percentage'], $data['female_percentage'], $data['other_percentage']) = $this->getGenderData($surveyModel, $data['total_responses']);
    
        // Fetch recent entries count
        $data['recent_entries_count'] = $surveyModel->where('created_at >=', date('Y-m-d H:i:s', strtotime('-1 day')))->countAllResults();
    
        // Fetch most interested districts
        $data['interested_districts'] = $this->getInterestedDistricts($surveyModel);
    
        // Example of current online users, assuming it comes from another source
        $data['current_online'] = 80;

        // Pagination settings
        $perPage = 5; // Number of entries per page
        $page = $this->request->getVar('page') ?: 1; // Get the current page or default to 1

        // Fetch recent survey entries as activities with pagination
        $recentActivities = $surveyModel->orderBy('created_at', 'DESC')
                                        ->paginate($perPage, 'default', $page);

        $pager = $surveyModel->pager;

        $data['recent_activities'] = $recentActivities;
        $data['pager'] = $pager;
        $data['current_page'] = $page;
        $data['per_page'] = $perPage;
    
        // Load header and dashboard views
        echo view('holidaycity/admin_header');
        echo view('holidaycity/admin_dashboard', $data);
    }
    
    private function getAverageAge($surveyModel)
    {
        $avgAgeData = $surveyModel->select('AVG(age) as avg_age')->first();
        return $avgAgeData ? round($avgAgeData['avg_age'], 2) : 'N/A';
    }
    
    private function getHouseTypeData($surveyModel, $totalResponses)
    {
        $houseTypeData = $surveyModel->select('house_type, COUNT(*) as count')
                                     ->groupBy('house_type')
                                     ->findAll();
    
        $houseTypes = ['Villa', 'Farm house', 'Resort', 'Any Other'];
        $houseCounts = array_fill(0, count($houseTypes), 0);
    
        foreach ($houseTypeData as $houseData) {
            switch ($houseData['house_type']) {
                case 'Villa':
                    $houseCounts[0] += $houseData['count'];
                    break;
                case 'Farm house':
                    $houseCounts[1] += $houseData['count'];
                    break;
                case 'Resort':
                    $houseCounts[2] += $houseData['count'];
                    break;
                default:
                    $houseCounts[3] += $houseData['count'];
                    break;
            }
        }
    
        $housePercentages = array_map(function($count) use ($totalResponses) {
            return $totalResponses > 0 ? round(($count / $totalResponses) * 100, 2) : 0;
        }, $houseCounts);
    
        return [$houseTypes, $houseCounts, $housePercentages];
    }
    
    private function getIncomeInterestData($surveyModel)
    {
        $incomeInterestData = $surveyModel->select('additional_income, COUNT(*) as count')
                                          ->groupBy('additional_income')
                                          ->findAll();
    
        $incomeInterestLabels = [];
        $incomeInterestCounts = [];
        foreach ($incomeInterestData as $incomeData) {
            $incomeInterestLabels[] = $incomeData['additional_income'];
            $incomeInterestCounts[] = $incomeData['count'];
        }
    
        return [$incomeInterestLabels, $incomeInterestCounts];
    }
    
    private function getGenderData($surveyModel, $totalResponses)
    {
        $maleCount = $surveyModel->where('gender', 'Male')->countAllResults();
        $femaleCount = $surveyModel->where('gender', 'Female')->countAllResults();
        $otherCount = $surveyModel->where('gender', 'Other')->countAllResults();
    
        $malePercentage = $totalResponses > 0 ? round(($maleCount / $totalResponses) * 100, 2) : 0;
        $femalePercentage = $totalResponses > 0 ? round(($femaleCount / $totalResponses) * 100, 2) : 0;
        $otherPercentage = $totalResponses > 0 ? round(($otherCount / $totalResponses) * 100, 2) : 0;
    
        return [$maleCount, $femaleCount, $otherCount, $malePercentage, $femalePercentage, $otherPercentage];
    }
    
    private function getInterestedDistricts($surveyModel)
    {
        return $surveyModel->select('interested_district, COUNT(*) as count')
                           ->groupBy('interested_district')
                           ->orderBy('count', 'DESC')
                           ->findAll(4); // Fetch top 4 interested districts
    }

    public function HealthcareAdminDashboard()
    {
        if ($this->authorize('super_admin')) {
            return view('healthcare/admin_dashboard');
        } else {
            return $this->redirectUnauthorized();
        }
    }
}
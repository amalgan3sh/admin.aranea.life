<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use App\Models\SurveyModel;
use App\Models\RecentActivityModel;
use App\Models\SupportRequestModel;
use App\Models\InvestmentRequestModel;
use App\Models\ProductHoldingsModel;
use App\Models\KycModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\QuotationModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use CodeIgniter\Email\Email;


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
        $db = \Config\Database::connect();
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

        list($data['gender_labels'], $data['gender_counts']) = $this->getGenderChartData($surveyModel);

    
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
    
        // Fetch most interested districts with pagination
        $interestedDistricts = $surveyModel->select('interested_district, COUNT(*) as count')
                                           ->groupBy('interested_district')
                                           ->orderBy('count', 'DESC')
                                           ->paginate($perPage, 'districts', $page);
    
        $pager = $surveyModel->pager;
    
        $data['recent_activities'] = $recentActivities;
        $data['interested_districts'] = $interestedDistricts;
        $data['pager'] = $pager;
        $data['current_page'] = $page;
        $data['recent_entries_count'] = $surveyModel->where('created_at >=', date('Y-m-d H:i:s', strtotime('-1 day')))->countAllResults();
        $data['per_page'] = $perPage;
    
        // Fetch data from the database with corrected syntax
        $data['villaSessions'] = $surveyModel->where('house_type', 'Villa')->countAllResults();
        $data['farmHouseSessions'] = $surveyModel->where('house_type', 'Farm House')->countAllResults();
        $data['resortSessions'] = $surveyModel->where('resort_type IS NOT NULL', null, false)->countAllResults();
        $data['anyOtherSessions'] = $surveyModel->whereNotIn('house_type', ['Villa', 'Farm House'])->countAllResults();
    
        // Simulating previous period data for demonstration
        $data['prevVillaSessions'] = ['sessions' => 56, 'percentage' => 28];
        $data['prevFarmHouseSessions'] = ['sessions' => 98, 'percentage' => 37];
        $data['prevResortSessions'] = ['sessions' => 45, 'percentage' => 22];
        $data['prevAnyOtherSessions'] = ['sessions' => 25, 'percentage' => 13];
    
        // Fetch demographic data from the existing table
        $data['demographics'] = $this->getDemographics($db);
    
        // Load header and dashboard views
        echo view('holidaycity/admin_header');
        echo view('holidaycity/admin_dashboard', $data);
    }

    private function getDemographics($surveyModel)
    {
        $db = \Config\Database::connect();

        // Query to get gender distribution
        $genderQuery = $db->query("
            SELECT 
                gender AS category,
                COUNT(*) AS count,
                (COUNT(*) * 100 / (SELECT COUNT(*) FROM survey_responses)) AS percentage
            FROM survey_responses
            GROUP BY gender
        ");

        // Query to get age distribution
        $ageQuery = $db->query("
            SELECT 
                CASE 
                    WHEN age BETWEEN 18 AND 25 THEN '18-25 Age Group' 
                    WHEN age BETWEEN 26 AND 35 THEN '26-35 Age Group' 
                    ELSE 'Other Age Group'
                END AS category,
                COUNT(*) AS count,
                (COUNT(*) * 100 / (SELECT COUNT(*) FROM survey_responses)) AS percentage
            FROM survey_responses
            GROUP BY category
        ");

        return array_merge($genderQuery->getResultArray(), $ageQuery->getResultArray());
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
        $data = [
            'recent_activity' => (new RecentActivityModel())->getRecentActivityWithUser(),
            'support_requests' => (new SupportRequestModel())->getSupportRequestsFromSecondDb(),
            
        ];

        if ($this->authorize('super_admin')) {
            return view('healthcare/admin_dashboard',$data);
        } else {
            return $this->redirectUnauthorized();
        }
    }
    public function InvestmentRequest()
    {
        $data = [
            'invest_requests' => (new InvestmentRequestModel())->getInvestmentRequestsFromSecondDb(),
        ];
        log_message('info', 'Data passed to view: ' . json_encode($data['invest_requests']));
        if ($this->authorize('super_admin')) {
            return view('healthcare/investment_request',$data);
        } else {
            return $this->redirectUnauthorized();
        }
    }

    public function approveKyc(){
        $data = [
            'kyc_details' => (new KycModel())->getKycDetails(),
        ];
        log_message('info', 'Data passed to view: ' . json_encode($data['kyc_details']));
        if ($this->authorize('super_admin')) {
            return view('healthcare/approve_kyc',$data);
        } else {
            return $this->redirectUnauthorized();
        }
    }


    public function approve()
    {
        // Load the necessary models
        $investmentRequestModel = new InvestmentRequestModel();
        $productHoldingsModel = new ProductHoldingsModel();

        // Get POST data
        $investmentId = $this->request->getPost('investment_id');
        $userId = $this->request->getPost('user_id');
        $productId = $this->request->getPost('product_id');

        // Define other necessary variables for the product_holdings table
        $holdingValue = $this->request->getPost('holding_value');
        $changePercentage = $this->request->getPost('change_percentage');
        $weekChange = $this->request->getPost('week_change');
        $favorite = $this->request->getPost('favorite');
        $investmentAmount = $this->request->getPost('investment_amount');
        $dateOfInvestment = $this->request->getPost('date_of_investment');

        // Update the investment request status
        $updateStatus = $investmentRequestModel->updateInvestmentRequestStatus($investmentId, ['status' => 'approved']);
        
        // Check if the update was successful
        if (!$updateStatus) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update investment request status.']);
        }

        // Prepare data for the product_holdings table
        $data = [
            'product_id' => $productId,
            'user_id' => $userId,
            'holding_value' => $holdingValue,
            'change_percentage' => $changePercentage,
            'week_change' => $weekChange,
            'favorite' => $favorite,
            'investment_amount' => $investmentAmount,
            'date_of_investment' => $dateOfInvestment,
        ];

        // Insert into product_holdings table
        if ($productHoldingsModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Investment request approved successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to insert into product_holdings.']);
        }
    }
    public function reject()
    {
        // Load the necessary models
        $investmentRequestModel = new InvestmentRequestModel();
        $productHoldingsModel = new ProductHoldingsModel();

        // Get POST data
        $investmentId = $this->request->getPost('investment_id');
        $userId = $this->request->getPost('user_id');
        $productId = $this->request->getPost('product_id');

        // Define other necessary variables for the product_holdings table
        $holdingValue = $this->request->getPost('holding_value');
        $changePercentage = $this->request->getPost('change_percentage');
        $weekChange = $this->request->getPost('week_change');
        $favorite = $this->request->getPost('favorite');
        $investmentAmount = $this->request->getPost('investment_amount');
        $dateOfInvestment = $this->request->getPost('date_of_investment');

        // Update the investment request status
        $updateStatus = $investmentRequestModel->updateInvestmentRequestStatus($investmentId, ['status' => 'rejected']);
        
        // Check if the update was successful
        if (!$updateStatus) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update investment request status.']);
        }

        // Prepare data for the product_holdings table
        $data = [
            'product_id' => $productId,
            'user_id' => $userId,
            'holding_value' => $holdingValue,
            'change_percentage' => $changePercentage,
            'week_change' => $weekChange,
            'favorite' => $favorite,
            'investment_amount' => $investmentAmount,
            'date_of_investment' => $dateOfInvestment,
        ];

        
        return $this->response->setJSON(['status' => 'success', 'message' => 'Investment request rejected successfully.']);
        
    }


    private function getGenderChartData($surveyModel)
    {
        $genderData = $surveyModel->select('gender, COUNT(*) as count')
                                ->groupBy('gender')
                                ->findAll();

        $genderLabels = [];
        $genderCounts = [];
        foreach ($genderData as $gender) {
            $genderLabels[] = $gender['gender'];
            $genderCounts[] = $gender['count'];
        }

        return [$genderLabels, $genderCounts];
    }

    public function kycApprove()
    {
        // Load the necessary models
        $kycModel = new KycModel();
        $userModel = new UserModel();

        // Get POST data
        $kycId = $this->request->getPost('kyc_id');
        $userId = $this->request->getPost('user_id');

        // Update the investment request status
        $updateStatus = $kycModel->updateKycStatus($kycId, ['status' => 'approved']);
        $userModel->updateKycStatus($userId, ['kyc_verify' => 'approved']);
        
        // Check if the update was successful
        if (!$updateStatus) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'KYC Request Approval Failed.']);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'KYC request rejected successfully.']);
    }
    public function kycReject()
    {
        // Load the necessary models
        $kycModel = new KycModel();
        $userModel = new UserModel();

        // Get POST data
        $kycId = $this->request->getPost('kyc_id');
        $userId = $this->request->getPost('user_id');

        // Update the investment request status
        $updateStatus = $kycModel->updateKycStatus($kycId, ['status' => 'rejected']);
        $userModel->updateKycStatus($userId, ['kyc_verify' => 'rejected']);
        
        // Check if the update was successful
        if (!$updateStatus) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'KYC Request Rejection Failed.']);
        }

        
        return $this->response->setJSON(['status' => 'success', 'message' => 'KYC request rejected successfully.']);
        
    }

    function ProductListing(){

        $productModel = new ProductModel();        
        $data = [];

        $data['product_list'] = $productModel->getManufacturerProductsList();

        return view('healthcare/product_listing', $data);
    }


    public function ProductApproveSubmit() {

        $productModel = new ProductModel();      

        $productId = $this->request->getPost('product_id');
        $userId = $this->request->getPost('user_id');
        $reason = $this->request->getPost('status_description');
        
        // Add validation if necessary
        if (empty($productId) || empty($userId) || empty($reason)) {
            return $this->response->setJSON(['success' => false, 'message' => 'All fields are required.']);
        }

        // Call your model to save the approval information
        $success = $productModel->approveProduct($productId, $userId, $reason);

        if ($success) {
            // $this->copyProductDataToProductData($productId);
            return $this->response->setJSON(['success' => true, 'message' => 'Product Approved.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Unable to Approve Product.']);
        }
    }

    public function ProductRejectSubmit() {

        $productModel = new ProductModel();      

        $productId = $this->request->getPost('product_id');
        $userId = $this->request->getPost('user_id');
        $reason = $this->request->getPost('status_description');
        
        // Add validation if necessary
        if (empty($productId) || empty($userId) || empty($reason)) {
            return $this->response->setJSON(['success' => false, 'message' => 'All fields are required.']);
        }

        // Call your model to save the reject information
        $success = $productModel->rejectProduct($productId, $userId, $reason);

        if ($success) {
            return $this->response->setJSON(['success' => true, 'message' => 'Product Rejected.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Unable to Reject Product.']);
        }
    }

    public function ViewOrders(){
        $orderModel = new OrderModel();        
        $data = [];

        $data['orders'] = $orderModel->getOrdersWithProductNames();

        return view('healthcare/orders', $data);
    }

    public function createQuotation()
    {
        $orderId = $this->request->getPost('order_id');
        
        // Load the Order model and retrieve the order by ID
        $orderModel = new OrderModel();
        $order = $orderModel->find($orderId);
    
        // If the order is not found, return an error message
        if (!$order) {
            return $this->response->setJSON(['message' => 'Order not found.']);
        }
    
        // Check if a quotation already exists for this order
        $quotationModel = new QuotationModel();
        $existingQuotation = $quotationModel->where('order_id', $orderId)->first();
    
        if ($existingQuotation) {
            // If a quotation exists, show a popup message saying quotation already created
            return $this->response->setJSON(['message' => 'Quotation already created for this order.']);
        }
    
        // If no quotation exists, proceed to create a new one
        $orderModel->update($orderId, ['status' => 'quoted']);
    
        // Prepare the quotation data
        $quotationData = [
            'order_id' => $order['order_id'],
            'user_id' => $order['user_id'],
            'product_names' => $order['order_items'],
            'total_amount' => $order['total_amount'],
            'status' => 'quoted', // Initial status
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        // Save the new quotation to the database
        $quotationModel->insert($quotationData);
    
        // Return a success message
        return $this->response->setJSON(['message' => 'Quotation created successfully!']);
    }

    public function rejectOrder()
    {
        $orderId = $this->request->getPost('order_id');
        $reason = $this->request->getPost('reason');

        if ($orderId) {
            $orderModel = new OrderModel();
            $result = $orderModel->rejectOrder($orderId, $reason);

            if ($result) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Order rejected successfully.']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to reject the order.']);
            }
        }

        return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Invalid order ID.']);
    }

    public function viewQuotationPdf($orderId)
    {
        // Fetch the order data
        $order = $this->getOrderData($orderId);
        
        if (!$order) {
            log_message('error', 'Order not found. Order ID: ' . $orderId);
            return $this->response->setJSON(['message' => 'Order not found.']);
        }
    
        // Generate and stream the PDF
        $this->generateAndStreamPdf($order);
    }

    private function generateAndStreamPdf($order)
    {
        try {
            $dompdf = new Dompdf();
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $dompdf->setOptions($options);

            // Create HTML content for the PDF
            $html = $this->generatePdfHtml($order);

            // Load HTML content into Dompdf
            $dompdf->loadHtml($html);

            // Set paper size
            $dompdf->setPaper('A4', 'portrait');

            // Render the PDF
            $dompdf->render();

            // Output the PDF directly to the browser
            $dompdf->stream('quotation_' . esc($order['order_id']) . '.pdf', ['Attachment' => 0]);
        } catch (\Exception $e) {
            log_message('error', 'Error generating and streaming PDF for Order ID: ' . esc($order['order_id']) . '. Error: ' . $e->getMessage());
        }
    }
    
    public function notifyClient()
    {
        // Get order and user details
        $orderId = $this->request->getPost('order_id');
        $userId = $this->request->getPost('user_id');
    
        // Fetch the order and user data
        $order = $this->getOrderData($orderId);
        $user = $this->getUserData($userId);
    
        if (!$order || !$user) {
            log_message('error', 'Order or User not found. Order ID: ' . $orderId . ', User ID: ' . $userId);
            return $this->response->setJSON(['message' => 'Order or User not found.']);
        }
    
        // Generate the PDF and save it to a temporary path
        $pdfPath = $this->generatePdf($order);
        
        if (!$pdfPath) {
            log_message('error', 'Failed to generate PDF for Order ID: ' . $orderId);
            return $this->response->setJSON(['message' => 'Failed to generate PDF.']);
        }
    
        // Send email with PDF attachment
        $emailStatus = $this->sendEmailWithAttachment($user, $pdfPath);
    
        if ($emailStatus) {
            log_message('info', 'Quotation email sent to user: '.json_encode($user));
            
            // Update the order status to 'quoted'
            $this->updateOrderStatus($orderId);
    
            // Delete the temporary PDF
            unlink($pdfPath);
    
            return $this->response->setJSON(['message' => 'Quotation has been emailed to the client.']);
        } else {
            log_message('error', 'Failed to send email for Order ID: ' . $orderId . ' to User ID: ' . $userId);
            return $this->response->setJSON(['message' => 'Failed to send email.']);
        }
    }
    
    private function getOrderData($orderId)
    {
        $orderModel = new OrderModel();
        return $orderModel->find($orderId);
    }
    
    private function getUserData($userId)
    {
        $userModel = new UserModel();
        return $userModel->find($userId);
    }
    
    private function generatePdf($order)
    {
        try {
            $dompdf = new Dompdf();
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $dompdf->setOptions($options);
    
            // Create HTML content for the PDF
            $html = $this->generatePdfHtml($order);
    
            // Load HTML content into Dompdf
            $dompdf->loadHtml($html);
    
            // Set paper size
            $dompdf->setPaper('A4', 'portrait');
    
            // Render the PDF
            $dompdf->render();
    
            // Save the PDF file to a temp path
            $pdfOutput = $dompdf->output();
            $tempPdfPath = WRITEPATH . 'uploads/quotation_' . esc($order['order_id']) . '.pdf';
            file_put_contents($tempPdfPath, $pdfOutput);
    
            return $tempPdfPath;
        } catch (\Exception $e) {
            log_message('error', 'Error generating PDF for Order ID: ' . esc($order['order_id']) . '. Error: ' . $e->getMessage());
            return false;
        }
    }
    
    private function generatePdfHtml($order) {
        // Check if the necessary fields exist, else provide default values
        $order['company_logo'] = isset($order['company_logo']) ? $order['company_logo'] : 'default-logo.png';
        $order['company_address'] = isset($order['company_address']) ? $order['company_address'] : 'No address available';
        $order['company_email'] = isset($order['company_email']) ? $order['company_email'] : 'contact@company.com';
        $order['company_phone'] = isset($order['company_phone']) ? $order['company_phone'] : 'Not Provided';
        $order['header_text'] = isset($order['header_text']) ? $order['header_text'] : 'Quotation Details';
        $order['quotation_number'] = isset($order['quotation_number']) ? $order['quotation_number'] : 'N/A';
        $order['quotation_date'] = isset($order['quotation_date']) ? $order['quotation_date'] : date('Y-m-d');
        $order['valid_date'] = isset($order['valid_date']) ? $order['valid_date'] : date('Y-m-d', strtotime('+30 days'));
        $order['bill_from_name'] = isset($order['bill_from_name']) ? $order['bill_from_name'] : 'Company Name';
        $order['bill_from_address'] = isset($order['bill_from_address']) ? $order['bill_from_address'] : 'Company Address';
        $order['bill_from_email'] = isset($order['bill_from_email']) ? $order['bill_from_email'] : 'billing@company.com';
        $order['bill_from_phone'] = isset($order['bill_from_phone']) ? $order['bill_from_phone'] : 'Not Provided';
        $order['bill_to_name'] = isset($order['bill_to_name']) ? $order['bill_to_name'] : 'Customer Name';
        $order['bill_to_address'] = isset($order['bill_to_address']) ? $order['bill_to_address'] : 'Customer Address';
        $order['bill_to_email'] = isset($order['bill_to_email']) ? $order['bill_to_email'] : 'customer@domain.com';
        $order['bill_to_phone'] = isset($order['bill_to_phone']) ? $order['bill_to_phone'] : 'Not Provided';
        $order['subtotal'] = isset($order['subtotal']) ? $order['subtotal'] : 0.00;
        $order['tax'] = isset($order['tax']) ? $order['tax'] : 0.00;
        $order['discount'] = isset($order['discount']) ? $order['discount'] : 0.00;
        $order['total'] = isset($order['total']) ? $order['total'] : 0.00;
        $order['terms_conditions'] = isset($order['terms_conditions']) ? $order['terms_conditions'] : 'No terms and conditions available.';
        
        // Start building the HTML
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 20px;
                    color: #333;
                }
                .header {
                    display: flex;
                    margin-bottom: 30px;
                }
                .logo-section {
                    flex: 1;
                }
                .logo-section img {
                    max-width: 200px;
                    height: auto;
                }
                .header-text {
                    flex: 1;
                    background-color: #00A651;
                    color: white;
                    padding: 15px;
                }
                .title {
                    font-size: 24px;
                    font-weight: bold;
                    color: #333;
                    border-bottom: 2px solid #00A651;
                    padding-bottom: 10px;
                    margin-bottom: 20px;
                }
                .quote-info {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 20px;
                }
                .bill-section {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 30px;
                }
                .bill-box {
                    width: 48%;
                }
                .bill-header {
                    background-color: #00A651;
                    color: white;
                    padding: 8px 15px;
                    font-weight: bold;
                }
                .bill-content {
                    padding: 15px;
                    border: 1px solid #ddd;
                }
                .items-table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                .items-table th {
                    background-color: #00A651;
                    color: white;
                    padding: 10px;
                    text-align: left;
                }
                .items-table td {
                    padding: 10px;
                    border: 1px solid #ddd;
                }
                .totals {
                    float: right;
                    width: 300px;
                }
                .totals-row {
                    display: flex;
                    justify-content: space-between;
                    padding: 5px 0;
                    border-bottom: 1px solid #ddd;
                }
                .total {
                    background-color: #00A651;
                    color: white;
                    padding: 5px;
                }
                .terms {
                    margin-top: 40px;
                    font-size: 14px;
                }
                .footer {
                    text-align: center;
                    margin-top: 30px;
                    font-size: 14px;
                }
                .website {
                    text-align: center;
                    margin-top: 20px;
                    color: #666;
                    letter-spacing: 2px;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <div class="logo-section">
                    <img src="' . esc($order['company_logo']) . '" alt="Company Logo">
                </div>
                <div class="header-text">
                    ' . esc($order['header_text']) . '
                </div>
            </div>
    
            <div class="title">SALES QUOTATION</div>
    
            <div class="quote-info">
                <div class="company-details">
                    ' . esc($order['company_address']) . '<br>
                    ' . esc($order['company_email']) . '<br>
                    ' . esc($order['company_phone']) . '
                </div>
                <div class="quote-details">
                    Quotation No: ' . esc($order['quotation_number']) . '<br>
                    Quotation Date: ' . esc($order['quotation_date']) . '<br>
                    Valid Date: ' . esc($order['valid_date']) . '
                </div>
            </div>
    
            <div class="bill-section">
                <div class="bill-box">
                    <div class="bill-header">BILL FROM</div>
                    <div class="bill-content">
                        ' . esc($order['bill_from_name']) . '<br>
                        ' . esc($order['bill_from_address']) . '<br>
                        ' . esc($order['bill_from_email']) . '<br>
                        ' . esc($order['bill_from_phone']) . '
                    </div>
                </div>
                <div class="bill-box">
                    <div class="bill-header">BILL TO</div>
                    <div class="bill-content">
                        ' . esc($order['bill_to_name']) . '<br>
                        ' . esc($order['bill_to_address']) . '<br>
                        ' . esc($order['bill_to_email']) . '<br>
                        ' . esc($order['bill_to_phone']) . '
                    </div>
                </div>
            </div>
    
            <table class="items-table">
                <thead>
                    <tr>
                        <th>SR #</th>
                        <th>ITEM DETAILS</th>
                        <th>QTY</th>
                        <th>UNIT RATE</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>';
                
                $items = json_decode($order['order_items'], true);
                foreach ($items as $index => $item) {
                    $html .= '
                    <tr>
                        <td>' . ($index + 1) . '</td>
                        <td>' . esc($item['details']) . '</td>
                        <td>' . esc($item['quantity']) . '</td>
                        <td>' . number_format($item['unit_rate'], 2) . '</td>
                        <td>' . number_format($item['quantity'] * $item['unit_rate'], 2) . '</td>
                    </tr>';
                }
    
                $html .= '
                </tbody>
            </table>
    
            <div class="totals">
                <div class="totals-row">
                    <span>Sub Total:</span>
                    <span>' . number_format($order['subtotal'], 2) . '</span>
                </div>
                <div class="totals-row">
                    <span>Tax:</span>
                    <span>' . number_format($order['tax'], 2) . '</span>
                </div>
                <div class="totals-row">
                    <span>Discount:</span>
                    <span>' . number_format($order['discount'], 2) . '</span>
                </div>
                <div class="totals-row total">
                    <span>Total:</span>
                    <span>' . number_format($order['total'], 2) . '</span>
                </div>
            </div>
    
            <div class="terms">
                <strong>Terms & Conditions:</strong><br>
                ' . nl2br(esc($order['terms_conditions'])) . '
            </div>
    
            <div class="footer">
                Thank you for your purchase!
            </div>
    
            <div class="website">
                w w w . w o r d t e m p l a t e s . o r g
            </div>
        </body>
        </html>';
    }
    
    private function sendEmailWithAttachment($user, $pdfPath)
    {
        try {
            $email = \Config\Services::email();
            $email->setTo('amalganesh4u@gmail.com');
            $email->setFrom('no-reply@aranea.in', 'Aranea');
            $email->setSubject('Your Quotation is Generated');
            $email->setMessage(
                'Dear ' . 'User' . ',<br><br>' .
                'Your quotation has been generated. Please find the attached PDF for details.<br><br>' .
                'Company: ' . 'Test Company' . '<br><br>' .
                'Best regards,<br>Aranea Team'
            );
    
            // Attach the PDF
            $email->attach($pdfPath);
    
            return $email->send();
        } catch (\Exception $e) {
            log_message('error', 'Error sending email to ' . $user['email'] . '. Error: ' . $e->getMessage());
            return false;
        }
    }
    
    private function updateOrderStatus($orderId)
    {
        $orderModel = new OrderModel();
        $orderModel->update($orderId, ['status' => 'quoted']);
    }
}
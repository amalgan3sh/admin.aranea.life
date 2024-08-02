<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

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
        if ($this->authorize('super_admin')) {
            return view('holidaycity/admin_dashboard');
        } else {
            return $this->redirectUnauthorized();
        }
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
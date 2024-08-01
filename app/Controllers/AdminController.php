<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function AdminDashboard(): string
    {
        return view('admin_dashboard');
    }
}

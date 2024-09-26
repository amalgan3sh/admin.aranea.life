<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class EcommerceController extends Controller
{
    public function EcommerceDashboard()
    {
        // Load the ecommerce_home view
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/ecommerce_dashboard');
    }
    public function AddProduct()
    {
        // Load the ecommerce_home view
        // echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/ecommerce_add_product');
    }
}
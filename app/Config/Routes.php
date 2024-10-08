<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/select_dashboard_type', 'Home::SelectDashboard');

$routes->get('login', 'AuthController::index');
$routes->post('verify_login', 'AuthController::VerifyLogin');

$routes->get('/holiday_dashboard', 'AdminController::HolidayAdminDashboard');
$routes->get('/healthcare_dashboard', 'AdminController::HealthcareAdminDashboard');

$routes->get('register', 'AuthController::register');
$routes->post('/registerUser', 'AuthController::registerUser');
$routes->get('register', 'AuthController::register');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/ecommerce_dashboard', 'EcommerceController::EcommerceDashboard');
$routes->get('/add_product', 'EcommerceController::AddProduct');

$routes->post('/submit_add_product', 'EcommerceController::SubmitAddProduct');
$routes->get('/product_list', 'EcommerceController::ProductList');

$routes->get('/delete_product', 'EcommerceController::DeleteProduct');


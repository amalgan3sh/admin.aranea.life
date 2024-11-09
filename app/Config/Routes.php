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
$routes->get('/investment_request', 'AdminController::InvestmentRequest');
$routes->post('/investment_approve', 'AdminController::approve');
$routes->post('/investment_reject', 'AdminController::reject');
$routes->get('/approve_kyc', 'AdminController::approveKyc');
$routes->post('/kyc_approve', 'AdminController::kycApprove');
$routes->post('/kyc_reject', 'AdminController::kycReject');
$routes->get('/orders', 'AdminController::ViewOrders');

$routes->post('orders/createQuotation', 'AdminController::createQuotation');
$routes->post('orders/rejectOrder', 'AdminController::rejectOrder');
$routes->get('orders/viewQuotationPdf/(:num)', 'AdminController::viewQuotationPdf/$1');
$routes->post('orders/notifyClient', 'AdminController::notifyClient');


$routes->get('register', 'AuthController::register');
$routes->post('/registerUser', 'AuthController::registerUser');
$routes->get('register', 'AuthController::register');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/ecommerce_dashboard', 'EcommerceController::EcommerceDashboard');
$routes->get('/add_product', 'EcommerceController::AddProduct');

$routes->post('/submit_add_product', 'EcommerceController::SubmitAddProduct');
$routes->get('/product_list', 'EcommerceController::ProductList');

$routes->get('/delete_product', 'EcommerceController::DeleteProduct');

$routes->get('/product_listing', 'AdminController::ProductListing');
$routes->post('/submit_approve', 'AdminController::ProductApproveSubmit');
$routes->post('/submit_reject', 'AdminController::ProductRejectSubmit');


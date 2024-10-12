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



$routes->get('register', 'AuthController::register');
$routes->post('/registerUser', 'AuthController::registerUser');
$routes->get('register', 'AuthController::register');
$routes->get('/logout', 'AuthController::logout');




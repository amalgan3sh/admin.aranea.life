<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'AuthController::index');
$routes->post('verify_login', 'AuthController::VerifyLogin');

$routes->get('/dashboard', 'AdminController::AdminDashboard');
$routes->get('register', 'AuthController::register');
$routes->post('/registerUser', 'AuthController::registerUser');
$routes->get('register', 'AuthController::register');




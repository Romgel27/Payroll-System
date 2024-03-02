<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#$routes->get('/', 'Home::index');
//Authentication Routes
$routes->get('/', 'SigninController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
//$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
$routes->get('/dashboard/home','dashboardController::index',['filter'=>'authGuard']);
// app/Config/Routes.php
$routes->get('/logout', 'SigninController::logout');

//dashboard routes
$routes->get('dashboard/payroll/add', 'mainController::dashboard');
$routes->get('dashboard/SalesRep/list', 'mainController::SalesRepList');


$routes->get('dashboard/SalesRep/list', 'mainController::CreateSalesRep');
$routes->post('dashboard/SalesRep/list', 'mainController::AddSalesRep');
$routes->get('/dashboard/SalesRep/list/(:num)', 'mainController::editSalesRep/$1');
$routes->post('/dashboard/SalesRep/list/(:num)', 'mainController::UpdateSalesRep/$1');
$routes->get('/dashboard/SalesRep/delete/(:num)', 'mainController::DeleteSalesRep/$1');
//$routes->post('dashboard/payroll/add', 'mainController::generatePdf');
//$routes->get('view-pdf', 'mainController::viewPdf');








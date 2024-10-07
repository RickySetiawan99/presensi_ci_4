<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth\LoginController::index');
$routes->post('login', 'Auth\LoginController::loginAction');
$routes->get('logout', 'Auth\LoginController::logout');
$routes->get('register', 'Auth\RegisterController::register');
$routes->post('register', 'Auth\RegisterController::registerAction');

$routes->get('admin/home', 'Admin\HomeController::index', ['filter' => 'adminFilter']);

$routes->get('admin/department', 'Admin\DepartmentController::index', ['filter' => 'adminFilter']);
$routes->get('admin/department/create', 'Admin\DepartmentController::create', ['filter' => 'adminFilter']);
$routes->post('admin/department/store', 'Admin\DepartmentController::store', ['filter' => 'adminFilter']);
$routes->get('admin/department/edit/(:segment)', 'Admin\DepartmentController::edit/$1', ['filter' => 'adminFilter']);
$routes->post('admin/department/update/(:segment)', 'Admin\DepartmentController::update/$1', ['filter' => 'adminFilter']);
$routes->get('admin/department/delete/(:segment)', 'Admin\DepartmentController::delete/$1', ['filter' => 'adminFilter']);

$routes->get('admin/presence_location', 'Admin\PresenceLocationController::index', ['filter' => 'adminFilter']);
$routes->get('admin/presence_location/create', 'Admin\PresenceLocationController::create', ['filter' => 'adminFilter']);
$routes->post('admin/presence_location/store', 'Admin\PresenceLocationController::store', ['filter' => 'adminFilter']);
$routes->get('admin/presence_location/edit/(:segment)', 'Admin\PresenceLocationController::edit/$1', ['filter' => 'adminFilter']);
$routes->post('admin/presence_location/update/(:segment)', 'Admin\PresenceLocationController::update/$1', ['filter' => 'adminFilter']);
$routes->get('admin/presence_location/detail/(:segment)', 'Admin\PresenceLocationController::detail/$1', ['filter' => 'adminFilter']);
$routes->get('admin/presence_location/delete/(:segment)', 'Admin\PresenceLocationController::delete/$1', ['filter' => 'adminFilter']);

$routes->get('pegawai/home', 'Pegawai\HomeController::index', ['filter' => 'pegawaiFilter']);
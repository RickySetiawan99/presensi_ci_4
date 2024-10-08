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

$routes->group('admin', ['filter' => 'adminFilter'], function($routes) {
    $routes->get('home', 'Admin\HomeController::index');

    $routes->group('department', function($routes) {
        $routes->get('/', 'Admin\DepartmentController::index');
        $routes->get('create', 'Admin\DepartmentController::create');
        $routes->post('store', 'Admin\DepartmentController::store');
        $routes->get('edit/(:segment)', 'Admin\DepartmentController::edit/$1');
        $routes->post('update/(:segment)', 'Admin\DepartmentController::update/$1');
        $routes->get('delete/(:segment)', 'Admin\DepartmentController::delete/$1');
    });

    $routes->group('presence_location', function($routes) {
        $routes->get('/', 'Admin\PresenceLocationController::index');
        $routes->get('create', 'Admin\PresenceLocationController::create');
        $routes->post('store', 'Admin\PresenceLocationController::store');
        $routes->get('edit/(:segment)', 'Admin\PresenceLocationController::edit/$1');
        $routes->post('update/(:segment)', 'Admin\PresenceLocationController::update/$1');
        $routes->get('detail/(:segment)', 'Admin\PresenceLocationController::detail/$1');
        $routes->get('delete/(:segment)', 'Admin\PresenceLocationController::delete/$1');
    });
});

$routes->group('pegawai', ['filter' => 'pegawaiFilter'], function($routes) {
    $routes->get('home', 'Pegawai\HomeController::index');
});
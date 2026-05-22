<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// ------ Departemen ------
$routes->group('departemen', static function ($routes) {
    $routes->get('/', 'Departemen::index');
    $routes->get('create', 'Departemen::create');
    $routes->post('store', 'Departemen::store');
    $routes->get('edit/(:num)', 'Departemen::edit/$1');
    $routes->post('update/(:num)', 'Departemen::update/$1');
    $routes->get('delete/(:num)', 'Departemen::delete/$1');
});

// ------ Karyawan ------
$routes->group('karyawan', static function ($routes) {
    $routes->get('/', 'Karyawan::index');
    $routes->post('datatable', 'Karyawan::datatable'); // endpoint AJAX DataTables
    $routes->get('create', 'Karyawan::create');
    $routes->post('store', 'Karyawan::store');
    $routes->get('edit/(:num)', 'Karyawan::edit/$1');
    $routes->post('update/(:num)', 'Karyawan::update/$1');
    $routes->get('delete/(:num)', 'Karyawan::delete/$1');
});

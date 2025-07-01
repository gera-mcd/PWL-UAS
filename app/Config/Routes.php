<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->get('produk', 'ProdukController::index', ['filter' => 'auth']);
$routes->get('keranjang', 'TransaksiController::index', ['filter' => 'auth']);

$routes->get('login','auth-login-basic.html::index');

$routes->get('profile','AccountController::profile', ['filter' => 'auth']);
$routes->get('account','AccountController::account', ['filter' => 'auth']);

$routes->get('dashboard', 'DashboardController::index');
   
;
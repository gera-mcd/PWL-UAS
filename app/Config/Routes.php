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

$routes->group('produk', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('sold', 'ProdukController::soldProduk');
    $routes->get('download', 'ProdukController::download');
});
$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
     $routes->get('addToCart/(:num)', 'TransaksiController::addToCart/$1');
    $routes->post('update', 'TransaksiController::update');
    $routes->get('remove/(:num)', 'TransaksiController::remove/$1');
    $routes->get('clear', 'TransaksiController::clear');
});

$routes->get('home', 'ProdukController::category', ['filter' => 'auth']);
$routes->get('produk/category', 'ProdukController::category', ['filter' => 'auth']);
$routes->get('produk/search', 'ProdukController::search', ['filter' => 'auth']);
$routes->get('produk/detail/(:num)', 'ProdukController::detail/$1', ['filter' => 'auth']);
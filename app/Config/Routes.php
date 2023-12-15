<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'pageFilter']);
$routes->get('/produk/(:num)', 'Produk::order/$1', ['filter' => 'pageFilter']);
$routes->post('/order/checkout', 'Order::checkout', ['filter' => 'pageFilter']);
$routes->get('/login', 'Login::index', ['filter' => 'loginFilter']);
$routes->post('/login_action', 'Login::login_action', ['filter' => 'loginFilter']);
$routes->get('/logout', 'Login::logout', ['filter' => 'pageFilter']);
$routes->get('/api/produk', 'Produk::produkAPI');
$routes->get('/api/order', 'Order::orderAPI');
$routes->get('/orderHistory', 'History::index', ['filter' => 'pageFilter']);


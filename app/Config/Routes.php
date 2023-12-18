<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// File: app/Config/Routes.php

$routes->group('/', ['filter' => 'pageFilter'], function ($routes) {
  $routes->get('', 'Home::index');
  $routes->get('produk/(:num)', 'Produk::order/$1');
  $routes->post('order/checkout', 'Order::checkout');
  $routes->get('login', 'Login::index', ['filter' => 'loginFilter']);
  $routes->post('login_action', 'Login::login_action', ['filter' => 'loginFilter']);
  $routes->get('logout', 'Login::logout');
  $routes->get('orderHistory', 'History::index');
  $routes->get('orderHistory/(:segment)', 'History::detail/$1');
});

$routes->group('api', function ($routes) {
  $routes->get('produk', 'Produk::getAllProduct');
  $routes->get('produk/(:num)', 'Produk::getProductById/$1');
  $routes->get('order', 'Order::getAllOrder');
  $routes->get('order/(:num)', 'Order::getOrderById/$1');
  $routes->post('notifikasi/create', 'NotifikasiAPI::create');
});

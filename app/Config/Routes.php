<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/produk/(:num)', 'Produk::order/$1');
$routes->post('/order/checkout', 'Order::checkout');

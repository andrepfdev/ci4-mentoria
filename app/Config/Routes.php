<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/lojas', 'LojaController::index');
$routes->post('/lojas', 'LojaController::create');
$routes->put('/lojas/(:num)', 'LojaController::update/$1');
$routes->get('/loja/(:num)', 'LojaController::show/$1');

$routes->delete('/lojas/(:num)', 'LojaController::delete/$1');

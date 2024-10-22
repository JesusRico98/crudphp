<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('productos', 'Productos::index');
//$routes->get('productos/new', 'Productos::new');

$routes->resource('productos', ['placeholder' => '(:num)', 'except'=>'show']);
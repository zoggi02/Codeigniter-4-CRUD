<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Article::index');
$routes->get('/delete/(:num)', 'Article::delete/$1');
$routes->get('/edit/(:num)', 'Article::edit/$1');
$routes->post('/update/(:num)', 'Article::update/$1');
$routes->get('/create', 'Article::create');
$routes->post('/store', 'Article::store');
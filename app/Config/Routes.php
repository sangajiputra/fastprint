<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Router\RouteGroup;

/** @var RouteCollection $routes */
$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('ProductController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->group('', ['filter' => 'auth'], function (RouteCollection $routes) {
    $routes->get('/', 'ProductController::index');
    $routes->get('product', 'ProductController::index');
    $routes->get('import', 'ProductController::saveFromAPI');
    $routes->get('create', 'ProductController::create');
    $routes->post('store', 'ProductController::store');
    $routes->get('edit/(:num)', 'ProductController::edit/$1');
    $routes->post('update/(:num)', 'ProductController::update/$1');
    $routes->get('delete/(:num)', 'ProductController::delete/$1');
});

$routes->group('', ['filter' => 'noauth'], function (RouteCollection $routes) {
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::store');
    $routes->get('login', 'AuthController::login');
    $routes->get('auth', 'AuthController::login');
    $routes->post('login', 'AuthController::authenticate');
});

$routes->get('logout', 'AuthController::logout');

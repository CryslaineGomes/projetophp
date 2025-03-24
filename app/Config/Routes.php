<?php

namespace Config;

use CodeIgniter\Config\BaseRoutes;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController'); 
$routes->setDefaultMethod('login'); 
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); 


$routes->get('/', 'AuthController::login');

$routes->get('/login', 'LoginController::index'); 
$routes->post('/login/authenticate', 'LoginController::authenticate'); 

$routes->get('/logout', 'AuthController::logout'); 

$routes->get('/dashboard', function () {
    if (!session()->get('logged_in')) { 
        return redirect()->to('/login'); 
    }
    return view('dashboard'); 
});


<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');
$routes->get('about', 'PagesController::about');
$routes->get('contact', 'PagesController::contact');
$routes->post('contact/submit', 'PagesController::submitContact');


//PRODUTOS
$routes->get('produtos', 'ProdutoController::index');
$routes->get('produtos/create', 'ProdutoController::create');
$routes->post('produtos/store', 'ProdutoController::store');
$routes->get('produtos/edit/(:num)', 'ProdutoController::edit/$1');
$routes->post('produtos/update/(:num)', 'ProdutoController::update/$1');
$routes->get('produtos/delete/(:num)', 'ProdutoController::delete/$1');


//autenticação
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::storeUser');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

//RECUPERAÇÃO DE SENHA
$routes->get('forgot-password', 'AuthController::forgotPassword');
$routes->post('forgot-password', 'AuthController::sendResetLink');
$routes->get('reset-password/(:any)', 'AuthController::resetPassword/$1');
$routes->post('reset-password/(:any)', 'AuthController::updatePassword/$1');

//ROTAS PARA PERFIL
$routes->get('profile', 'ProfileController::index');
$routes->post('profile/update', 'ProfileController::updateProfile');
$routes->post('profile/update-password', 'ProfileController::updatePassword');
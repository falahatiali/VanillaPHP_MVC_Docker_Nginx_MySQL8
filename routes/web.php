<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 6:09 PM
 */


$route->get('/' , 'App\Controllers\HomeController::home')->setName('home');

$route->group('/auth' , function ($route){
	$route->get('/login' , 'App\Controllers\Auth\LoginController::loginForm')->setName('auth.login');
	$route->post('/login' , 'App\Controllers\Auth\LoginController::login')->setName('auth.login.store');
	$route->post('/auth/logout', 'App\Controllers\Auth\LoginController::logout')->setName('auth.logout');

	$route->get('/register' , 'App\Controllers\Auth\RegisterController::index')->setName('auth.register');
	$route->post('/register', 'App\Controllers\Auth\RegisterController::register');

});

$route->get('users/all' , 'App\Controllers\UsersController::index')->setName('users.all');

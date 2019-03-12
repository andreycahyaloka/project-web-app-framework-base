<?php

/**
 * PHP Framework Native
 * 
 * @package main PHP Framework Native
 * @author Andrey Cahyaloka <cyberdolls@syghtarts.com>
 */

/**
 * front controller
 */
// echo 'requested url = "' . $_SERVER['QUERY_STRING'] . '"';
// echo '<br />' . '<br />';

/**
 * auth cookie
 */
// set auth timeout in seconds
// ini_set('session.cookie_lifetime', 864000);

/**
 * autoloader
 */
// spl_autoload_register(function ($className) {
// 	// get app root directory
// 	$root = dirname(__DIR__);
// 	$file = $root . '/' . str_replace('\\', '/', $className) . '.php';

// 	if (is_readable($file)) {
// 		require $root . '/' . str_replace('\\', '/', $className) . '.php';
// 	}
// });

/**
 * composer packages autoloader
 */
require '../vendor/autoload.php';

/**
 * set default timezone & locale
 */
date_default_timezone_set(config\Config::DEFAULT_TIMEZONE);
// echo date_default_timezone_get();
setlocale(LC_ALL, config\Config::DEFAULT_LOCALE);
// echo setlocale(LC_ALL, 0);

/**
 * set error and exception handler
 */
// error engine - show every single error
error_reporting(E_ALL);
// set handler
set_error_handler('framework\Error::errorHandler');
set_exception_handler('framework\Error::exceptionHandler');

/**
 * sessions
 */
session_start();

/**
 * register composer packages
 */
// 

/**
 * create objects
 * router
 */
$router = new framework\Router();

/**
 * add the routes
 */
// guest
$router->add('', [
	'controller' => 'guests',
	'action' => 'index'
]);
// $router->add('about', [
// 	'controller' => 'guests',
// 	'action' => 'about'
// ]);

// guests
$router->add('register', [
	'controller' => 'users',
	'action' => 'register'
]);
$router->add('store', [
	'controller' => 'users',
	'action' => 'store'
]);
$router->add('storesuccess', [
	'controller' => 'users',
	'action' => 'storeSuccess'
]);
$router->add('validateemailajax', [
	'controller' => 'users',
	'action' => 'validateEmailAjax'
]);
$router->add('login', [
	'controller' => 'users',
	'action' => 'login'
]);
$router->add('loginaccess', [
	'controller' => 'users',
	'action' => 'loginaccess'
]);
$router->add('logout', [
	'controller' => 'users',
	'action' => 'logout'
]);
$router->add('logoutmessage', [
	'controller' => 'users',
	'action' => 'logoutmessage'
]);

// users
$router->add('items', [
	'controller' => 'items',
	'action' => 'index',
	'namespace' => 'UserController'
]);

// password generator
$router->add('pwgen', [
	'controller' => 'pwgens',
	'action' => 'pwgen',
	'namespace' => 'GuestController'
]);
$router->add('pwgenajax', [
	'controller' => 'pwgens',
	'action' => 'pwgenajax',
	'namespace' => 'GuestController'
]);

// age calculator
$router->add('agecalc', [
	'controller' => 'agecalcs',
	'action' => 'agecalc',
	'namespace' => 'GuestController'
]);
$router->add('agecalcajax', [
	'controller' => 'agecalcs',
	'action' => 'agecalcajax',
	'namespace' => 'GuestController'
]);

// string reverser
$router->add('strrev', [
	'controller' => 'strrevs',
	'action' => 'strrev',
	'namespace' => 'GuestController'
]);
$router->add('strrevajax', [
	'controller' => 'strrevs',
	'action' => 'strrevajax',
	'namespace' => 'GuestController'
]);

// material design color
$router->add('matdescol', [
	'controller' => 'matdescols',
	'action' => 'matdescol',
	'namespace' => 'GuestController'
]);

// post
$router->add('posts', [
	'controller' => 'posts',
	'action' => 'index']);

// admin
$router->add('admin', [
	'controller' => 'users',
	'action' => 'index',
	'namespace' => 'AdminController'
]);
$router->add('admin/{controller}', [
	'action' => 'index',
	'namespace' => 'AdminController'
]);
$router->add('admin/{controller}/{action}', [
	'namespace' => 'AdminController'
]);
$router->add('admin/{controller}/{action}/{id:\d+}', [
	'namespace' => 'AdminController'
]);

// base route
// $router->add('{controller}');
$router->add('{action}', [
	'controller' => 'guests'
]);
$router->add('{controller}/{action}');
$router->add('{controller}/{action}/{id:\d+}');

// match transmission the requested route
$router->dispatch($_SERVER['QUERY_STRING']);

// display routing table
// echo '<pre>';
// var_dump($router->getRoutes());
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// echo '</pre>';
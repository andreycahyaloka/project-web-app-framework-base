<?php

/**
 * PHP Framework Native
 * 
 * @package main - PHP Framework Native
 * @author Andrey Cahyaloka <cyberdolls@syghtarts.com>
 */

/**
 * front controller
 */
// echo 'http_host => ';
// echo htmlspecialchars($_SERVER['HTTP_HOST']);
// echo '<br />';
// echo 'document_root => ';
// echo htmlspecialchars($_SERVER['DOCUMENT_ROOT']);
// echo '<br />';
// echo 'request_uri => ';
// echo htmlspecialchars($_SERVER['REQUEST_URI']);
// echo '<br />';
// echo 'query_string / requested-url => ';
// echo '"' . htmlspecialchars($_SERVER['QUERY_STRING']) . '"';
// echo '<br />' . '<br />';

/**
 * auth cookie
 */
// set cookie auth timeout in seconds
// ini_set('session.cookie_lifetime', 864000);

/**
 * autoloader
 * only load => class, namespace, constant
 */
// autoloader namespaced-class files
// spl_autoload_register(function ($className) {
// 	// get app root directory
// 	$root = dirname(__DIR__);
// 	$file = $root . '/' . str_replace('\\', '/', $className) . '.php';

// 	if (is_readable($file)) {
// 		require $root . '/' . str_replace('\\', '/', $className) . '.php';
// 	}
// });
// autoloader config files
// function autoloadConfigFile() {
// 	// get app root directory
// 	$root = dirname(__DIR__);
// 	$filePath = $root . '/config/';
// 	// remove the dots that scandir() picks up in linux environments
// 	$fileName = array_slice(scandir($root . '/config/'), 2);

// 	foreach ($fileName as $fileNames) {
// 		$fileWithPath = $filePath . $fileNames;
// 		var_dump($fileNames);

// 		if (is_file($fileWithPath) && is_readable($fileWithPath)) {
// 			require $fileWithPath;
// 		}
// 	}
// }
// autoloadConfigFile();
// loader global-config files with manual-order
require dirname(__DIR__) . '/config/' . 'globalConfigEnv' . '.php';
require dirname(__DIR__) . '/config/' . 'globalConfigConst' . '.php';
// require dirname(__DIR__) . '/config/' . 'Config.php';

/**
 * autoloader composer packages
 */
require '../vendor/autoload.php';

/**
 * set default timezone & locale
 */
// date_default_timezone_set(config\Config::DEFAULT_TIMEZONE);
date_default_timezone_set(DEFAULT_TIMEZONE);
// echo date_default_timezone_get();
setlocale(LC_ALL, DEFAULT_LOCALE);
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
// guests
$router->add('', [
	'controller' => 'guests',
	'action' => 'index'
]);
// $router->add('about', [
// 	'controller' => 'guests',
// 	'action' => 'about'
// ]);

// users
// create
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
	'action' => 'storesuccess'
]);
$router->add('confirmaccount/{token:[\da-f]+}', [
	'controller' => 'users',
	'action' => 'confirmaccount'
]);
$router->add('confirmaccountsuccess', [
	'controller' => 'users',
	'action' => 'confirmaccountsuccess'
]);
$router->add('validateemailajax', [
	'controller' => 'users',
	'action' => 'validateemailajax'
]);
// read
$router->add('login', [
	'controller' => 'users',
	'action' => 'login'
]);
$router->add('loginprocess', [
	'controller' => 'users',
	'action' => 'loginprocess'
]);
// logout
$router->add('logout', [
	'controller' => 'users',
	'action' => 'logout'
]);
$router->add('logoutmessage', [
	'controller' => 'users',
	'action' => 'logoutmessage'
]);
$router->add('forgotpassword', [
	'controller' => 'users',
	'action' => 'forgotpassword'
]);
$router->add('forgotpasswordprocess', [
	'controller' => 'users',
	'action' => 'forgotpasswordprocess'
]);
$router->add('resetpassword/{token:[\da-f]+}', [
	'controller' => 'users',
	'action' => 'resetpassword'
]);
$router->add('resetpasswordprocess', [
	'controller' => 'users',
	'action' => 'resetpasswordprocess'
]);
// update
$router->add('editaccount', [
	'controller' => 'accounts',
	'action' => 'editaccount',
	'namespace' => 'UserController'
]);
$router->add('validateeditemailajax', [
	'controller' => 'accounts',
	'action' => 'validateeditemailajax',
	'namespace' => 'UserController'
]);
$router->add('updateaccount', [
	'controller' => 'accounts',
	'action' => 'updateaccount',
	'namespace' => 'UserController'
]);
// 
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
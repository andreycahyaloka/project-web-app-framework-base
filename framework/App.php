<?php

class App {
	protected $controller = 'GuestsController';
	protected $method = 'index';
	protected $params = [];

	public function __construct() {
		// show url as string
		// var_dump($_GET);
		$url = $this->parseURL();
		var_dump($url);

		// get controller
		if( file_exists('../app/controllers/' . $url[0] . '.php') ) {
			$this->controller = $url[0];
			echo '<br />';
			var_dump($url);
			unset($url[0]);
			// 
			echo '<br />';
			var_dump($url);
			echo '<br />controller ';
			var_dump($this->controller);
		}

		// call controller if file-exists
		// require_once '../app/controllers/' . $this->controller . '.php';
		// $this->controller = new $this->controller;

		// get method
		// if( isset($url[1]) ) {
		// 	if( method_exists($this->controller, $url[1]) ) {
		// 		$this->method = $url[1];
		// 		unset($url[1]);
		// 		// 
		// 		echo '<br />method ';
		// 		var_dump($this->method);
		// 	}
		// }

		// get params
		// if( !empty($url) ) {
		// 	$this->params = array_values($url);
		// }

		// run controller & method, send params if exist
		// call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL() {
		if( isset($_GET['url']) ) {
			// remove end-slash url
			$url = rtrim($_GET['url'], '/');

			// filter bad string url
			$url = filter_var($url, FILTER_SANITIZE_URL);

			// split url to array with slash delimiter
			$url = explode('/', $url);
			return $url;
		}
	}
}
<?php

namespace framework;

/**
 * router
 */
class Router {
	/**
	 * associative array of routes (the routing table)
	 * 
	 * @var array
	 */
	protected $routes = [];

	/**
	 * parameters from the matched route
	 * 
	 * @var array
	 */
	protected $params = [];

	/**
	 * add a route to the routing table
	 * 
	 * @param string $route the route url
	 * @param array $params parameters (controller, action, etc.)
	 * 
	 * @return void
	 */
	public function add($route, $params = []) {
		// convert the route to a regular expression : escape forward slashes
		$route = preg_replace('/\//', '\\/', $route);

		// convert variables e.g. {controller}
		$route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z]+)', $route);

		// convert variables with custom regular expressions i.g. {id:\d+}
		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)',$route);

		// add start and end delimiters, and case insensitive flag
		$route = '/^' . $route . '$/i';

		$this->routes[$route] = $params;
	}

	/**
	 * get all the routes from the routing table
	 * 
	 * @return array
	 */
	public function getRoutes() {
		return $this->routes;
	}

	/**
	 * match the route to the routes in the routing table,
	 * setting the $params property if a route is found
	 * 
	 * @param string $url the route url
	 * @return boolean true if a match found, false otherwise
	 */
	public function match($url) {
		foreach ($this->routes as $route => $params) {
			if (preg_match($route, $url, $matches)) {
				// get named capture group values
				foreach ($matches as $key => $match) {
					if (is_string($key)) {
						$params[$key] = $match;
					}
				}
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	/**
	 * get the currently matched parameters
	 * 
	 * @return array
	 */
	public function getParams() {
		return $this->params;
	}

	/**
	 * dispatch the route,
	 * creating the controller object and running the action method
	 * 
	 * @param string $url the route url
	 * @return void
	 */
	public function dispatch($url) {
		$url = $this->removeQueryStringVariables($url);
		$url = $this->cleanUrl($url);

		if ($this->match($url)) {
			$controller = $this->params['controller'];
			$controller = $this->convertToStudlyCaps($controller);
			// controller class directory
			$controller = $this->getNamespace() . $controller;

			if (class_exists($controller)) {
				$controller_object = new $controller($this->params);

				$action = $this->params['action'];
				$action = $this->convertToCamelCase($action);

				if (is_callable([$controller_object, $action])) {
					$controller_object->$action();
				}
				else {
					// throw error exception
					throw new \Exception('Action method "' . $action . '" (in Controller class "' . $controller . '") not found.', 404);
				}
			}
			else {
				// throw error exception
				throw new \Exception('Controller class "' . $controller . '" not found.', 404);
			}
		}
		else {
			// throw error exception - set http status code to 404
			throw new \Exception('No route matched.', 404);
		}
	}

	/**
	 * convert the string with hyphens to StudlyCaps,
	 * e.g. guest-index => GuestIndex
	 * 
	 * @param string $string the string to convert
	 * @return string
	 */
	protected function convertToStudlyCaps($string) {
		return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
	}

	/**
	 * convert the string with hyphens to camelCase,
	 * e.g. create-new => createNew
	 * 
	 * @param string $string the string to convert
	 * @return string
	 */
	protected function convertToCamelCase($string) {
		return lcfirst($this->convertToStudlyCaps($string));
	}

	/**
	 * remove the query string variables from the url (if any).
	 * as the full query string is used for the route,
	 * any variables at the end will need to be removed
	 * before the route is matched to the routing table.
	 * for example:
	 * 
	 * url								$_SERVER['QUERY_STRING]		route
	 * -------------------------------------------------------------------------
	 * localhost/?page=1				page=1						''
	 * localhost/guests?page=1			guests&page=1				guests
	 * localhost/guests/index			guests/index				guests/index
	 * localhost/guests/index?page=1	guests/index&page=1			guests/index
	 * 
	 * a url of the format localhost/?page (one variable name,
	 * no value) won't work however.
	 * (nb. the ".htaccess" file converts the first "?" to a "&"
	 * when it's passed through to the "$_SERVER" variable).
	 * 
	 * @param string $url the full url
	 * @return string the url with the query string variables removed
	 */
	protected function removeQueryStringVariables($url) {
		if ($url != '') {
			$parts = explode('&', $url, 2);

			if (strpos($parts[0], '=') === false) {
				$url = $parts[0];
			}
			else {
				$url = '';
			}
		}
		return $url;
	}

	/**
	 * clean the url
	 * 
	 * @param string $url the full url
	 * @return string the clean url
	 */
	protected function cleanUrl($url) {
		// remove all illegal characters from a url
		$url = filter_var($url, FILTER_SANITIZE_URL);

		// remove tags and remove or encode special characters from a string
		$url = filter_var($url, FILTER_SANITIZE_STRING);

		// remove "<>& and characters with ASCII value below 32
		$url = filter_var($url,FILTER_SANITIZE_SPECIAL_CHARS);

		// remove slash / back-slash trails from requested link / $_SERVER['QUERY_STRING']
		$url = rtrim($url, '/\\');

		return $url;
	}

	/**
	 * get the namespace for the controller class.
	 * the namespace defined in the route parameters is added if present.
	 * 
	 * @return string the requested url
	 */
	protected function getNamespace() {
		$namespace = 'app\controllers\\';

		if (array_key_exists('namespace', $this->params)) {
			$namespace .= $this->params['namespace'] . '\\';
		}
		return $namespace;
	}
}
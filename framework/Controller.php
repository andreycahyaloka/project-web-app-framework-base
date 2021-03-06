<?php

namespace framework;

use app\auth\Auth;
use app\messages\Flash;

/**
 * controller
 */
abstract class Controller {
	/**
	 * parameters from the matched route
	 * 
	 * @var array
	 */
	protected $routeParams = [];

	/**
	 * class constructor
	 * 
	 * @param array $routeParams parameters from the route
	 * @return void
	 */
	public function __construct($routeParams) {
		$this->routeParams = $routeParams;
	}

	/**
	 * @return void
	 */
	public function __call($name, $args) {
		$method = $name . 'Action';

		if (method_exists($this, $method)) {
			if ($this->before() !== false) {
				call_user_func_array([$this, $method], $args);
				$this->after();
			}
		}
		else {
			// throw error exception
			throw new \Exception('Action method "' . $method . '" (in Controller class "' . get_class($this) . '") not found.', 404);
		}
	}

	/**
	 * before filter - called before an action method
	 * 
	 * @return void
	 */
	protected function before() {
		// 
	}

	/**
	 * after filter - called after an action method
	 * 
	 * @return void
	 */
	protected function after() {
		// 
	}

	/**
	 * redirect to a different page
	 * 
	 * @param string $url - the relative url
	 * @return void
	 */
	public function redirect($url) {
		// header('Location: /' . $url, true, 303);
		// header('Location: http://' . $_SERVER['HTTP_HOST'] . BASE_URL . $url, true, 303);
		header('Location: ' . BASE_URL . $url, true, 303);
		exit;
	}

	/**
	 * require the user to be logged in before giving access to the requested page.
	 * remember the requested page for later,
	 * then redirect to the login page.
	 * 
	 * @return void
	 */
	protected function requireLogin() {
		if (! Auth::getUser()) {
			// set flash messages
			Flash::addMessage('Please login to access the page.', Flash::INFO);

			// save requested page
			Auth::saveRequestedPage();

			// redirect to login form
			$this->redirect('login');
			// exit('access denied.');
		}
	}
}
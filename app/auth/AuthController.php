<?php

namespace app\auth;

use framework\Controller;

/**
 * authentication controller
 */
abstract class AuthController extends Controller {
	/**
	 * require the user to be authenticated before giving access to
	 * all method in the controller.
	 * 
	 * @return void
	 */
	protected function before() {
		$this->requireLogin();
	}
}
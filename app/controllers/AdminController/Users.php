<?php

namespace app\controllers\AdminController;

use framework\View;

/**
 * users controller
 */
class Users extends \framework\Controller {
	/**
	 * before filter
	 * 
	 * @return void
	 */
	protected function before() {
		// make sure an admin user is logged in for example
		echo '~(before)~';
		echo '<br /><br />';
		// return false;
	}

	/**
	 * index
	 * 
	 * @return void
	 */
	public function indexAction() {
		echo 'controller "users" action "index"';
	}

	/**
	 * about
	 * 
	 * @return void
	 */
	public function aboutAction() {
		echo 'controller "users" action "about"';
	}
}
<?php

namespace app\controllers\UserController;

use framework\Controller;
use framework\View;
use app\auth\Auth;
use app\auth\AuthController;

/**
 * items user controller
 */
class Items extends AuthController {
	/**
	 * index
	 * 
	 * @return void
	 */
	public function indexAction() {
		View::render('users/items.php');
	}
}
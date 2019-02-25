<?php

namespace app\controllers;

use framework\Controller;
use framework\View;
use app\models\User;

/**
 * users controller
 */
class Users extends Controller {
	/**
	 * signup
	 * 
	 * @return void
	 */
	public function signupAction() {
		View::render('users/signup.php');
	}

	/**
	 * store
	 * 
	 * @return void
	 */
	public function storeAction() {
		// var_dump($_POST);
		$users = new User($_POST);

		if ($users->save()) {
			// redirect if success
			header('Location: ./storesuccess', true, 303);
			exit;
		}
		else {
			// var_dump($users->errors);
			View::render('users/signup.php', [
				'users' => $users
			]);
		}
	}

	/**
	 * store success page
	 * 
	 * @return void
	 */
	public function storeSuccessAction() {
		View::render('users/index.php');
	}

	/**
	 * validate if email is available for a new signup
	 * 
	 * @return void
	 */
	public function validateEmailAjaxAction() {
		$is_valids = ! User::emailExists($_GET['signupEmail']);

		header('Content-Type: application/json');
		echo json_encode($is_valids);
	}
}
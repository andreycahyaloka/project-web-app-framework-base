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
	 * register
	 * 
	 * @return void
	 */
	public function registerAction() {
		View::render('users/register.php');
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
			$this->redirect('storesuccess');
			// header('Location: ./storesuccess', true, 303);
			// exit;
		}
		else {
			// var_dump($users->errors);
			View::render('users/register.php', [
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
	 * validate if email is available for a new register
	 * 
	 * @return void
	 */
	public function validateEmailAjaxAction() {
		$is_valids = ! User::emailExists($_GET['registerEmail']);

		header('Content-Type: application/json');
		echo json_encode($is_valids);
	}

	/**
	 * login form
	 * 
	 * @return void
	 */
	public function loginFormAction() {
		View::render('users/login.php');
	}

	/**
	 * login
	 * 
	 * @return void
	 */
	public function loginAction() {
		// echo ($_REQUEST['loginEmail'] . ', ' . $_REQUEST['inputPassword']);
		$users = User::authenticate($_POST['loginEmail'], $_POST['inputPassword']);

		if ($users) {
			// regenerate session id on login
			session_regenerate_id(true);

			// set user-id into session
			$_SESSION['user_id'] = $users->id;

			// redirect after login
			$this->redirect('');
		}
		else {
			View::render('users/login.php', [
				'emails' => $_POST['loginEmail']
			]);
		}
	}

	/**
	 * logout
	 * 
	 * @return void
	 */
	public function logoutAction() {
		// unset all of the session variables
		$_SESSION = [];

		// delete the session cookie
		if (ini_get('session.use_cookies')) {
			$params = session_get_cookie_params();

			setcookie(
				session_name(),
				'',
				time() - 42000,
				$params['path'],
				$params['domain'],
				$params['secure'],
				$params['httponly']
			);
		}

		// destroy the session
		session_destroy();

		// redirect to index
		$this->redirect('');
	}
}
<?php

namespace app\controllers;

use framework\Controller;
use framework\View;
use app\models\User;
use app\auth\Auth;
use app\messages\Flash;

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
	public function loginAction() {
		View::render('users/login.php');
	}

	/**
	 * login access
	 * 
	 * @return void
	 */
	public function loginAccessAction() {
		// echo ($_REQUEST['loginEmail'] . ', ' . $_REQUEST['inputPassword']);
		$users = User::authenticate($_POST['loginEmail'], $_POST['inputPassword']);

		if ($users) {
			Auth::login($users);

			// add flash message after succesfully login
			Flash::addMessage('Login successful.', Flash::SUCCESS);

			// redirect after login to index
			// $this->redirect('./');
			// redirect after login to requested page
			$this->redirect(Auth::getRequestedPage());
		}
		else {
			// add flash message if failed login
			Flash::addMessage('Login failed, please try again!', Flash::WARNING);

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
		Auth::logout();

		$this->redirect('./logoutmessage');
	}

	/**
	 * show a 'logged out' flash message and redirect.
	 * necessary to use the flash messages as they use they session
	 * at the end of the logout method (logoutAction) the session is
	 * destroyed. so a new action needs to be called in order to use
	 * the session.
	 * 
	 * @return void
	 */
	public function LogoutMessageAction() {
		// add flash message after logout
		Flash::addMessage('Logout successful.', Flash::SUCCESS);

		// redirect after logout to index
		$this->redirect('./pwgen');
	}
}
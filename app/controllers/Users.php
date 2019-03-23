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

		if ($users->create()) {
			Flash::addMessage('Register successful.', Flash::SUCCESS);

			// redirect if success
			$this->redirect('./storesuccess');
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
		View::render('guests/index.php');
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
	 * login process
	 * 
	 * @return void
	 */
	public function loginProcessAction() {
		// echo ($_REQUEST['loginEmail'] . ', ' . $_REQUEST['inputPassword']);
		$users = User::authenticate($_POST['loginEmail'], $_POST['inputPassword']);

		$rememberLogins = isset($_POST['checkRememberLogin']);

		// var_dump($_POST);
		// var_dump($rememberLogins);

		if ($users) {
			// remember the login using the cookie
			Auth::login($users, $rememberLogins);

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
				'emails' => $_POST['loginEmail'],
				'rememberLogins' => $rememberLogins
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
	public function logoutMessageAction() {
		// add flash message after logout
		Flash::addMessage('Logout successful.', Flash::SUCCESS);

		// redirect after logout to index
		$this->redirect('./');
	}

	/**
	 * show the forgotten password page
	 * 
	 * @return void
	 */
	public function forgotPasswordAction() {
		View::render('users/forgot.php');
	}

	/**
	 * send the password reset link to the supplied email
	 * 
	 * @return void
	 */
	public function forgotPasswordProcessAction() {
		User::sendPasswordReset($_POST['forgotEmail']);
		// var_dump($_POST['forgotEmail']);

		Flash::addMessage('Reset password link successful sent.', Flash::SUCCESS);

		View::render('users/forgotmessage.php');
	}

	/**
	 * show reset password page
	 * 
	 * @return void
	 */
	public function resetPasswordAction() {
		$tokens = $this->routeParams['token'];

		$users = $this->getResetPasswordUser($tokens);
		// var_dump($users);

		View::render('users/reset.php', [
			'tokens' => $tokens
		]);
	}

	/**
	 * reset the user password
	 * 
	 * @return void
	 */
	public function resetPasswordProcessAction() {
		$tokens = $_POST['resetToken'];

		$users = $this->getResetPasswordUser($tokens);

		if ($users->resetPassword($_POST['inputPassword'])) {
			Flash::addMessage('Reset password successful.', Flash::SUCCESS);

			View::render('users/resetsuccess.php');
		}
		else {
			View::render('users/reset.php', [
				'tokens' => $tokens,
				'users' => $users
			]);
		}
	}

	/**
	 * find the user model associated with the password reset token,
	 * or end the request with a message
	 * 
	 * @param string $tokens - password reset token sent to the user
	 * @return mixed - user object if found and the token hasn't expired, null otherwise
	 */
	protected function getResetPasswordUser($tokens) {
		$users = User::findByPasswordResetToken($tokens);

		if ($users) {
			return $users;
		}
		else {
			View::render('users/resetinvalid.php');
			exit;
		}
	}
}
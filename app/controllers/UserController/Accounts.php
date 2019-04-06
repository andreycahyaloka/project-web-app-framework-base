<?php

namespace app\controllers\UserController;

use framework\View;
use app\models\User;
use app\auth\AuthController;
use app\auth\Auth;
use app\messages\Flash;

/**
 * account controller
 */
class Accounts extends AuthController {
	/**
	 * before filter - called before each action-method
	 * 
	 * @return void
	 */
	protected function before() {
		// avoid overriding methods
		// call/require parent (same method name) from class authcontroller and method before()
		parent::before();

		// variable in this class
		$this->user = Auth::getUser();
	}

	/**
	 * show the edit account-profile form
	 * 
	 * @return void
	 */
	public function editAccountAction() {
		// $users = Auth::getUser();
		$users = $this->user;

		View::render('users/editaccount.php', [
			'users' => $users
		]);
	}

	/**
	 * validate if email is available for a update
	 * 
	 * @return void
	 */
	public function validateEditEmailAjaxAction() {
		// $isValids = ! User::emailExists($_GET['editAccountEmail']);
		$isValids = ! User::emailExists($_GET['editAccountEmail'], $_GET['ignoreId'] ?? null);

		header('Content-Type: application/json');
		echo json_encode($isValids);
	}

	/**
	 * update the account-profile
	 * 
	 * @return void
	 */
	public function updateAccountAction() {
		$users = $this->user;

		if ($users->updateAccount($_POST)) {
			Flash::addMessage('Account updated.', Flash::SUCCESS);

			$this->redirect('');
		}
		else {
			Flash::addMessage('Account update failed.', Flash::WARNING);

			View::render('users/editaccount.php', [
				'users' => $users
			]);
		}
	}
}
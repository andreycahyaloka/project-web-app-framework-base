<?php

namespace app\auth;

use app\models\User;

/**
 * authentication
 */
class Auth {
	/**
	 * login the user
	 * 
	 * @param User $users - the user model
	 * @return void
	 */
	public static function login($users) {
		// regenerate session id on login
		session_regenerate_id(true);

		// set user-id into session
		$_SESSION['user_id'] = $users->id;
	}

	/**
	 * logout the user
	 * 
	 * @return void
	 */
	public static function logout() {
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
	}

	/**
	 * return indicator of whether a user is logged in or not
	 * 
	 * @return boolean
	 */
	// public static function isAuthenticated() {
	// 	return isset($_SESSION['user_id']);
	// }
	
	/**
	 * remember the originally-requested page in the session
	 * 
	 * @return void
	 */
	public static function saveRequestedPage() {
		// full uri
		// $_SESSION['requestedPage'] = $_SERVER['REQUEST_URI'];
		// only link
		$_SESSION['requestedPage'] = $_SERVER['QUERY_STRING'];
	}

	/**
	 * get the originally-requested page to return to after requiring login,
	 * or default to the index-page
	 * 
	 * @return void
	 */
	public static function getRequestedPage() {
		return $_SESSION['requestedPage'] ?? './';
	}

	/**
	 * get the current authenticated-user,
	 * from the session or the remember-me cookie.
	 * 
	 * @return mixed - the user model or null if not authenticated
	 */
	public static function getUser() {
		if (isset($_SESSION['user_id'])) {
			return User::findById($_SESSION['user_id']);
		}
	}
}
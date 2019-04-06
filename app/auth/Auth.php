<?php

namespace app\auth;

use app\models\User;
use app\models\RememberLogin;

/**
 * authentication
 */
class Auth {
	/**
	 * login the user
	 * 
	 * @param User $user - the user model
	 * @param boolean $rememberLogin - remember the login if true
	 * @return void
	 */
	public static function login($user, $rememberLogin) {
		// regenerate session id on login
		session_regenerate_id(true);

		// set user-id into session
		$_SESSION['userId'] = $user->id;

		if  ($rememberLogin) {
			if ($user->rememberLogin()) {
				setcookie('rememberMe', $user->rememberToken, $user->expiryTimestamp, '/');
			}
		}
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
			$param = session_get_cookie_params();

			setcookie(
				session_name(),
				'',
				time() - 42000,
				$param['path'],
				$param['domain'],
				$param['secure'],
				$param['httponly']
			);
		}

		// destroy the session
		session_destroy();

		// delete remember-login from cookie
		static::deleteLoginFromRememberCookie();
	}

	/**
	 * return indicator of whether a user is logged in or not
	 * 
	 * @return boolean
	 */
	// public static function isAuthenticated() {
	// 	return isset($_SESSION['userId']);
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
		// return $_SESSION['requestedPage'] ?? '/';
		return $_SESSION['requestedPage'] ?? '';
	}

	/**
	 * get the current authenticated-user,
	 * from the session or the rememberMe cookie.
	 * 
	 * @return mixed - the user model or null if not authenticated
	 */
	public static function getUser() {
		if (isset($_SESSION['userId'])) {
			return User::findById($_SESSION['userId']);
		}
		else {
			return static::loginFromRememberCookie();
		}
	}

	/**
	 * login the user from a remembered login cookie
	 * 
	 * @return mixed - the user model if login cookie found, null otherwise
	 */
	protected static function loginFromRememberCookie() {
		$cookie = $_COOKIE['rememberMe'] ?? false;

		if ($cookie) {
			$rememberLogin = RememberLogin::findByToken($cookie);

			if (($rememberLogin) && (! $rememberLogin->hasExpired())) {
				$user = $rememberLogin->getUser();

				static::login($user, false);

				return $user;
			}
		}
	}

	/**
	 * forget the remember login, if present
	 * 
	 * @return void
	 */
	protected static function deleteLoginFromRememberCookie() {
		$cookie = $_COOKIE['rememberMe'] ?? false;

		if ($cookie) {
			$rememberLogin = RememberLogin::findByToken($cookie);
			var_dump($rememberLogin);

			if ($rememberLogin) {
				$rememberLogin->deleteLoginFromRememberDatabase();
			}

			// delete cookie (set expiration date to one hour ago)
			setcookie('rememberMe', '', time() - 3600, '/');
		}
	}
}
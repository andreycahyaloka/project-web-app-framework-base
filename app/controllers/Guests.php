<?php

namespace app\controllers;

use framework\View;
use app\auth\Auth;
// use app\auth\MailerController;

/**
 * guests controller
 */
class Guests extends \framework\Controller {
	/**
	 * before filter
	 * 
	 * @return void
	 */
	protected function before() {
		// echo '~(before)~';
		// echo '<br /><br />';
		// return false;
	}

	/**
	 * after filter
	 * 
	 * @return void
	 */
	protected function after() {
		// echo '<br /><br />';
		// echo '~(after)~';
	}

	/**
	 * index
	 * 
	 * @return void
	 */
	public function indexAction() {
		View::render('guests/index.php', [
			'name' => 'skythyx',
			'colors' => ['green', 'purple', 'black']
		]);
	}

	/**
	 * about
	 * 
	 * @return void
	 */
	public function aboutAction() {
		// php-mailer test
		// MailerController::sendMail('clocksync619@gmail.com', 'test subject', 'test text', 'test <b>html</b>');

		View::render('guests/about.php', [
			'currentUser' => Auth::getUser()
		]);

		// var_dump(Auth::getUser());
	}
}
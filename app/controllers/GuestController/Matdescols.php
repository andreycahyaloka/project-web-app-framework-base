<?php

namespace app\controllers\GuestController;

use framework\Controller;
use framework\View;

/**
 * material design colors controller
 */
class Matdescols extends Controller {
	/**
	 * prepare
	 * 
	 * @return void
	 */
	protected function matdescolPrepareAction() {
		// 
	}

	/**
	 * matdescols
	 * 
	 * @return void
	 */
	public function matdescolAction() {
		View::render('guests/matdescol.php');
	}
}
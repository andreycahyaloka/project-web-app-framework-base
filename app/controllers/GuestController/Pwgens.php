<?php

namespace app\controllers\GuestController;

use framework\Controller;
use framework\View;
use classes\pwgen\Pwgen;

/**
 * password generators controller
 */
class Pwgens extends Controller {
	/**
	 * prepare
	 * 
	 * @return void
	 */
	protected function pwgenPrepareAction() {
		// define placeholder
		$pwgenLength = 1;
		$pwgenEnableLowercase = false;
		$pwgenEnableUppercase = false;
		$pwgenEnableNumber = false;

		$pwgenLengthError = [];
		$pwgenOutput = '';

		if (!empty($_POST['pwgenLength'])) {
			$pwgenLength = $_POST['pwgenLength'];
		}

		if (!empty($_POST['pwgenEnableLowercase'])) {
			$pwgenEnableLowercase = $_POST['pwgenEnableLowercase'];
		}

		if (!empty($_POST['pwgenEnableUppercase'])) {
			$pwgenEnableUppercase = $_POST['pwgenEnableUppercase'];
		}

		if (!empty($_POST['pwgenEnableNumber'])) {
			$pwgenEnableNumber = $_POST['pwgenEnableNumber'];
		}

		$pwgenLengthValidator = preg_match(
			'/^[0-9]{1,3}$/',
			$pwgenLength);

		if (!$pwgenLengthValidator) {
			$pwgenLengthError = [
				'number only (0-9).',
				'1-3 characters.'
			];
		}
		else {
			try {
				$pwgen = new Pwgen();
				$pwgenOutput = $pwgen->passwordGenerator($pwgenLength, $pwgenEnableLowercase, $pwgenEnableUppercase, $pwgenEnableNumber);
			}
			catch (\Exception $e) {
				return null;
			}
		}

		$pwgenLengths = $pwgenLength;
		$pwgenLengthErrors = $pwgenLengthError;
		$pwgenOutputs = $pwgenOutput;

		$pwgens = [
			'pwgenLengths' => $pwgenLengths,
			'pwgenLengthErrors' => $pwgenLengthErrors,
			'pwgenOutputs' => $pwgenOutputs
		];

		// return null;
		return $pwgens;
	}

	/**
	 * pwgens
	 * 
	 * @return void
	 */
	public function pwgenAction() {
		$pwgens = $this->pwgenPrepareAction();
		// var_dump($pwgens);

		View::render('guests/pwgen.php', [
			'pwgens' => $pwgens
		]);
	}

	/**
	 * pwgens ajax
	 * 
	 * @return void
	 */
	public function pwgenAjaxAction() {
		$pwgens = $this->pwgenPrepareAction();
		// var_dump($pwgens);

		try {
			echo json_encode($pwgens);
		}
		catch (\Exception $e) {
			return null;
			echo $e->getMessage();
		}
	}
}
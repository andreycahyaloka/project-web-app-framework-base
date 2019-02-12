<?php

namespace app\controllers\GuestController;

use framework\Controller;
use framework\View;
use classes\strrev\Strrev;

/**
 * age calculators controller
 */
class Strrevs extends Controller {
	/**
	 * prepare
	 * 
	 * @return void
	 */
	protected function strrevPrepareAction() {
		// define placeholder
		$strrevString = 'hello world!';

		$strrevStringError = [];
		$strrevOutput = '';

		if (!empty($_POST['strrevString'])) {
			$strrevString = $_POST['strrevString'];
		}

		// `~!@#$%^&*()-_=+[]{}\|;:'",.<>/?
		$strrevStringValidator = preg_match(
			'/^([a-zA-Z0-9 ]|[\`\~\!\@\#\$\%\^\&\*\(\)\-\_\=\+\[\]\{\}\\\|\;\:\'\"\,\.\<\>\/\?]){2,128}$/',
			$strrevString);
		
		if (!$strrevStringValidator) {
			$strrevStringError = [
				'format (lowercase, uppercase, number, whitespace, symbol).',
				'2-128 characters.'
			];
		}
		else {
			try {
				$strrev = new Strrev();
				$strrevOutput = $strrev->stringReverser($strrevString);
			}
			catch (\Exception $e) {
				return null;
			}
		}

		$strrevStrings = $strrevString;
		$strrevStringErrors = $strrevStringError;
		$strrevOutputs = $strrevOutput;

		$strrevs = [
			'strrevStrings' => $strrevStrings,
			'strrevStringErrors' => $strrevStringErrors,
			'strrevOutputs' => $strrevOutputs
		];

		return $strrevs;
	}

	/**
	 * strrevs
	 * 
	 * @return void
	 */
	public function strrevAction() {
		$strrevs = $this->strrevPrepareAction();
		// var_dump($strrevs);

		View::render('guests/strrev.php', [
			'strrevs' => $strrevs
		]);
	}

	/**
	 * strrevs ajax
	 * 
	 * @return void
	 */
	public function strrevAjaxAction() {
		$strrevs = $this->strrevPrepareAction();

		try {
			echo json_encode($strrevs);
		}
		catch (\Exception $e) {
			return null;
		}
	}
}
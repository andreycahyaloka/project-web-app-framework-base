<?php

namespace app\controllers\GuestController;

use framework\Controller;
use framework\View;
use classes\agecalc\Agecalc;

/**
 * age calculators controller
 */
class Agecalcs extends Controller {
	/**
	 * prepare
	 * 
	 * @return void
	 */
	protected function agecalcPrepareAction() {
		// define placeholder
		// $agecalcDate = '01/01/1900';
		$agecalcDate = date('m/d/Y');

		$agecalcDateError = [];
		$agecalcOutput = '';

		if (!empty($_POST['agecalcDate'])) {
			$agecalcDate = $_POST['agecalcDate'];
		}

		$agecalcDateValidator = preg_match(
			'/^(0[1-9]|1[0-2])[\/](0[1-9]|1[0-9]|2[0-9]|3[0-1])[\/]((19|20)([0-9]){2})$/',
			$agecalcDate);
		
		if (!$agecalcDateValidator) {
			$agecalcDateError = [
				'date format (mm/dd/yyyy).',
				'10 characters.'
			];
		}
		else {
			try {
				$agecalc = new Agecalc();
				$agecalcOutput = $agecalc->ageCalculator($agecalcDate);
			}
			catch (\Exception $e) {
				return null;
			}
		}

		$agecalcDates = $agecalcDate;
		$agecalcDateErrors = $agecalcDateError;
		$agecalcOutputs = $agecalcOutput;

		$agecalcs = [
			'agecalcDates' => $agecalcDates,
			'agecalcDateErrors' => $agecalcDateErrors,
			'agecalcOutputs' => $agecalcOutputs
		];

		return $agecalcs;
	}

	/**
	 * agecalcs
	 * 
	 * @return void
	 */
	public function agecalcAction() {
		$agecalcs = $this->agecalcPrepareAction();
		// var_dump($agecalcs);

		View::render('guests/agecalc.php', [
			'agecalcs' => $agecalcs
		]);
	}

	/**
	 * agecalcs ajax
	 * 
	 * @return void
	 */
	public function agecalcAjaxAction() {
		$agecalcs = $this->agecalcPrepareAction();

		try {
			echo json_encode($agecalcs);
		}
		catch (\Exception $e) {
			return null;
		}
	}
}
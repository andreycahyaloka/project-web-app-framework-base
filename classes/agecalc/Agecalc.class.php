<?php

namespace classes\agecalc;

/**
 * age calculator class
 */
class Agecalc {
	/**
	 * @param string $agecalcDate - the date of the birthdate
	 * @param string $agecalcDateTarget - new date of the birthdate
	 * @param string $agecalcDateCurrent - current-date
	 * @param string $agecalcDateInterval - interval between date-target to date-current
	 * @param string $agecalcOutput
	 * @return void
	 */
	public function ageCalculator($agecalcDate) {
		// date of the birthdate
		// $agecalcDateTarget = date_format($agecalcDate, 'm/d/Y');
		$agecalcDateTarget = new \DateTime($agecalcDate);
		$agecalcDateTarget->format('m/d/Y');

		// current date
		$agecalcDateCurrent = new \DateTime(date('m/d/Y'));
		$agecalcDateCurrent->format('m/d/Y');

		// interval between dateTarget to dateCurrent
		$agecalcDateInterval = $agecalcDateTarget->diff($agecalcDateCurrent);

		// date interval
		$agecalcOutput = $agecalcDateInterval->format('%y Year(s). %m Month(s). %d Day(s).');

		return $agecalcOutput;

		// ageCalculator($agecalc_date);
		// ageCalculator('12/31/1999');
	}
}
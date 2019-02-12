<?php

namespace classes\pwgen;

/**
 * password generator class
 */
class Pwgen {
	/**
	 * @param int $pwgenLength - the length of the generated password
	 * @param bool $pwgenEnableLowercase - enable lowercase character
	 * @param bool $pwgenEnableUppercase - enable uppercase character
	 * @param bool $pwgenEnableNumber - enable number character
	 * @param array $pwgenLowercase - lowercase character
	 * @param array $pwgenUppercase - uppercase character
	 * @param array $pwgenNumber - number character
	 * @param array $pwgenMerge - merge all character type
	 * @param string $pwgenString - convert array to string
	 * @param string $pwgenRepeat - repeat converted string
	 * @param string $pwgenRandom - random repeated string
	 * @param string $pwgenOutput
	 * @return void
	 */
	public function passwordGenerator($pwgenLength, $pwgenEnableLowercase, $pwgenEnableUppercase, $pwgenEnableNumber) {
		// define character type variable
		$pwgenLowercase = [];
		$pwgenUppercase = [];
		$pwgenNumber = [];

		// define lowercase character type
		if ($pwgenEnableLowercase == true) {
			$pwgenLowercase = ['abcdefghijklmnopqrstuvwxyz'];
		}

		// define uppercase character type
		if ($pwgenEnableUppercase == true) {
			$pwgenUppercase = ['ABCDEFGHIJKLMNOPQRSTUVWXYZ'];
		}

		// define number character type
		if ($pwgenEnableNumber == true) {
			$pwgenNumber = ['0123456789'];
		}

		// merge type (multiple array-variable to one array-variable)
		$pwgenMerge = array_merge($pwgenLowercase, $pwgenUppercase, $pwgenNumber);

		// array-variable to string-variable
		$pwgenString = implode('', $pwgenMerge);

		// repeat converted string to (defined length) times
		$pwgenRepeat = str_repeat($pwgenString, $pwgenLength);

		// random repeated string
		$pwgenRandom = str_shuffle($pwgenRepeat);

		// length string
		$pwgenOutput = substr($pwgenRandom, 0, $pwgenLength);

		return $pwgenOutput;

		// passwordGenerator($pwgen_length, $pwgen_lowercase, $pwgen_uppercase, $pwgen_number);
		// passwordGenerator(12, true, true, true);
	}
}
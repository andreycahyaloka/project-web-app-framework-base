<?php

namespace classes\strrev;

/**
 * string reverser class
 */
class Strrev {
	/**
	 * @param string $strrevString - the string to be reversed
	 * @param string $strrevOutput
	 * @return void
	 */
	public function stringReverser($strrevString) {
		// reversed string
		$strrevOutput = strrev($strrevString);

		return $strrevOutput;

		// stringReverser($strrev_string);
		// stringReverser('hello world!');
	}
}
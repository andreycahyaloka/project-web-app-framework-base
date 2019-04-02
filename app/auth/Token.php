<?php

namespace app\auth;

/**
 * unique random tokens
 */
class Token {
	/**
	 * the token value
	 * 
	 * @var array
	 */
	protected $token;

	/**
	 * class constructor.
	 * create a new random token or assign an existing one if passed in.
	 * 
	 * @param string $tokenValue - (optional) a token value
	 * @return void
	 */
	public function __construct($tokenValue = null) {
		if ($tokenValue) {
			$this->token = $tokenValue;
		}
		else {
			// generate a new random token
			// 16 bytes = 128 bits = 32 hex characters
			$this->token = bin2hex(random_bytes(16));
		}
	}

	/**
	 * get the token value
	 * 
	 * @return string - the value
	 */
	public function getTokenValue() {
		return $this->token;
	}

	/**
	 * get the hashed token value
	 * 
	 * @return string - the hashed token value
	 */
	public function getTokenHash() {
		// sha256 = 64 chars
		return hash_hmac('sha256', $this->token, SECRET_KEY);
	}
}
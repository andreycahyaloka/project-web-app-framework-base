<?php

namespace app\messages;

/**
 * flash messages controller
 * flash notification messages: messages for one-time display
 * using the session for storage between requests.
 */
class Flash {
	/**
	 * message type
	 * 
	 * @var string
	 */
	const SUCCESS = 'success';
	const INFO = 'info';
	const WARNING = 'warning';
	const DANGER = 'danger';

	/**
	 * add a message
	 * 
	 * @param string $message - the message content
	 * @param string $type - the optional message type, defaults to 'success'
	 * @return void
	 */
	public static function addMessage($text, $type = 'success') {
		if (! isset($_SESSION['flashNotifications'])) {
			$_SESSION['flashNotifications'] = [];
		}

		// append the message in the array
		$_SESSION['flashNotifications'][] = [
			'text' => $text,
			'type' => $type
		];
	}

	/**
	 * get all the messages
	 * 
	 * @param array $messages
	 * @return mixed - an array with all the messages or null if none set
	 */
	public static function getMessages() {
		if (isset($_SESSION['flashNotifications'])) {
			// set messages into variable
			$messages = $_SESSION['flashNotifications'];

			// unset the messages from session
			unset($_SESSION['flashNotifications']);

			// return the variable
			return $messages;
		}
	}
}
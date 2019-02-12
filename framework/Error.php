<?php

namespace framework;

use config\Config;
use framework\View;

/**
 * error and exception handler
 */
class Error {
	/**
	 * error handler.
	 * convert all "errors" to "exceptions" by throwing an "ErrorException".
	 * 
	 * @param int $level error level
	 * @param string $message error message
	 * @param string $file filename the error was raised in
	 * @param int $line line number in the file
	 * @return void
	 */
	public static function errorHandler($level, $message, $file, $line) {
		// to keep the @ operator working
		if (error_reporting() !== 0) {
			throw new \ErrorException($message, 0, $level, $file, $line);
		}
	}

	/**
	 * exception handler.
	 * 
	 * @param Exception $exception the exception
	 * @return void
	 */
	public static function exceptionHandler($exception) {
		// set http status code
		// 404 - not found
		// 500 - general error
		$code = $exception->getCode();

		if ($code != 404) {
			$code = 500;
		}
		http_response_code($code);

		if (Config::SHOW_ERRORS) {
			// set error messages
			echo '<h3>Fatal error!</h3>';
			echo '<p>Uncaught exception : "' . get_class($exception) . '"</p>';
			echo '<p>Message :<br />"' . $exception->getMessage() . '"</p>';
			echo '<p>Stack trace :<pre>' . $exception->getTraceAsString() . '</pre></p>';
			echo '<p>Thrown in :<br />"' . $exception->getFile() . '"<b> on line ' . $exception->getLine() . '.</b></p>';

			View::render('errors/' . $code . '.php');
		}
		else {
			// set error log directory
			$log = dirname(__DIR__) . '/logs/' . date('Y-M-d') . '.txt';
			ini_set('error_log', $log);

			// set error_log messages
			$message = "\n" . 'Uncaught exception : "' . get_class($exception) . '"';
			$message .= "\n";
			$message .= 'Message :' . "\n" .
				'"' . $exception->getMessage() . '"';
			$message .= "\n";
			$message .= 'Stack trace :' . "\n" .
				$exception->getTraceAsString();
			$message .= "\n";
			$message .= 'Thrown in :' . "\n" .
				'"' . $exception->getFile() . '"' . ' on line ' . $exception->getLine();
			$message .= "\n";

			error_log($message);

			// if ($code == 404) {
			// 	echo '<h3>Page not found.</h3>';
			// }
			// else {
			// 	echo '<h3>An error occured.</h3>';
			// }

			View::render('errors/' . $code . '.php');
		}
	}
}
<?php

namespace framework;

/**
 * view
 */
class View {
	/**
	 * render a view file
	 * 
	 * @param string $view the view file
	 * @param array $args - associative array of data to display in the view (optional)
	 * @return void
	 */
	public static function render($view, $args = []) {
		echo static::getRender($view, $args);
	}

	/**
	 * get the rendered of a view template
	 * 
	 * @param string $view - the view file
	 * @param array $args - associative array of data to display in the view (optional)
	 * @return string
	 */
	public static function getRender($view, $args = []) {
		extract($args, EXTR_SKIP);

		// relative to directory
		$file = BASE_PATH . 'app/views/' . $view;

		if (is_readable($file)) {
			require $file;
			// $contentFile = require $file;
		}
		else {
			// throw error exception
			throw new \Exception('"' . $file . '" not found.', 404);
		}

		// return $contentFile;
	}

	/**
	 * get the content of the file
	 * 
	 * @param string $view - the view file
	 * @param array $args - associative array of data to display in the view (optional)
	 * @return string
	 */
	public static function getContent($view, $args = []) {
		extract($args, EXTR_SKIP);

		// relative to directory
		$file = BASE_PATH . "app/views/$view";

		if (is_readable($file)) {
			// file into variable
			ob_start();
			require $file;
			$contentFile = ob_get_contents();
			ob_end_clean();
		}
		else {
			// throw error exception
			throw new \Exception('"' . $file . '" not found.', 404);
		}

		return $contentFile;
	}
}
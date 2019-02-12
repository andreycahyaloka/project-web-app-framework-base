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
	 * @return void
	 */
	public static function render($view, $args = []) {
		extract($args, EXTR_SKIP);

		// relative to directory
		$file = "../app/views/$view";

		if (is_readable($file)) {
			require $file;
		}
		else {
			// throw error exception
			throw new \Exception('"' . $file . '" not found.', 404);
		}
	}
}
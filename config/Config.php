<?php

namespace config;

/**
 * application configuration
 */
class Config {
	/**
	 * set base url
	 * ../views/layouts/_head.php (href)
	 */
	// const BASE_URL = 'http://127.0.0.1/base-hybrid/project-web-app-framework-base/public/';
	const BASE_URL = 'http://127.0.0.1/base-hybrid/project-web-app-framework-base/';

	/**
	 * set default timezone
	 */
	const DEFAULT_TIMEZONE = 'Asia/Jakarta';

	/**
	 * set default locale
	 */
	const DEFAULT_LOCALE = 'en_US.UTF-8';

	/**
	 * database
	 */
		/**
		 * set database charset
		 * 
		 * @var string
		 */
		const DB_CHARSET = 'utf8';

		/**
		 * set database host
		 * 
		 * @var string
		 */
		const DB_HOST = '127.0.0.1';

		/**
		 * set database name
		 * 
		 * @var string
		 */
		const DB_NAME = 'project-web-app-framework-base-db';

		/**
		 * set database user
		 * 
		 * @var string
		 */
		const DB_USERNAME = 'root';

		/**
		 * set database password
		 * 
		 * @var string
		 */
		const DB_PASSWORD = 'root';

	/**
	 * set error and exception handler
	 * show or hide error messages on html
	 * 
	 * @var boolean
	 */
	const SHOW_ERRORS = true;
}
<?php

namespace config;

// require dirname(__DIR__) . '/config/' . 'globalConfigEnv.php';

/**
 * set base_url
 * href="<?php echo BASE_URL; ?>about"
 * const BASE_URL = 'http://127.0.0.1/xxx/xxx/';
 * # ../views/layouts/_head.php (href)
 * 
 * @var string
 */
define('BASE_URL', $_ENV['BASE_URL']);

/**
 * set base_path
 * "<?php echo BASE_PATH; ?>public/index.php"
 * define('BASE_PATH', $_SERVER["DOCUMENT_ROOT"] . '/xxx/xxx/');
 * 
 * @var string
 */
define('BASE_PATH', $_ENV['BASE_PATH']);
// const BASE_PATH = $_ENV['BASE_PATH'];

/**
 * set default_timezone
 */
define('DEFAULT_TIMEZONE', $_ENV['DEFAULT_TIMEZONE']);

/**
 * set default_locale
 */
define('DEFAULT_LOCALE', $_ENV['DEFAULT_LOCALE']);

/**
 * database
 */
	/**
	 * set database_charset
	 * 
	 * @var string
	 */
	define('DB_CHARSET', $_ENV['DB_CHARSET']);

	/**
	 * set database_host
	 * 
	 * @var string
	 */
	define('DB_HOST', $_ENV['DB_HOST']);

	/**
	 * set database_name
	 * 
	 * @var string
	 */
	define('DB_NAME', $_ENV['DB_NAME']);

	/**
	 * set database_username
	 * 
	 * @var string
	 */
	define('DB_USERNAME', $_ENV['DB_USERNAME']);

	/**
	 * set database_password
	 * 
	 * @var string
	 */
	define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

/**
 * set secret_key for token-hash
 * 32 characters
 * 
 * @var boolean
 */
define('SECRET_KEY', $_ENV['SECRET_KEY']);

/**
 * custom global-config-constant
 */
	/**
	 * set smtp_mailer_host
	 * 
	 * @var string
	 */
	define('MAILER_HOST', $_ENV['MAILER_HOST']);

	/**
	 * set smtp_secure
	 * 
	 * @var string
	 */
	// define('MAILER_SMTP_SECURE', $_ENV['MAILER_SMTP_SECURE']);

	/**
	 * set tcp_port
	 * 
	 * @var string
	 */
	// define('MAILER_PORT', $_ENV['MAILER_PORT']);

	/**
	 * set mailer_name
	 * 
	 * @var string
	 */
	define('MAILER_NAME', $_ENV['MAILER_NAME']);

	/**
	 * set mailer_password
	 * 
	 * @var string
	 */
	define('MAILER_PASSWORD', $_ENV['MAILER_PASSWORD']);

// echo 'fuck_const';
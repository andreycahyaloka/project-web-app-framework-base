<?php

namespace framework;

use config\Config;
use PDO;

/**
 * model
 */
abstract class Model {
	/**
	 * get the pdo database connection
	 * 
	 * @return void
	 */
	protected static function getDB() {
		$db = null;

		if ($db == null) {
			$dsn = 'mysql:host=' . Config::DB_HOST .
				';dbname=' . Config::DB_NAME .
				';charset=' . Config::DB_CHARSET . ';';

			$db = new PDO($dsn,
				Config::DB_USERNAME,
				Config::DB_PASSWORD);

			// throw an exception when an error occurs
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $db;
		}
	}
}
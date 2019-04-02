<?php

namespace framework;

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
			$dsn = 'mysql:host=' . DB_HOST .
				';dbname=' . DB_NAME .
				';charset=' . DB_CHARSET . ';';

			$db = new PDO($dsn,
				DB_USERNAME,
				DB_PASSWORD);

			// throw an exception when an error occurs
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $db;
		}
	}
}
<?php

namespace app\models;

use PDO;

/**
 * posts model
 */
class Post extends \framework\Model {
	/**
	 * get all the posts as an associative array
	 * 
	 * @return array
	 */
	public static function getAll() {
		try {
			$db = static::getDB();

			$stmt = $db->query(
				'SELECT
					*
				FROM
					posts
				ORDER BY
					updated_at
				ASC');

			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $results;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
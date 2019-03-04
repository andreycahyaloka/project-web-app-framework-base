<?php

namespace app\models;

use framework\Model;
use PDO;

/**
 * users model
 */
class User extends Model {
	/**
	 * error messages
	 * 
	 * @var array
	 */
	public $errors = [];

	/**
	 * class constructor
	 * 
	 * @param array $data - initial property values
	 * @return void
	 */
	public function __construct($data = []) {
		// convert ($data - array) to ($user - object property)
		// convert ['name' => 'skythyx'] to $user->name = 'skythyx'
		foreach ($data as $key => $value) {
			$this->$key = $value;
		}
	}

	/**
	 * save the user model with the current property values
	 * 
	 * @return void
	 */
	public function save() {
		$this->validate();

		if (empty($this->errors)) {
			$sql = 'INSERT INTO
						users (name, email, password)
					VALUES
						(:name, :email, :password)';

			$db = Model::getDB();
			$stmt = $db->prepare($sql);

			$password_hash = password_hash($this->inputPassword, PASSWORD_DEFAULT);

			$stmt->bindValue(':name', $this->registerName, PDO::PARAM_STR);
			$stmt->bindValue(':email', $this->registerEmail, PDO::PARAM_STR);
			$stmt->bindValue(':password', $password_hash, PDO::PARAM_STR);

			return $stmt->execute();
		}
		return false;
	}

	/**
	 * validate current property values,
	 * adding validation error messages to the errors array property
	 * 
	 * @return void
	 */
	protected function validate() {
		// name
		if ($this->registerName == '') {
			$this->errors[] = 'name is required.';
		}

		// email
		if (filter_var($this->registerEmail, FILTER_VALIDATE_EMAIL) == false) {
			$this->errors[] = 'invalid email.';
		}
		if (static::emailExists($this->registerEmail)) {
			$this->errors[] = 'email already exists.';
		}
	}

	/**
	 * check if a record already exists with the specified email
	 * 
	 * @param string $email - email address to search for
	 * @return boolean true - if a record already exists with the specified email, false - otherwise
	 */
	public static function emailExists($email) {
		// $sql = 'SELECT *
		// 		FROM
		// 			users
		// 		WHERE
		// 			email = :email;';

		// $db = static::getDB();
		// $stmt = $db->prepare($sql);

		// $stmt->bindParam(':email', $email, PDO::PARAM_STR);
		// $stmt->execute();

		// return $stmt->fetch() != false;

		return static::findByEmail($email) != false;
	}

	/**
	 * find a user model by email address
	 * 
	 * @param string $email - email address to search for
	 * @return mixed - user object if found, false otherwise
	 */
	public static function findByEmail($email) {
		$sql = 'SELECT *
				FROM
					users
				WHERE
					email = :email;';

		$db = static::getDB();
		$stmt = $db->prepare($sql);

		$stmt->bindValue(':email', $email, PDO::PARAM_STR);

		$stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

		$stmt->execute();

		return $stmt->fetch();
	}

	/**
	 * authenticate a user by email and password
	 * 
	 * @param string $email - email address
	 * @param string $password - password
	 * @return mixed - the user object or false if authentication fails
	 */
	public static function authenticate($email, $password) {
		$users = static::findByEmail($email);

		if ($users) {
			if (password_verify($password, $users->password)) {
				return $users;
			}
		}

		return false;
	}
}
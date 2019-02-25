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
	public function __construct($data) {
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

			$password_hash = password_hash($this->signupPassword, PASSWORD_DEFAULT);

			$stmt->bindValue(':name', $this->signupName, PDO::PARAM_STR);
			$stmt->bindValue(':email', $this->signupEmail, PDO::PARAM_STR);
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
		if ($this->signupName == '') {
			$this->errors[] = 'name is required.';
		}

		// email
		if (filter_var($this->signupEmail, FILTER_VALIDATE_EMAIL) == false) {
			$this->errors[] = 'invalid email.';
		}
		if (static::emailExists($this->signupEmail)) {
			$this->errors[] = 'email already exists.';
		}

		// confirm password
		if ($this->signupConfirmPassword != $this->signupPassword) {
			$this->errors[] = 'password confirmation not match.';
		}
	}

	/**
	 * check if a record already exists with the specified email
	 * 
	 * @param string $email - email address to search for
	 * @return boolean true - if a record already exists with the specified email, false - otherwise
	 */
	public static function emailExists($email) {
		$sql = 'SELECT *
				FROM
					users
				WHERE
					email = :email;';

		$db = static::getDB();
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch() != false;
	}
}
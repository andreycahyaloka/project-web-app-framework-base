<?php

namespace app\models;

use framework\Model;
use framework\View;
use app\auth\Token;
use app\auth\MailController;
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
	 * create the user model with the current property values
	 * 
	 * @return boolean - true if the user was created, false otherwise
	 */
	public function create() {
		$this->validate();

		if (empty($this->errors)) {
			$passwordHash = password_hash($this->inputPassword, PASSWORD_DEFAULT);

			$token = new Token();
			$tokenHash = $token->getTokenHash();
			$this->confirmationToken = $token->getTokenValue();

			$sql = 'INSERT INTO
						users (name, email, password, confirmation_hash)
					VALUES
						(:name, :email, :password, :confirmation_hash);';

			$db = Model::getDB();
			$stmt = $db->prepare($sql);

			$stmt->bindValue(':name', $this->registerName, PDO::PARAM_STR);
			$stmt->bindValue(':email', $this->registerEmail, PDO::PARAM_STR);
			$stmt->bindValue(':password', $passwordHash, PDO::PARAM_STR);
			$stmt->bindValue(':confirmation_hash', $tokenHash, PDO::PARAM_STR);

			return $stmt->execute();
		}

		return false;
	}

	/**
	 * send confirmtion link in an email to the user
	 * 
	 * @return void
	 */
	public function sendConfirmationEmail() {
		$url = BASE_URL . 'confirmaccount/' . $this->confirmationToken;

		// email content as text
		$emailText = View::getContent('users/confirmemailcontenttext.php', [
			'url' => $url,
			'token' => $this->confirmationToken
		]);
		// email content as html
		$emailHtml = View::getContent('users/confirmemailcontenthtml.php', [
			'url' => $url,
			'token' => $this->confirmationToken
		]);

		MailController::sendMail('clocksync619@gmail.com', 'Account Confirmation', $emailText, $emailHtml);
	}

	/**
	 * confirm the user account with the specified confirmation token
	 * 
	 * @param string $token - confirmation token from the url
	 * @return void
	 */
	public static function getConfirmAccount($token) {
		$token = new Token($token);
		$tokenHash = $token->getTokenHash();

		$sql = 'UPDATE
					users
				SET
					confirmed = :confirmed,
					confirmation_hash = NULL
				WHERE
					confirmation_hash = :confirmation_hash;';

		$db = Model::getDB();
		$stmt = $db->prepare($sql);

		$stmt->bindValue(':confirmed', 1, PDO::PARAM_INT);
		$stmt->bindValue(':confirmation_hash', $tokenHash, PDO::PARAM_STR);

		$stmt->execute();
	}

	/**
	 * find a user model by id
	 * 
	 * @param string $id - the user id
	 * @return mixed - user object if found, false otherwise
	 */
	public static function findById($id) {
		$sql = 'SELECT *
				FROM
					users
				WHERE
					id = :id;';

		$db = Model::getDB();
		$stmt = $db->prepare($sql);

		$stmt->bindValue(':id', $id, PDO::PARAM_INT);

		$stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

		$stmt->execute();

		return $stmt->fetch();
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

		$db = Model::getDB();
		$stmt = $db->prepare($sql);

		$stmt->bindValue(':email', $email, PDO::PARAM_STR);

		$stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

		$stmt->execute();

		return $stmt->fetch();
	}

	/**
	 * check if a user record already exists with the specified email
	 * 
	 * @param string $email - email address to search for
	 * @param string $ignoreId - return false anyway if the record found has this id
	 * @return boolean - true if a record already exists with the specified email, false otherwise
	 */
	public static function emailExists($email, $ignoreId = null) {
		$user = static::findByEmail($email);

		if ($user) {
			if ($user->id != $ignoreId) {
				return true;
			}
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
		if (isset($this->registerName) && empty($this->registerName)) {
			$this->errors[] = 'name => required.';
		}

		// email
		if (
			(isset($this->registerEmail) && empty($this->registerEmail)) ||
			(isset($this->loginEmail) && empty($this->loginEmail)) ||
			(isset($this->forgotEmail) && empty($this->forgotEmail))
		) {
			$this->errors[] = 'email => required.';
		}
		if (isset($this->registerEmail)) {
			if (!filter_var($this->registerEmail, FILTER_VALIDATE_EMAIL)) {
				$this->errors[] = 'email => invalid.';
			}
			if (static::emailExists($this->registerEmail, $this->id ?? null)) {
				$this->errors[] = 'email => already exists.';
			}
		}

		// password
		if (isset($this->inputPassword)) {
			if (strlen($this->inputPassword) < 6) {
				$this->errors[] = 'password => please enter at least 6 characters.';
			}
			if (
				(preg_match('/.*[a-z]+.*/i', $this->inputPassword) == 0) ||
				(preg_match('/.*\d+.*/i', $this->inputPassword) == 0)
			) {
				$this->errors[] = 'password => must contain at least one letter and one number.';
			}
		}
		
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

		// check the user account is exist and confirmed
		if ($users && $users->confirmed) {
			if (password_verify($password, $users->password)) {
				return $users;
			}
		}

		return false;
	}

	/**
	 * remember the login by inserting a new unique token into the
	 * user_remember_logins table for this user record
	 * 
	 * @return boolean - true if the login was remembered successfully, false otherwise
	 */
	public function rememberLogin() {
		$token = new Token();
		$tokenHash = $token->getTokenHash();
		$this->rememberToken = $token->getTokenValue();

		// set expired remember login = 30 days from now
		// time(); 60 secs = 1 minute; 60 mins = 1 hour; 24 hours = 1 day; 30 days = 1 month;
		$this->expiryTimestamp = time() + (60 * 60 * 24 * 30);

		$sql = 'INSERT INTO
					user_remember_logins (token_hash, user_id, expired_at)
				VALUES
					(:token_hash, :user_id, :expired_at)';

		$db = Model::getDB();
		$stmt = $db->prepare($sql);

		$stmt->bindValue(':token_hash', $tokenHash, PDO::PARAM_STR);
		$stmt->bindValue(':user_id', $this->id, PDO::PARAM_INT);
		$stmt->bindValue(':expired_at', date('Y-m-d H:i:s', $this->expiryTimestamp), PDO::PARAM_STR);

		return $stmt->execute();
	}

	/**
	 * send password reset instructions to the user specified
	 * 
	 * @param string $email - the email address
	 * @return void
	 */
	public static function sendPasswordReset($email) {
		$user = static::findByEmail($email);

		if ($user) {
			if ($user->startPasswordReset()) {
				$user->sendPasswordResetEmail();
			}
		}
	}

	/**
	 * start the password reset process by generating a new token and expiry
	 * 
	 * @return void
	 */
	protected function startPasswordReset() {
		$token = new Token();
		$tokenHash = $token->getTokenHash();
		$this->passwordResetToken = $token->getTokenValue();

		// set expired password reset = 1 hour from now
		$expiryTimestamp = time() + (60 * 60 * 1);

		$sql = 'UPDATE
					users
				SET
					password_reset_hash = :password_reset_hash,
					password_reset_exp = :password_reset_exp
				WHERE
					id = :id';

		$db = Model::getDB();
		$stmt = $db->prepare($sql);

		$stmt->bindValue(':password_reset_hash', $tokenHash, PDO::PARAM_STR);
		$stmt->bindValue(':password_reset_exp', date('Y-m-d H:i:s', $expiryTimestamp), PDO::PARAM_STR);
		$stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

		return $stmt->execute();
	}

	/**
	 * send password reset instructions in an email to the user
	 * 
	 * @return void
	 */
	protected function sendPasswordResetEmail() {
		$url = BASE_URL . 'resetpassword/' . $this->passwordResetToken;

		// email content as text
		$emailText = View::getContent('users/resetemailcontenttext.php', [
			'url' => $url,
			'token' => $this->passwordResetToken
		]);
		// email content as html
		$emailHtml = View::getContent('users/resetemailcontenthtml.php', [
			'url' => $url,
			'token' => $this->passwordResetToken
		]);

		MailController::sendMail('clocksync619@gmail.com', 'Password Reset', $emailText, $emailHtml);

		// var_dump($this->email);
		// echo '<br />';
		// var_dump($emailHtml);
	}

	/**
	 * find a user model by password reset token and expiry
	 * 
	 * @param string $token - password reset token sent to user
	 * @return mixed - user object if found and the token hasn't expired, null otherwise
	 */
	public static function findByPasswordResetToken($token) {
		$token = new Token($token);
		$tokenHash = $token->getTokenHash();

		$sql = 'SELECT *
				FROM
					users
				WHERE
					password_reset_hash = :password_reset_hash;';

		$db = Model::getDB();
		$stmt = $db->prepare($sql);

		$stmt->bindValue(':password_reset_hash', $tokenHash, PDO::PARAM_STR);

		$stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

		$stmt->execute();

		$user = $stmt->fetch();

		if ($user) {
			// check password reset token hasn't expired
			if (strtotime($user->password_reset_exp) > time()) {
				return $user;
			}
		}
	}

	/**
	 * reset the password
	 * 
	 * @param string $password - the new password
	 * @return boolean - true if the password was updated succesfully, false otherwise
	 */
	public function resetPassword($inputPassword) {
		$this->inputPassword = $inputPassword;

		$passwordHash = password_hash($this->inputPassword, PASSWORD_DEFAULT);

		$this->validate();

		if (empty($this->errors)) {
			$sql = 'UPDATE
						users
					SET
						password = :password,
						password_reset_hash = NULL,
						password_reset_exp = NULL
					WHERE
						id = :id;';

			$db = Model::getDB();
			$stmt = $db->prepare($sql);

			$stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
			$stmt->bindValue(':password', $passwordHash, PDO::PARAM_STR);

			return $stmt->execute();
		}

		return false;
	}
}
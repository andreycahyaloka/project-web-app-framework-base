<?php

namespace app\models;

use framework\Model;
use PDO;
use app\auth\Token;
use app\models\User;

/**
 * remembered login model
 */
class RememberLogin extends Model {
	/**
	 * find a remembered login model by the token
	 * 
	 * @param string $token - the remembered login token
	 * @return mixed - remembered login object if found, false otherwise
	 */
	public static function findByToken($token) {
		$token = new Token($token);
		$tokenHash = $token->getTokenHash();

		$sql = 'SELECT *
				FROM
					user_remember_logins
				WHERE
					token_hash = :token_hash;';

		$db = Model::getDB();
		$stmt = $db->prepare($sql);

		$stmt->bindValue(':token_hash', $tokenHash, PDO::PARAM_STR);

		$stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

		$stmt->execute();

		return $stmt->fetch();
	}

	/**
	 * get the user model associated with this remembered login
	 * 
	 * @return User - the user model
	 */
	public function getUser() {
		return User::findById($this->user_id);
	}

	/**
	 * see if the remember token has expired or not,
	 * based on the current system time
	 * 
	 * @return boolean - true if the token has expired, false otherwise
	 */
	public function hasExpired() {
		return strtotime($this->expired_at) < time();
	}

	/**
	 * delete this model
	 * 
	 * @return void
	 */
	public function deleteLoginFromRememberDatabase() {
		$sql = 'DELETE
				FROM
					user_remember_logins
				WHERE
					token_hash = :token_hash;';

		$db = Model::getDB();
		$stmt = $db->prepare($sql);

		$stmt->bindValue(':token_hash', $this->token_hash, PDO::PARAM_STR);

		$stmt->execute();
	}
}
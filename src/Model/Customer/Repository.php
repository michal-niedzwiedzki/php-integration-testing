<?php

namespace Model\Customer;

/**
 * Customers repository
 */
class Repository {

	/**
	 * Database handler
	 * @var \PDO
	 */
	protected $pdo;

	/**
	 * Constructor
	 */
	public function __construct() {
		$opts = [
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
		];
		$this->pdo = new \PDO("mysql:dbname=myapp", "username", "password", $opts);
	}

	/**
	 * Fetch row by primary key
	 *
	 * @param int $id
	 * @return array
	 */
	public function fetchById($id) {
		return $this->pdo->query("SELECT * FROM customers WHERE id = ? LIMIT 1", $id)
			->fetch();
	}

}
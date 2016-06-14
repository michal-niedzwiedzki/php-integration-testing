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
	public function __construct(\PDO $pdo) {
		$this->pdo = $pdo;
	}

	/**
	 * Fetch row by primary key
	 *
	 * @param int $id
	 * @return array
	 */
	public function fetchById($id) {
		$stmt = $this->pdo->query("SELECT * FROM customers WHERE id = ? LIMIT 1", $id);
		$record = $stmt->fetch();
		$stmt->closeCursor();
		return $record;
	}

}
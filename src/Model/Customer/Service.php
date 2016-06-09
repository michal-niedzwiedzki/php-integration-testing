<?php

namespace Model\Customer;

/**
 * Customers service
 */
class Service {

	/**
	 * Database handler
	 * @var \PDO
	 */
	protected $pdo;

	/**
	 * Return customer entity by id
	 *
	 * @param int $id
	 * @return \Model\Customer\Entity
	 */
	public function getCustomerById($id) {
		$pdo = $this->getDb();
		$repository = new Repository($pdo);
		$row = $repository->fetchById($id);
		$hydrator = new Hydrator();
		return $hydrator->hydrate(new Entity(), $row);
	}

	/**
	 * Set database handler for the service
	 *
	 * @param \PDO $pdo
	 * @return \Model\Customer\Service
	 */
	public function setDb(\PDO $pdo) {
		$this->pdo = $pdo;
		return $this;
	}

	/**
	 * Return database handler
	 *
	 * @return \PDO
	 */
	public function getDb() {
		return $this->pdo;
	}

}
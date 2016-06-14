<?php

namespace Model\Customer;

use \Util\Locator;

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
		$pdo = Locator::get("\\PDO");
		$repository = new Repository($pdo);
		$row = $repository->fetchById($id);
		$hydrator = new Hydrator();
		return $hydrator->hydrate(new Entity(), $row);
	}

}
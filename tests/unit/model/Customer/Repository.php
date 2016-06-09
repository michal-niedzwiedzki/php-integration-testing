<?php

namespace test\unit\model\Customer\Repository;

require_once __DIR__ . "../../../../model/Customer/Repository.php";

use \Model\Customer\Repository;

/**
 * Customers repository test
 */
class RepositoryTest extends PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function test_fetchById() {
		$expected = ["id" => 1, "name" => "John Doe", "email" => "johndoe@gmail.com"];
		// build PDO mock
		$pdo = $this->getMock("PDO");

		// test expectations
		$repository = new Repository($pdo);
		$repository->fetchById(1);


	}

}
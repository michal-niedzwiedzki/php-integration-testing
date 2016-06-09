<?php

namespace Test\Integration\Model\Customer;

use \Model\Customer\Repository;

/**
 * Customer service integration test
 */
class ServiceTest extends PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function test_fetchById() {
		$expected = ["id" => 1, "name" => "John Doe", "email" => "johndoe@gmail.com", "password" => ""];
		// build PDO mock
		$pdo = $this->getMock("PDO");

		// test expectations
		$repository = new Repository($pdo);
		$repository->fetchById(1);

	}

}
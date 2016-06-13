<?php

namespace Test\Unit\Model\Customer;

use \Model\Customer\Repository;

/**
 * Customers repository test
 * @group unit
 */
class RepositoryTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function test_fetchById() {
		$expected = ["id" => 1, "name" => "John Doe", "email" => "johndoe@gmail.com"];

		// build PDO mock
		// $pdo = $this->getMock("\\PDO"); // problem

		// to disable constructor with parameters use:
		$pdo = $this->getMockBuilder("\\PDO")
			->disableOriginalConstructor()
			->getMock();

		// test expectations
		$repository = new Repository($pdo);
		$repository->fetchById(1);
	}

}
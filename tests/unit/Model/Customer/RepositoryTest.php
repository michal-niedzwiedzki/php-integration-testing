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

		// expected value
		$expected = [
			"id" => 1,
			"name" => "John Doe",
			"email" => "johndoe@gmail.com",
			"password" => "",
		];

		// create pdo mock
		$pdo = $this->createMock("\\PDO");
		$stmt = $this->createMock("\\PDOStatement");
		$stmt->expects($this->once())
			->method("fetch")
			->will($this->returnValue($expected));
		$pdo->expects($this->once())
			->method("query")
			->will($this->returnValue($stmt));

		// instantiate repository and fetch actual value
		$repository = new Repository($pdo);
		$actual = $repository->fetchById(1);

		// test actual against expected
		$this->assertEquals($expected, $actual);
	}

}
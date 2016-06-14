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
		$id = 1;
		$expected = [
			"id" => $id,
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
		$stmt->expects($this->at(1))
			->method("closeCursor");
		$pdo->expects($this->once())
			->method("query")
			->with(
				$this->equalTo("SELECT * FROM customers WHERE id = ? LIMIT 1"),
				$this->equalTo($id)
			)
			->will($this->returnValue($stmt));

		// instantiate repository and fetch actual value
		$repository = new Repository($pdo);
		$actual = $repository->fetchById($id);

		// test actual against expected
		$this->assertEquals($expected, $actual);
	}

}
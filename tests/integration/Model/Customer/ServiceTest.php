<?php

namespace Test\Integration\Model\Customer;

use \Model\Customer\Repository;

/**
 * Customer service integration test
 * @group integration
 */
class ServiceTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function test_fetchById() {

		return $this->markTestIncomplete();

		$expected = [
			"id" => 1,
			"name" => "John Doe",
			"email" => "johndoe@gmail.com",
			"password" => "",
		];

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
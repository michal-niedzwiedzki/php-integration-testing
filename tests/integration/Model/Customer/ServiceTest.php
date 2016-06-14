<?php

namespace Test\Integration\Model\Customer;

use \Model\Customer\Entity;
use \Model\Customer\Service;
use \Util\Locator;

/**
 * Customer service integration test
 * @group integration
 */
class ServiceTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @test
	 * @covers \Model\Customer\Service::getCustomerById
	 */
	public function test_getCustomerById() {

		// set expected outcome
		$expected = new Entity();
		$expected->id = 1;
		$expected->name = "John Doe";
		$expected->email = "johndoe@gmail.com";
		$expected->password = "";

		// create pdo mock
		$pdo = $this->createMock("\\PDO");
		$stmt = $this->createMock("\\PDOStatement");
		$stmt->expects($this->once())
			->method("fetch")
			->will($this->returnValue(["id" => 1, "name" => "John Doe", "email" => "johndoe@gmail.com", "password" => "",]));
		$stmt->expects($this->once())->method("closeCursor");
		$pdo->expects($this->once())->method("query")->will($this->returnValue($stmt));

		// inform service locator about pdo mock
		Locator::set("\\PDO", $pdo);

		// fetch actual value
		$service = new Service();

		// test if actual equals expected
		$actual = $service->getCustomerById(1);
		$this->assertEquals($expected, $actual);
	}

}
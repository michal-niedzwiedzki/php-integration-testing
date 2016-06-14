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

		// create pdo instance
		// ...

		// instantiate repository and fetch actual value
		// ...

		// test actual against expected
		// ...
	}

}
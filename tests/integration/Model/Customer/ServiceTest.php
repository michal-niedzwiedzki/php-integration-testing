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

		// set expected outcome
		$expected = [
			"id" => 1,
			"name" => "John Doe",
			"email" => "johndoe@gmail.com",
			"password" => "",
		];

		// fetch actual value
		// ...

		// test if actual equals expected
		// ...
	}

}
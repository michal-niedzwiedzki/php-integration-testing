<?php

namespace Model\Customer;

use \Model\Customer\Entity;

class Hydrator {

	public function hydrate(Entity $customer, array $row) {
		$customer->id = $row["id"];
		$customer->name = $row["name"];
		$customer->email = $row["email"];
		$customer->password = $row["password"];
		return $customer;
	}

	public function persist(Entity $customer) {
		$row = [
			"full_name" => $customer->name,
			"email_address" => $customer->email,
			"password" => password_hash($customer->password),
		];
		$customer->id and $row["id"] = $customer->id;
		return $row;
	}

}
<?php

namespace Model\Customer;

class Hydrator {

	public function hydrate(Customer $customer, array $row) {
		$customer->id = $row["id"];
		$customer->name = $row["full_name"];
		$customer->email = $row["email_address"];
		$customer->password = $row["password_hash"];
	}

	public function persist(Customer $customer) {
		$row = [
			"full_name" => $customer->name,
			"email_address" => $customer->email,
			"password" => password_hash($customer->password),
		];
		$customer->id and $row["id"] = $customer->id;
		return $row;
	}

}
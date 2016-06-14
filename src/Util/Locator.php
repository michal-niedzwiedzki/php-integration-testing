<?php

namespace Util;

class Locator {
	
	protected static $map = [];

	public static function get($name) {
		if (isset(self::$map[$name])) {
			return self::$map[$name];
		}
		// additional logic
		// - lookup in definition table
		// - instantiation on demand
		// - singleton detection
		// - ...
	}

	public static function set($name, $instance) {
		self::$map[$name] = $instance;
	}

}
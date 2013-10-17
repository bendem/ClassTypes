<?php

use ClassTypes\Arr;
use ClassTypes\Char;
use ClassTypes\Float;
use ClassTypes\Int;
use ClassTypes\String;
use ClassTypes\Va;

class VaTest extends PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$str   = new String("Test");
		$int1  = new Int(45);
		$int2  = new Int(18.18);
		$float = new Float(0.5);
		$float = new Float(15);

		$this->assertEquals("Test", $str());
	}

	public function testInvoke() {
		$str = new String();
		$int = new Int();

		$result = $str("Test");

		$this->assertEquals("Test", $result);
		$this->assertEquals("Test", $str());
	}

	public function testToString() {
		$str1 = new String();
		$str2 = new String("Test");

		$this->assertEquals("Test", $str2());
		$this->assertEquals("Test", (string) $str2());
	}

}

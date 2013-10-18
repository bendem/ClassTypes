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

	public function testGet() {
		$str   = new String("Test");
		$int   = new Int(19);
		$float = new Float(-233.95);

		$this->assertEquals("Test", $str->get());
		$this->assertEquals(19, $int->get());
		$this->assertEquals(-233.95, $float->get());
	}

	public function testNew() {
		$int = new Int(9);

		$int2 = $int->add(3);

		$this->assertEquals(9, $int());
		$this->assertEquals(12, $int2());
	}

	public function testInvoke() {
		$str  = new String();
		$int1 = new Int();
		$int2 = new Int();

		$result1 = $str("Test");
		$result2 = $int1(5);
		$result3 = $int2($int1->add(3));

		$this->assertEquals("Test", $result1);
		$this->assertEquals("Test", $str());

		$this->assertEquals(5, $result2);
		$this->assertEquals(8, $result3);

		$this->assertEquals(5, $int1());
		$this->assertEquals(8, $int2());
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testInvokeException() {
		$str = new String();
		$str([]);
	}

	public function testToString() {
		$str1 = new String();
		$str2 = new String("Test");

		$this->assertEquals("Test", $str2());
		$this->assertEquals("Test", (string) $str2());
	}

	public function testCall() {
		$str = new String("Test'");

		$result = $str->add_slashes();
		$this->assertEquals("Test\'", $result());
	}

	/**
	 * @expectedException BadMethodCallException
	 */
	public function testCallException() {
		$str = new String(1);
		$str->undefinedMethod("test");
	}

}

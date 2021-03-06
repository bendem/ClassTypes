<?php

use ClassTypes\Number;
use ClassTypes\Int;
use ClassTypes\Float;

class NumberTest extends PHPUnit_Framework_TestCase {

	public function testAbsolute() {
		$num1 = new Number(3.5);
		$num2 = new Number(-5);

		$result1 = $num1->absolute();
		$result2 = $num2->absolute();

		$this->assertEquals(3.5, $num1());
		$this->assertEquals(-5, $num2());
		$this->assertEquals(3.5, $result1());
		$this->assertEquals(5, $result2());
	}

	public function testSqrt() {
		$int = new Int(25);
		$float = new Float(25);

		$result_int = $int->sqrt();
		$result_float = $float->sqrt();

		$this->assertEquals(25, $int());
		$this->assertEquals(25, $float());
		$this->assertEquals(5, $result_int());
		$this->assertEquals(5.0, $result_float());
	}

}

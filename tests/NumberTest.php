<?php

use ClassTypes\Number;

class NumberTest extends PHPUnit_Framework_TestCase {

	public function testAbsolute() {
		$num1 = new Number(3.5);
		$num2 = new Number(-5);

		$this->assertEquals(3.5, $num1->absolute());
		$this->assertEquals(5, $num2->absolute());
	}

}

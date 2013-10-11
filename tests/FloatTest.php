<?php

use ClassTypes\Float;

class FloatTest extends PHPUnit_Framework_TestCase {

	public function testCeil() {
		$float = new Float(13.5);

		$this->assertEquals(14, $float->ceil());
	}

	public function testRound() {
		$float = new Float(13.5);
		$this->assertEquals(14, $float->round());
	}

	public function testFloor() {
		$float = new Float(13.5);

		$this->assertEquals(13, $float->floor());
	}

}

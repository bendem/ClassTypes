<?php

use ClassTypes\Float;

class FloatTest extends PHPUnit_Framework_TestCase {

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testConstructException() {
		$int = new Float("test");
	}

	public function testCeil() {
		$float1 = new Float(13.5);
		$float2 = new Float(13.4);

		$this->assertEquals(14, $float1->ceil());
		$this->assertEquals(14, $float2->ceil());
	}

	public function testRound() {
		$float1 = new Float(13.5);
		$float2 = new Float(13.4);

		$this->assertEquals(14, $float1->round());
		$this->assertEquals(13, $float2->round());
	}

	public function testFloor() {
		$float1 = new Float(13.5);
		$float2 = new Float(13.4);

		$this->assertEquals(13, $float1->floor());
		$this->assertEquals(13, $float2->floor());
	}

}

<?php

use ClassTypes\Float;
use ClassTypes\Int;

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

		$this->assertEquals(14, $float1->ceil()->get());
		$this->assertEquals(14, $float2->ceil()->get());
	}

	public function testRound() {
		$float1 = new Float(13.5);
		$float2 = new Float(13.4);
		$float3 = new Float(13.445);
		$int = new Int(1);

		$this->assertEquals(14, $float1->round()->get());
		$this->assertEquals(13, $float2->round()->get());
		$this->assertEquals(13.45, $float3->round(2)->get());
		$this->assertEquals(13.4, $float3->round($int)->get());
	}

	public function testFloor() {
		$float1 = new Float(13.5);
		$float2 = new Float(13.4);

		$this->assertEquals(13, $float1->floor()->get());
		$this->assertEquals(13, $float2->floor()->get());
	}

}

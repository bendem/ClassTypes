<?php

use ClassTypes\Int;

class IntTest extends PHPUnit_Framework_TestCase {

	public function testIncrement() {
		$int = new Int(3);

		$result = $int->increment();

		$this->assertEquals(4, $result);
		$this->assertEquals(4, $int());
	}

	public function testDecrement() {
		$int = new Int(3);

		$result = $int->decrement();

		$this->assertEquals(2, $result);
		$this->assertEquals(2, $int());
	}

	public function testAdd() {
		$int = new Int(3);

		$result1 = $int->add(5);
		$result2 = $int->add($int);

		$this->assertEquals(8, $result1);
		$this->assertEquals(16, $result2);
	}

	public function testRemove() {
		$int = new Int(15);

		$result1 = $int->remove(5);
		$result2 = $int->remove($int);

		$this->assertEquals(10, $result1);
		$this->assertEquals(0, $result2);
	}

}

<?php

use ClassTypes\Int;

class IntTest extends PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$int1 = new Int(5.5);
		$int2 = new Int(5.5, Int::FLOOR);
		$int3 = new Int(5.5, Int::ROUND);
		$int4 = new Int(5.5, Int::CEIL);
		$int5 = new Int(5.4);
		$int6 = new Int(5.4, Int::FLOOR);
		$int7 = new Int(5.4, Int::ROUND);
		$int8 = new Int(5.4, Int::CEIL);

		$this->assertEquals(5, $int1());
		$this->assertEquals(5, $int2());
		$this->assertEquals(6, $int3());
		$this->assertEquals(6, $int4());
		$this->assertEquals(5, $int5());
		$this->assertEquals(5, $int6());
		$this->assertEquals(5, $int7());
		$this->assertEquals(6, $int8());
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testConstructException() {
		$int = new Int("test");
	}

	public function testIncrement() {
		$int = new Int(3);

		$result1 = $int->increment();
		$result2 = $int->increment();
		$result3 = $result1->increment();

		$this->assertEquals(3, $int());
		$this->assertEquals(4, $result1());
		$this->assertEquals(4, $result2());
		$this->assertEquals(5, $result3());
	}

	public function testDecrement() {
		$int = new Int(3);

		$result1 = $int->decrement();
		$result2 = $int->decrement();
		$result3 = $result1->decrement();

		$this->assertEquals(3, $int());
		$this->assertEquals(2, $result1());
		$this->assertEquals(2, $result2());
		$this->assertEquals(1, $result3());
	}

	public function testAdd() {
		$int = new Int(3);

		$result1 = $int->add(5);
		$result2 = $int->add($int);
		$result3 = $result1->add($int);

		$this->assertEquals(3, $int());
		$this->assertEquals(8, $result1());
		$this->assertEquals(6, $result2());
		$this->assertEquals(11, $result3());
	}

	public function testRemove() {
		$int = new Int(15);

		$result1 = $int->remove(5);
		$result2 = $int->remove($int);

		$this->assertEquals(15, $int());
		$this->assertEquals(10, $result1());
		$this->assertEquals(0, $result2());
	}

}

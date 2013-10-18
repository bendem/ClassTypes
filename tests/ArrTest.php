<?php

use ClassTypes\Arr;

class ArrTest extends PHPUnit_Framework_TestCase {

	public function testToString() {
		$arr = new Arr(["a", "b", "c"]);
		$this->assertEquals("abc", (string) $arr);
	}

}

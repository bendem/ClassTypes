<?php

use ClassTypes\String;

class StringTest extends PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$str1 = new String();
		$str2 = new String("Test");

		$this->assertEquals(false, $str1());
		$this->assertEquals("", (string) $str1());
	}

	public function testInvoke() {
		$str1 = new String();

		$this->assertEquals("Test", $str1("Test"));
		$this->assertEquals("Test", $str1());
	}

	public function testToString() {
		$str1 = new String();
		$str2 = new String("Test");

		$this->assertEquals("Test", $str2());
		$this->assertEquals("Test", (string) $str2());
	}

	public function testLength() {
		$str1 = new String();
		$str2 = new String("Test");

		$this->assertEquals(0, $str1->length());
		$this->assertEquals(4, $str2->length());
	}

	public function testReplace() {
		$str1 = new String("Hi, how are you today ?");
		$str2 = new String("Hi, how are You today ?");

		$this->assertEquals("Hi, how am I today ?", $str1->replace('are you', 'am I'));
		$this->assertEquals("Hi, how are You today ?", $str2->replace('are you', 'am I'));
	}

	public function testPad() {
		$str1 = new String("Test");
		$str2 = new String("Test");
		$str3 = new String("Test");

		$this->assertEquals("Test#", $str1->pad('5', '#'));
		$this->assertEquals("#Test", $str2->pad('5', '#', STR_PAD_LEFT));
		$this->assertEquals("#Test#", $str2->pad('6', '#', STR_PAD_BOTH));
	}

	public function testRepeat() {
		$str1 = new String("Test");

		$this->assertEquals("TestTest", $str1->repeat(2));
	}

	public function testRot() {
		$str1 = new String("a");
		$this->markTestIncomplete('Method rot not implemented yet');
	}

	public function testToArr() {
		$this->markTestIncomplete('Class Arr not implemented yet');
		$str1 = new String("Test");

		$arr = $str1->toArr();
		$this->assertTrue($arr instanceof Arr);
		$this->assertEquals(['T', 'e', 's', 't'], $arr());
	}

	public function testShuffle() {
		$str1 = new String("Test");
		$str2 = new String("Test");

		$this->assertRegExp("#^[Test]{4}$#", $str1->shuffle());
		// $this->assertNotEquals($str2(), $str1());
	}

	public function testCaseCompare() {
		$this->markTestIncomplete("Incorrect method case_compare");
		$str1 = new String("Test");
		$str2 = new String("test");
		$str3 = new String("Test");

		echo "\n";
		echo strcasecmp("Test", "t");
		echo $str1->case_compare($str2);
		echo $str1->case_compare($str3);
		echo "\n";

		$this->assertFalse($str1->caseCompare($str2));
		$this->assertTrue($str1->caseCompare($str3));
	}

	public function testLower() {
		$str1 = new String("Test From Shadows...");

		$this->assertEquals("test from shadows...", $str1->lower());
	}

	public function testUpper() {
		$str1 = new String("Test From Shadows...");

		$this->assertEquals("TEST FROM SHADOWS...", $str1->upper());
	}

	public function testChar() {
		$str1 = new String("Test");

		$this->assertEquals("est", $str1->char("e"));
	}

	public function testPosition() {
		$str1 = new String("Test");
		$str2 = new String("st");

		$this->assertEquals(2, $str1->position($str2));
		$this->assertEquals(2, $str1->position("st"));
	}

	public function testStripSlashes() {
		$str1 = new String("yolo\'swag");

		$this->assertEquals("yolo'swag", $str1->stripSlashes());
	}

	public function testAddSlashes() {
		$str1 = new String("yolo'swag");

		$this->assertEquals("yolo\'swag", $str1->addSlashes());
	}

	public function testStristr() {
		$str1 = new String("Test");
		$str2 = new String("s");

		$this->assertEquals("st", $str1->stristr($str2));
		$this->assertEquals("st", $str1->stristr("s"));
		$this->markTestIncomplete("Dunno what this method does...");
	}

}

<?php

use ClassTypes\String;

class StringTest extends PHPUnit_Framework_TestCase {

	public function testLength() {
		$str1 = new String();
		$str2 = new String("Test");

		$length1 = $str1->length();
		$length2 = $str2->length();

		$this->assertEquals(0, $length1());
		$this->assertEquals(4, $length2());
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
	}

	public function testLower() {
		$str1 = new String("Test From ShadOws...");

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

	public function testStrPos() {
		$str1 = new String("Test");
		$str2 = new String("s");

		$this->assertEquals("st", $str1->strPos($str2));
		$this->assertEquals("st", $str1->strPos("s"));
		$this->markTestIncomplete("Weird comportment right now...");
	}

	public function testUcFirst() {
		$str = new String("hey, what a nice place...");

		$this->assertEquals("Hey, what a nice place...", $str->ucFirst());
	}

	public function testUcWords() {
		$str = new String("hey, what a nice place...");

		$this->assertEquals("Hey, What A Nice Place...", $str->ucWords());
	}

	public function testTrim() {
		$str1 = new String(" Test 	\n");
		$str1b = new String($str1);
		$str2 = new String("/test/test/");

		$this->assertEquals("Test", $str1->trim());
		$this->assertEquals("test/test", $str2->trim('/'));
	}

}

<?php

use ClassTypes\Arr;
use ClassTypes\Int;
use ClassTypes\String;

class StringTest extends PHPUnit_Framework_TestCase {

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testConstructException() {
		$str = new String([]);
	}

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

		$result1 = $str1->replace('are you', 'am I');
		$result2 = $str2->replace('are you', 'am I');
		$result3 = $str2->replace(new String('are You'), new String('am I'));

		$this->assertEquals("Hi, how am I today ?", $result1());
		$this->assertEquals("Hi, how are You today ?", $result2());
		$this->assertEquals("Hi, how am I today ?", $result3());
	}

	public function testPad() {
		$str1 = new String("Test");
		$str2 = new String("Test");
		$str3 = new String("Test");
		$str4 = new String("Test");

		$this->assertEquals("Test#", $str1->pad(5, '#'));
		$this->assertEquals("#Test", $str2->pad(5, '#', STR_PAD_LEFT));
		$this->assertEquals("#Test#", $str3->pad(6, '#', STR_PAD_BOTH));
		$this->assertEquals("#Test#", $str4->pad(new Int(6), new String('#'), new Int(STR_PAD_BOTH)));
	}

	public function testRepeat() {
		$str1 = new String("Test");
		$str2 = new String("Test");

		$this->assertEquals("TestTest", $str1->repeat(2));
		$this->assertEquals("TestTest", $str2->repeat(new Int(2)));
	}

	public function testRot() {
		$str1 = new String("a");
		$str2 = new String("A");

		$this->assertEquals("n", $str1->rot());
		$this->assertEquals("o", $str1->rot(1));
		$this->assertEquals("g", $str1->rot(18));

		$this->assertEquals("N", $str2->rot());
		$this->assertEquals("O", $str2->rot(1));
		$this->assertEquals("G", $str2->rot(18));
		$this->assertEquals("H", $str2->rot(new Int(1)));
		$this->assertEquals("H", $str2->rot(0));
	}

	public function testToArr() {
		// $this->markTestIncomplete('Class Arr not implemented yet');
		$str = "Test";
		$str1 = new String($str);

		$arr = $str1->toArr();
		$this->assertTrue($arr instanceof ClassTypes\Arr);
		for ($i = 0; $i < $arr->count(); $i++) {
			$this->assertEquals($str[$i], $arr->offsetGet($i));
		}
	}

	public function testShuffle() {
		$str1 = new String("Test");
		$str2 = new String("Test");

		$this->assertRegExp("#^[Test]{4}$#", (string) $str1->shuffle());
	}

	public function testLower() {
		$str1 = new String("Test From ShadOws...");

		$this->assertEquals("test from shadows...", $str1->lower());
	}

	public function testUpper() {
		$str1 = new String("Test From Shadows...");

		$this->assertEquals("TEST FROM SHADOWS...", $str1->upper());
	}

	public function testPosition() {
		$str1 = new String("Test");
		$str2 = new String("st");

		$test1 = $str1->position($str2);
		$test2 = $str1->position("st");
		$test3 = $str1->position("sT", false);
		$test4 = $str1->position("a");

		$this->assertTrue($test1 instanceof Int);
		$this->assertTrue($test2 instanceof Int);
		$this->assertFalse($str1->position("ab"));
		$this->assertEquals(2, $test1());
		$this->assertEquals(2, $test2());
		$this->assertEquals(2, $test3());
		$this->assertFalse($test4);
	}

	public function testStripSlashes() {
		$str1 = new String("yolo\'swag");

		$this->assertEquals("yolo'swag", $str1->stripSlashes());
	}

	public function testAddSlashes() {
		$str1 = new String("yolo'swag");

		$this->assertEquals("yolo\'swag", $str1->addSlashes());
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
		$str1  = new String(" Test 	\n");
		$str1b = new String($str1);
		$str2  = new String("/test/test/");
		$str3  = new String("/test/test/");

		$this->assertEquals("Test", $str1->trim());
		$this->assertEquals("test/test", $str2->trim('/'));
		$this->assertEquals("test/test", $str3->trim(new String('/')));
	}

	public function testSlice() {
		$str1 = new String("Test");
		$str2 = new String("Test");

		$this->assertEquals("est", $str1->slice(1));
		$this->assertEquals("s", $str2->slice(2, -1));
	}

	public function testBefore() {
		$str1 = new String("Test");
		$str2 = new String("Test");
		$str3 = new String("Test");
		$str4 = new String("Test");
		$str5 = new String("e");

		$test1 = $str1->before("e");
		$test2 = $str2->before(1);
		$test3 = $str3->before("a");
		$test4 = $str4->before($str5);

		$this->assertEquals("T", $test1());
		$this->assertEquals("T", $test2());
		$this->assertEquals("", $test3());
		$this->assertEquals("T", $test4());
	}

	public function testAfter() {
		$str1 = new String("Test");
		$str2 = new String("Test");
		$str3 = new String("Test");
		$str4 = new String("Test");
		$str5 = new String("e");

		$test1 = $str1->after("e");
		$test2 = $str2->after(1);
		$test3 = $str3->after("a");
		$test4 = $str4->after($str5);

		$this->assertEquals("st", $test1());
		$this->assertEquals("st", $test2());
		$this->assertEquals("", $test3());
		$this->assertEquals("st", $test4());
	}

}

<?php

namespace ClassTypes;

/**
 * Class String
 *
 * @author bendem <online@bendem.be>
 */
class String extends Va implements \countable, \ArrayAccess, \Iterator {

	/**
	 * Current position in the object used to implement \Iterator
	 * @var integer
	 */
	protected $_current = 0;

	protected function _validate($var) {
		return !is_array($var) && !is_object($var) || $var instanceof String;
	}

	/**
	 * String constructor
	 *
	 * @param String $content The value to give to the String
	 */
	public function __construct($content = "") {
		if (!$this->_validate($content)) {
			throw new \InvalidArgumentException(get_called_class() . ' do not accept that type of argument');
			return;
		}
		parent::__construct((string) $content);
	}

	/**
	 * Quote String with slashes
	 *
	 * @return  String
	 *
	 * @see http://php.net/manual/en/function.addslashes.php
	 */
	public function addSlashes() {
		return $this->_new(addslashes($this()));
	}

	/**
	 * Return the part of the String after the $needle
	 *
	 * @param  String | Int $needle The String to take the part after or the position of it
	 * @return String
	 */
	public function after($needle) {
		if ($needle instanceof Int || $needle instanceof String) {
			$needle = $needle();
		}
		if (is_int($needle)) {
			return $this->_new($this->slice($needle + 1));
		}

		$pos = $this->position($needle);
		return $this->_new($pos === false ? '' : $this->slice($pos->add(1)));
	}

	/**
	 * Return the part of the String before the $needle
	 *
	 * @param  String | Int $needle The String to take the part after or the position of it
	 * @return String
	 */
	public function before($needle) {
		if ($needle instanceof Int || $needle instanceof String) {
			$needle = $needle();
		}
		if (is_int($needle)) {
			return $this->_new($this->slice(0, $needle));
		}

		return $this->_new($this->slice(0, $this->position($needle)));
	}

	/**
	 * Return the char at the offset of the String
	 *
	 * @param  Int $offset Offset of the String
	 * @return String
	 */
	public function char($offset) {
		if ($offset instanceof Int) {
			$offset = $offset();
		}

		return $this->_new($this->slice($offset, 1));
	}

	/**
	 * Return the length of the String
	 *
	 * @return Int
	 *
	 * @see http://php.net/manual/en/function.strlen.php
	 */
	public function length() {
		return new Int(strlen($this()));
	}

	/**
	 * Returns string with all alphabetic characters converted to lowercase.
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.strtolower.php
	 */
	public function lower() {
		return $this->_new(strtolower($this()));
	}

	/**
	 * This functions returns the input string padded on the left,
	 * the right, or both sides to the specified padding length.
	 *
	 * @param  int $pad_length If the value of pad_length is negative, less than, or equal to the length of the input string, no padding takes place.
	 * @param  string $pad_string The pad string
	 * @param  int $pad_type   Optional argument pad_type can be STR_PAD_RIGHT, STR_PAD_LEFT, or STR_PAD_BOTH. If pad_type is not specified it is assumed to be STR_PAD_RIGHT.
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.str-pad.php
	 */
	public function pad($pad_length, $pad_string = " ", $pad_type = STR_PAD_RIGHT) {
		if ($pad_length instanceof Int) {
			$pad_length = $pad_length();
		}
		if ($pad_string instanceof String) {
			$pad_string = $pad_string();
		}
		if ($pad_type instanceof Int) {
			$pad_type = $pad_type();
		}

		return $this->_new(str_pad($this(), $pad_length, $pad_string, $pad_type));
	}

	/**
	 * Repeat the String for an amount of times
	 *
	 * @param  int $multiplier Times the String needs to be repeated
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.str-repeat.php
	 */
	public function repeat($multiplier) {
		if ($multiplier instanceof Int) {
			$multiplier = $multiplier();
		}

		return $this->_new(str_repeat($this(), $multiplier));
	}

	/**
	 * This method replaces all occurrences of search in the String with the given replace value.
	 *
	 * @param  string $search  The value being searched for
	 * @param  string $replace The replacement value that replaces found search values
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.str-replace.php
	 */
	public function replace($search, $replace) {
		if ($search instanceof String) {
			$search = $search();
		}
		if ($replace instanceof String) {
			$replace = $replace();
		}

		return $this->_new(str_replace($search, $replace, $this->_content));
	}

	/**
	 * Rotate string chars
	 *
	 * @param  int $n Times the string is rotated
	 * @return String
	 */
	public function rot($n = 13) {
		$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		if ($n instanceof Int) {
			$n = $n();
		}
		$n = (int) $n % 26;
		if (!$n) {
			return $this->_new($this);
		}

		$str = $this();

		for ($i = 0, $l = strlen($this()); $i < $l; $i++) {
			$c = $str[$i];
			if ($c >= 'a' && $c <= 'z') {
				$str[$i] = $letters[(ord($c) - 71 + $n) % 26];
			} elseif ($c >= 'A' && $c <= 'Z') {
				$str[$i] = $letters[(ord($c) - 39 + $n) % 26 + 26];
			}
		}

		return $this->_new($str);
	}

	/**
	 * Return the position of the $str given
	 *
	 * @param  String  $str The String to look for
	 * @param  bool $case_sensitive Is the search case sensitive ?
	 * @return Int | bool
	 *
	 * @see http://php.net/manual/en/function.strpos.php
	 * @see http://php.net/manual/en/function.stripos.php
	 */
	public function position($str, $case_sensitive = true) {
		if ($str instanceof String) {
			$str = $str();
		}

		if ($case_sensitive) {
			$r = strpos($this(), $str);
			return $r === false ? false : new Int(strpos($this(), $str));
		}

		$r = stripos($this(), $str);
		return $r === false ? false : new Int(stripos($this(), $str));
	}

	/**
	 * Shuffles the String. One permutation of all possible is created.
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.str-shuffle.php
	 */
	public function shuffle() {
		return $this->_new(str_shuffle($this()));
	}

	/**
	 * Return a slice of the String
	 *
	 * @param  Int $start  The offset of the beginning of the slice
	 * @param  Int $length The length of the slice
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.substr.php
	 */
	public function slice($start, $length = null) {
		if ($start instanceof Int) {
			$start = $start();
		}
		if ($length instanceof Int) {
			$length = $length();
		}

		if ($length === null) {
			return $this->_new(substr($this(), $start));
		}

		return $this->_new(substr($this(), $start, $length));
	}

	/**
	 * Un-quotes the String
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.stripslashes.php
	 */
	public function stripSlashes() {
		return $this->_new(stripslashes($this()));
	}

	/**
	 * Decompose the String in Array
	 *
	 * @return Arr
	 */
	public function toArr() {
		$tab    = [];
		$strlen = $this->length();
		for ($i = 0; $i < $strlen(); $i++) {
			$tab[] = $this()[$i];
		}

		return new Arr($tab);
	}

	/**
	 * This function strip the argument(s) from the beginning and end of the String.
	 *
	 * @param  string $str Simply list all characters that you want to be stripped.
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.trim.php
	 */
	public function trim($str = " \t\n\r\0\x0B") {
		if ($str instanceof String) {
			$str = $str();
		}

		return $this->_new(trim($this(), $str));
	}

	/**
	 * Transform the String with the first character capitalized, if that character is alphabetic.
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.ucfirst.php
	 */
	public function ucFirst() {
		return $this->_new(ucfirst($this()));
	}

	/**
	 * Transform the String with the first character of each word capitalized, if that character is alphabetic.
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.ucwords.php
	 */
	public function ucWords() {
		return $this->_new(ucwords($this()));
	}

	/**
	 * Transorm the String with all alphabetic characters converted to uppercase.
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.strtoupper.php
	 */
	public function upper() {
		return $this->_new(strtoupper($this()));
	}

	/**
	 * Countable interface implementation
	 *
	 * @see http://php.net/manual/en/class.countable.php
	 */
	public function count() {
		return $this->length()->get();
	}

	/**
	 * ArrayAccess interface implementation
	 *
	 * @see http://php.net/manual/en/class.arrayaccess.php
	 */
	public function offsetExists($offset) {
		return $offset >= 0 && $offset < count($this);
	}
	public function offsetGet($offset) {
		return $this->slice($offset, 1);
	}
	public function offsetSet($offset, $value) {
		$str = $this();
		$str[$offset] = $value;
		$this($str);
	}
	public function offsetUnset($offset) {
		$this($this->slice(0, $offset) . $this->slice($offset + 1, $this->length()->get() - $offset - 1));
	}

	/**
	 * Iterator interface implementation
	 *
	 * @see http://php.net/manual/en/class.iterator.php
	 */
	public function current() {
		return $this->offsetGet($this->_current);
	}
	public function rewind() {
		$this->_current = 0;
	}
	public function key() {
		return $this->_current;
	}
	public function next() {
		$this->_current++;
	}
	public function valid() {
		return $this->offsetExists($this->_current);
	}

}

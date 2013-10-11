<?php

namespace ClassTypes;

/**
 * Class String
 * @author bendem <online@bendem.be>
 */
class String extends Va {

	/**
	 * String constructor
	 * @param string $content The value to give to the String
	 */
	public function __construct($content = "") {
		parent::__construct((string) $content);
	}

	/**
	 * Quote String with slashes
	 * @see http://php.net/manual/en/function.addslashes.php
	 * @return  String
	 */
	public function addSlashes() {
		return $this(addslashes($this()));
	}


	/**
	 * @todo  See what's going on with ``char``, ``charPos``, ``strPos``, ``position``
	 */
	public function char($str) {
		return strchr($this(), $str);
	}

	/**
	 * @todo  See what's going on with ``char``, ``charPos``, ``strPos``, ``position``
	 */
	public function charPos($char) {
		return strchr($this(), $char);
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
		return $this(strtolower($this()));
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
		if($pad_length instanceof Int) {
			$pad_length = $pad_length();
		}
		if($pad_string instanceof String) {
			$pad_string = $pad_string();
		}
		if($pad_type instanceof Int) {
			$pad_type = $pad_type();
		}

		return $this(str_pad($this(), $pad_length, $pad_string, $pad_type));
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
		if($multiplier instanceof Int) {
			$multiplier = $multiplier();
		}

		return $this(str_repeat($this(), $multiplier));
	}

	/**
	 * This function replaces all occurrences of search in the String with the given replace value.
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

		return $this(str_replace($search, $replace, $this->_content));
	}

	/**
	 * Rotate string chars
	 *
	 * @param  int $n Times the string is rotated
	 * @return String
	 *
	 * @todo   The code is a copy/paste from internet, need to go further
	 */
	public function rot($n = 13) {
		$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		if($n instanceof Int) {
			$n = $n();
		}
		$n = (int) $n % 26;
		if (!$n) {
			return $this();
		}

		for ($i = 0, $l = strlen($this()); $i < $l; $i++) {
			$c = $this()[$i];
			if ($c >= 'a' && $c <= 'z') {
				$this()[$i] = $letters[(ord($c) - 71 + $n) % 26];
			} elseif ($c >= 'A' && $c <= 'Z') {
				$this()[$i] = $letters[(ord($c) - 39 + $n) % 26 + 26];
			}
		}

		return $this();
	}

	/**
	 * @todo  See what's going on with ``char``, ``charPos``, ``strPos``, ``position``
	 */
	public function position($str) {
		if ($str instanceof String) {
			return stripos($this(), $str());
		}

		return stripos($this(), $str);
	}

	/**
	 * Shuffles the String. One permutation of all possible is created.
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.str-shuffle.php
	 */
	public function shuffle() {
		return $this(str_shuffle($this()));
	}

	/**
	 * Un-quotes the String
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.stripslashes.php
	 */
	public function stripSlashes() {
		return $this(stripslashes($this()));
	}

	/**
	 * @todo  See what's going on with ``char``, ``charPos``, ``strPos``, ``position``
	 */
	public function strPos($str, $case_sensitive = false) {
		if ($str instanceof String) {
			$str = $str();
		}

		return $case_sensitive ? strstr($this(), $str) : stristr($this(), $str);
	}

	/**
	 * Decompose the String in an Array
	 *
	 * @return Arr
	 */
	public function toArr() {
		return new Arr(explode('', $this()));
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

		return $this(trim($this(), $str));
	}

	/**
	 * Transform the String with the first character capitalized, if that character is alphabetic.
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.ucfirst.php
	 */
	public function ucFirst() {
		return $this(ucfirst($this()));
	}

	/**
	 * Transform the String with the first character of each word capitalized, if that character is alphabetic.
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.ucwords.php
	 */
	public function ucWords() {
		return $this(ucwords($this()));
	}

	/**
	 * Transorm the String with all alphabetic characters converted to uppercase.
	 *
	 * @return String
	 *
	 * @see http://php.net/manual/en/function.strtoupper.php
	 */
	public function upper() {
		return $this(strtoupper($this()));
	}

}

<?php

namespace ClassTypes;

/**
 * Class String
 * @author bendem <online@bendem.be>
 */
class String extends Va {

	public function __construct($content = "") {
		parent::__construct((string) $content);
	}

	public function addSlashes() {
		return $this(addslashes($this()));
	}

	public function char($str) {
		return strchr($this(), $str);
	}

	public function charPos($char) {
		return strchr($this(), $char);
	}

	public function length() {
		return strlen($this());
	}

	public function lower() {
		return $this(strtolower($this()));
	}

	public function pad($pad_length, $pad_string = " ", $pad_type = STR_PAD_RIGHT) {
		return $this(str_pad($this(), $pad_length, $pad_string, $pad_type));
	}

	public function repeat($multiplier) {
		return $this(str_repeat($this(), $multiplier));
	}

	public function replace($search, $replace) {
		return $this(str_replace($search, $replace, $this->_content));
	}

	/**
	 * Rotate string chars
	 * @param  integer $n Times the string is rotated
	 * @return String
	 * @todo   Rewrite code to match with rot13
	 */
	public function rot($n = 13) {
		$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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

	public function position($str) {
		if ($str instanceof String) {
			return stripos($this(), $str());
		}

		return stripos($this(), $str);
	}

	public function shuffle() {
		return $this(str_shuffle($this()));
	}

	public function stripSlashes() {
		return $this(stripslashes($this()));
	}

	public function strPos($str, $case_sensitive = false) {
		if ($str instanceof String) {
			$str = $str();
		}

		return $case_sensitive ? strstr($this(), $str) : stristr($this(), $str);
	}

	public function toArr() {
		return new Arr(explode('', $this()));
	}

	public function trim($str = " \t\n\r\0\x0B") {
		if ($str instanceof String) {
			$str = $str();
		}

		return $this(trim($this(), $str));
	}

	public function ucFirst() {
		return $this(ucfirst($this()));
	}

	public function ucWords() {
		return $this(ucwords($this()));
	}

	public function upper() {
		return $this(strtoupper($this()));
	}

}

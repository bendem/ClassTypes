<?php

namespace ClassTypes;

/**
 * Class String
 * @author bendem <online@bendem.be>
 */
class String extends Va {

	public function __construct($content = "") {
		parent::__construct($content);
	}

	public function length() {
		return strlen($this());
	}

	public function replace($search, $replace) {
		return $this(str_replace($search, $replace, $this->_content));
	}

	public function pad($pad_length, $pad_string = " ", $pad_type = STR_PAD_RIGHT) {
		return $this(str_pad($this(), $pad_length, $pad_string, $pad_type));
	}

	public function repeat($multiplier) {
		return $this(str_repeat($this(), $multiplier));
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

	public function toArr() {
		return new Arr(explode('', $this()));
	}

	public function to_arr() {
		return $this->toArr();
	}

	public function shuffle() {
		return $this(str_shuffle($this()));
	}

	/**
	 * @todo   strcasecmp ne renvoie pas un changement de casse...
	 */
	public function caseCompare(String $str) {
		return strcasecmp($this(), $str());
	}

	public function case_compare(String $str) {
		return $this->caseCompare($str);
	}

	public function lower() {
		return $this(strtolower($this()));
	}

	public function upper() {
		return $this(strtoupper($this()));
	}

	public function char($str) {
		return strchr($this(), $str);
	}

	public function position($str) {
		if ($str instanceof String) {
			return stripos($this(), $str());
		}
		return stripos($this(), $str);
	}

	public function strip_slashes() {
		return $this->stripSlashes();
	}
	public function stripSlashes() {
		return $this(stripslashes($this()));
	}

	public function add_slashes() {
		return $this->addSlashes();
	}
	public function addSlashes() {
		return $this(addslashes($this()));
	}

	/**
	 * @todo What is ``stristr`` used for ?
	 */
	public function stristr($str) {
		if ($str instanceof String) {
			return stristr($this(), $str());
		}
		return stristr($this(), $str);
	}

}

<?php

namespace ClassTypes;

class Char extends Va {

	public function __construct($content = "") {
		parent::__construct((string) $content);
	}

	protected function _validate($var) {
		return !is_array($var) && !is_object($var) || $var instanceof Char;
	}

}

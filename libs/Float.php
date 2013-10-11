<?php

namespace ClassTypes;

class Float extends Number {

	public function __construct($content = 0.0) {
		parent::__construct((float) $content);
	}

	public function ceil() {
		return $this(ceil($this()));
	}

	public function round() {
		return $this(round($this()));
	}

	public function floor() {
		return $this(floor($this()));
	}

}

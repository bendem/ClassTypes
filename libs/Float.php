<?php

namespace ClassTypes;

class Float extends Number {

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

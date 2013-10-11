<?php

namespace ClassTypes;

class Float {

	public function __construct($content = false) {
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

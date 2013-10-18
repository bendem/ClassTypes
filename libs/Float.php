<?php

namespace ClassTypes;

class Float extends Number {

	public function __construct($content = 0.0) {
		if (!$this->_validate($content)) {
			throw new \InvalidArgumentException(get_called_class() . ' do not accept that type of argument');
			return;
		}
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

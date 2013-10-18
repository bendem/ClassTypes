<?php

namespace ClassTypes;

class Number extends Va {

	protected function _validate($var) {
		return is_numeric($var);
	}

	public function absolute() {
		$res = $this();
		if ($res < 0) {
			$res = -$res;
		}

		return $this->_new($res);
	}

	public function sqrt() {
		if ($this instanceof Int) {
			return new Int(sqrt($this()));
		}

		return $this->_new(sqrt($this()));
	}

}

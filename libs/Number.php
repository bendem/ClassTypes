<?php

namespace ClassTypes;

class Number extends Va {

	protected function _validate($var) {
		return is_numeric($var);
	}

	/**
	 * Return the absolute value
	 *
	 * @return Int | Float
	 */
	public function absolute() {
		$res = $this();
		if ($res < 0) {
			$res = -$res;
		}

		return $this->_new($res);
	}

	/**
	 * Returns the square root value
	 *
	 * @return Int | Float
	 *
	 * @see http://php.net/manual/en/function.sqrt.php
	 */
	public function sqrt() {
		return $this->_new(sqrt($this()));
	}

}

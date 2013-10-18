<?php

namespace ClassTypes;

class Float extends Number {

	/**
	 * Constructor for Float
	 *
	 * @param Float $content Content used to initialize the object
	 */
	public function __construct($content = 0.0) {
		if (!$this->_validate($content)) {
			throw new \InvalidArgumentException(get_called_class() . ' do not accept that type of argument');
			return;
		}
		parent::__construct((float) $content);
	}

	/**
	 * Returns the next highest integer value by rounding up value if necessary
	 *
	 * @return Int
	 *
	 * @see http://php.net/manual/en/function.ceil.php
	 */
	public function ceil() {
		return new Int(ceil($this()));
	}

	/**
	 *
	 * Returns the rounded value to specified precision
	 *
	 * @param  Int $precision The optional number of decimal digits to round to.
	 * @return Float
	 *
	 * @see  http://php.net/manual/en/function.round.php
	 */
	public function round($precision = 0) {
		if($precision instanceof Int) {
			$precision = $precision();
		}

		return $this->_new(round($this(), $precision));
	}

	/**
	 * Returns the next lowest integer value by rounding it down if necessary.
	 *
	 * @return Int
	 *
	 * @see http://php.net/manual/en/function.floor.php
	 */
	public function floor() {
		return new Int(floor($this()));
	}

}

<?php

namespace ClassTypes;

class Int extends Number {

	const FLOOR                  = 1;
	const ROUND                  = 2;
	const CEIL                   = 3;
	const DEFAULT_INITIALISATION = self::FLOOR;

	/**
	 * Constructor for Int
	 *
	 * @param Int $content Content used to initialize the object
	 * @param int $default_init Initialisation type (FLOOR | ROUND | CEIL)
	 */
	public function __construct($content = 0, $default_init = self::DEFAULT_INITIALISATION) {
		if (!$this->_validate($content)) {
			throw new \InvalidArgumentException(get_called_class() . ' do not accept that type of argument');
			return;
		}
		switch ($default_init) {
			case self::FLOOR:
				$content = floor($content);
				break;
			case self::ROUND:
				$content = round($content);
				break;
			case self::CEIL:
				$content = ceil($content);
				break;
		}
		parent::__construct((int) $content);
	}

	/**
	 * Return the current value incremented by one
	 *
	 * @return Int
	 */
	public function increment() {
		return $this->_new($this() + 1);
	}

	/**
	 * Return the current value decremented by one
	 *
	 * @return Int
	 */
	public function decrement() {
		return $this->_new($this() - 1);
	}

	/**
	 * Return the current value incremented by $nb
	 *
	 * @param  Int $nb The value to increment by
	 * @return Int
	 */
	public function add($nb) {
		if ($nb instanceof Int) {
			$nb = $nb();
		}

		return $this->_new($this() + $nb);
	}

	/**
	 * Return the current value decremented by $nb
	 *
	 * @param  Int $nb The value to decrement by
	 * @return Int
	 */
	public function remove($nb) {
		if ($nb instanceof Int) {
			$nb = $nb();
		}

		return $this->add(-$nb);
	}

}

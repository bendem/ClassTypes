<?php

namespace ClassTypes;

class Int extends Number {

	const FLOOR = 1;
	const ROUND = 2;
	const CEIL  = 3;
	const DEFAULT_INITIALISATION = self::CEIL;

	public function __construct($content = 0, $default_init = self::DEFAULT_INITIALISATION) {
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

	public function increment() {
		return $this($this() + 1);
	}

	public function decrement() {
		return $this($this() - 1);
	}

	public function add($nb) {
		if ($nb instanceof Int) {
			$nb = $nb();
		}

		return $this($this() + $nb);
	}

	public function remove($nb) {
		if ($nb instanceof Int) {
			$nb = $nb();
		}

		return $this->add(-$nb);
	}

}

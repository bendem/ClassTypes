<?php

namespace ClassTypes;

class Va {

	protected $_content = false;

	public function __construct($content = false) {
		$this->_content = $content;
	}

	public function __invoke($content = false) {
		if($content) {
			$this->_content = $content;
		}
		return $this->_content;

	}

	public function __toString() {
		return (string) $this->_content;
	}

}

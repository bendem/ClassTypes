<?php

namespace ClassTypes;

class Arr extends \ArrayObject {

    /**
     * Constructor function for string object
     * @param string $content
     */
    public function __construct($content = false) {
        parent::__construct(array('content' => $content));
    }

	protected function _validate($var) {
		return !is_array($var) && !is_object($var) || $var instanceof String;
	}

    /**
     * Overrides __toString()
     * @return string - String representation of data
     */
    public function __toString() {
        return $this->getContent();
    }

}

<?php

namespace ClassTypes;

/**
 * @todo  Use own version of Arr based on Va
 */
class Arr extends \ArrayObject {

    /**
     * Constructor function for string object
     * @param string $content
     */
    public function __construct($content = false) {
        parent::__construct($content);
    }

    /**
     * Overrides __toString()
     * @return string - String representation of data
     */
    public function __toString() {
    	$str = "";
    	for ($i = 0; $i < $this->count(); $i++) {
    		$str .= $this->offsetGet($i);
    	}

    	return $str;
    }

}

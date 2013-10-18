<?php

namespace ClassTypes;

/**
 * @todo  Use own version of Arr based on Va
 */
class Arr extends \ArrayObject {

    /**
     * Constructor for Arr
     *
     * @param array $content Content used to initialize the object
     */
    public function __construct(array $content = array()) {
        parent::__construct($content);
    }

    /**
     * Overrides __toString()
     *
     * @return string String representation of the object
     */
    public function __toString() {
    	$str = "";
    	for ($i = 0; $i < $this->count(); $i++) {
    		$str .= $this->offsetGet($i);
    	}

    	return $str;
    }

}

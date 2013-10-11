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

    /**
     * Overrides __toString()
     * @return string - String representation of data
     */
    public function __toString() {
        return $this->getContent();
    }

}

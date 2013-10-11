<?php

namespace ClassTypes;

abstract class Va {

	protected $_content = false;

	public function __construct($content = false) {
		$this->_content = $content;
	}

	public function __invoke($content = false) {
		if($content instanceof Va) {
			$content = $content();
		}
		if ($content !== false) {
			if (!$this->_validate($content)) {
				throw new BadMethodCallException(__CLASS__ . ' do not accept that type of argument');
				return;
			}
			$this->_content = $content;
		}

		return $this->_content;
	}

	public function __toString() {
		return (string) $this->_content;
	}

	public function __call($method, $args) {
		//construct camelcased named method from underscored named method
		$new_method = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $method))));

		if(!in_array($new_method, get_class_methods(__CLASS__))) {
			throw new BadMethodCallException('Method not found');
			return;
		}

		return call_user_func_array([$this, $new_method], $args);
	}

	abstract protected function _validate($var);

}

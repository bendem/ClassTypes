<?php

namespace ClassTypes;

/**
 * @todo  Each method should return a new object without modifying the current one
 */
abstract class Va {

	/**
	 * Value stored in the object
	 * @var mixed
	 */
	protected $_content = false;

	/**
	 * Allow user to set a value while declaring the object
	 * @param mixed $content Value to store
	 */
	public function __construct($content = false) {
		$this($content);
	}

	/**
	 * This is the way to get and the set the value stored in the object
	 * Every method and function should use it (or get() while chain calling)
	 * To use it, just use the object as a function :
	 *
	 * Note that every value will be validated using the _validate method
	 *
	 * ```php
	 * $str = new String(); // Define a new String
	 * $str("Test");        // Set its value
	 * echo $str();         // get its value
	 *                      //(not usefull in this case, the toString method would be better, but it's an exemple)
	 * ```
	 *
	 * @param  mixed $content Value to store in the object (if ommited, internal value won't change)
	 * @return mixed The value passed as parameter
	 */
	public function __invoke($content = false) {
		if ($content instanceof Va) {
			$content = $content();
		}
		if ($content !== false) {
			if (!$this->_validate($content)) {
				throw new \InvalidArgumentException(get_called_class() . ' do not accept that type of argument');
				return;
			}
			$this->_content = $content;
		}

		return $this->_content;
	}

	/**
	 * This method makes possible for each object to be displayed or casted to string
	 *
	 * @return string String casted value of the object
	 */
	public function __toString() {
		return (string) $this->_content;
	}

	/**
	 * This method is usefull to make aliases for method.
	 * At the moment, it makes it possible to use both camelcased methods and underscored methods
	 *
	 * @param  string $method Method called by the user
	 * @param  array  $args   Arguments passed to the function
	 *
	 * @return mixed
	 */
	public function __call($method, $args) {
		//construct camelcased named method from underscored named method
		$new_method = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $method))));

		if (!in_array($new_method, get_class_methods(get_called_class()))) {
			throw new \BadMethodCallException('Method not found');
			return;
		}

		return call_user_func_array([$this, $new_method], $args);
	}

	/**
	 * Return the value of the object
	 * This has been implemented to make easier access to content
	 * while using chained call like ```$str->length()->get();```
	 *
	 * @return Va(child)
	 */
	public function get() {
		return $this();
	}

	/**
	 * Method used to know if a value can be cast into class
	 * (i.e. String([]) is not possible)
	 *
	 * @param  mixes $var Variable to validate
	 *
	 * @return bool Validity of the variable
	 */
	abstract protected function _validate($var);

}

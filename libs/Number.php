<?php

namespace ClassTypes;

class Number extends Va {

	protected function _validate($var) {
		return is_numeric($var);
	}

	public function absolute() {
		if ($this() < 0) {
			$this(-$this());
		}

		return $this();
	}

	public function sqrt() {
		if($this instanceof Int) {
			return $this(new Int(sqrt($this())));
		}

    	return $this(sqrt($this()));
    }

}

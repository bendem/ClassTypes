<?php

namespace ClassTypes;

class Number extends Va {

	public function absolute() {
		if ($this() < 0) {
			$this(-$this());
		}

		return $this();
	}

	public function sqrt() {
		if($this instanceof Float) {
        	return $this(sqrt($this()));
		}

		return $this(new Int(sqrt($this())));
    }

}

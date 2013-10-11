<?php

namespace ClassTypes;

class Number extends Va {

	public function absolute() {
		if ($this() < 0) {
			$this(-$this());
		}

		return $this();
	}

}

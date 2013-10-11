<?php

define('DS', DIRECTORY_SEPARATOR);
define('LIBS_DIR', dirname(dirname(__FILE__)) . DS . 'libs');

$files = array_diff(scandir(LIBS_DIR), ['.', '..']);

require_once LIBS_DIR . DS . 'Va.php';

foreach($files as $file) {
	require_once LIBS_DIR . DS . $file;
}


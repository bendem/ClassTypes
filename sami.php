<?php

use Sami\Sami;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__ . '/libs')
;

return new Sami($iterator, array(
    'theme'                => 'enhanced',
    'title'                => 'ClassTypes API',
    'build_dir'            => __DIR__ . '/build/',
    'cache_dir'            => __DIR__ . '/cache/',
    'simulate_namespaces'  => false,
    'default_opened_level' => 1,
));

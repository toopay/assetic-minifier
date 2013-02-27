<?php

defined('TEST_PATH') or define('TEST_PATH', __DIR__.DIRECTORY_SEPARATOR);

// Locate the vendor
if (is_dir(realpath(__DIR__.'/../vendor'))) {
	require realpath(__DIR__.'/../vendor/autoload.php');
} else {
	require realpath(__DIR__.'/../../../../vendor/autoload.php');
}

require realpath(__DIR__.'/../src/Minifier/Cssmin.php');
require realpath(__DIR__.'/../src/Minifier/Jsmin.php');
require realpath(__DIR__.'/../src/Minifier/MinFilter.php');
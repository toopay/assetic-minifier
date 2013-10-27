<?php

use Minifier\CSSMin;

class CSSMinTest extends PHPUnit_Framework_TestCase {

	public function testMinify() {
		$cssMin = new CSSMin();
		$cssText = '/* Some comment that should be deleted */
		.foo {
		 	display:block; 
		 }';

		$this->assertEquals('.foo{display:block}',$cssMin->run($cssText));
	}

}
<?php

use Minifier\JSMin;

class JSMinTest extends PHPUnit_Framework_TestCase {

	public function testMinify() {
		$jsText = '/* Some comment that should be deleted */
		function foo() {
			return "bar";
		 }';

		$this->assertEquals('function foo(){return"bar";}',JSMin::minify($jsText));
	}

}
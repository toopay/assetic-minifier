<?php

use Minifier\Cssmin;

class CssminTest extends PHPUnit_Framework_TestCase
{
    public function testMinify()
    {
        $cssMin = new Cssmin();
        $cssText = '/* Some comment that should be deleted */
        .foo {
             display:block;
         }';

        $this->assertEquals('.foo{display:block}',$cssMin->run($cssText));
    }

}

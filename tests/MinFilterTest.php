<?php

use Minifier\MinFilter;
use Assetic\Asset\FileAsset;
use Assetic\Asset\AssetCollection;

class MinFilterTest extends PHPUnit_Framework_TestCase
{
    public function testInvalidType()
    {
        $this->setExpectedException('InvalidArgumentException', 'Invalid asset type');

        $filter = new MinFilter('lol');
    }

    public function testMinifyJs()
    {
        $assets = array(new FileAsset(TEST_PATH.'dummy.js'));
        $filters = array(new MinFilter('js'));
        $collection = new AssetCollection($assets, $filters);

        $this->assertEquals('function foo(){return"bar";}',$collection->dump());
    }

    public function testMinifyCss()
    {
        $assets = array(new FileAsset(TEST_PATH.'dummy.css'));
        $filters = array(new MinFilter('css'));
        $collection = new AssetCollection($assets, $filters);

        $this->assertEquals('.foo{display:block}',$collection->dump());
    }

}

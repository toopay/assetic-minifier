<?php namespace Minifier;

use Assetic\Asset\AssetInterface;
use Assetic\Filter\FilterInterface;

/**
 * Assetic filter to minify assets through JsMin or CssMin.
 *
 * All credit for the filter itself is mentioned in the file itself.
 *
 * @link https://raw.github.com/mrclay/minify/master/min/lib/JSMin.php
 * @link http://code.google.com/p/cssmin
 * @author Taufan Aditya <taufan.aditya@yahoo.com>
 */
class MinFilter implements FilterInterface
{
    private $availableType = array('css','js');
    private $type;

    /**
     * Constructor
     * @param string [css|js]
     */
    public function __construct($type = '') {
    	if (empty($type) || !in_array($type, $this->availableType)) {
    		throw new \InvalidArgumentException('Invalid asset type');
    	}

    	$this->type = $type;
    }

    public function filterLoad(AssetInterface $asset) {}

    public function filterDump(AssetInterface $asset)
    {
    	switch ($this->type) {
    		case 'css':
    			$cssMin = new Cssmin();
    			$content = $cssMin->run($asset->getContent());
    			break;
    		
    		case 'js':
    			$content = JsMin::minify($asset->getContent());
    			break;
    	}

        $asset->setContent($content);
    }
}
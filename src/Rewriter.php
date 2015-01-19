<?php namespace KevBaldwyn\CssPathRewrite;

use Assetic\Util\CssUtils;

class Rewriter {

    protected $originalContent;
    protected $target;

    public function __construct($originalContent, $target)
    {
        $this->originalContent = $originalContent;
        $this->target          = $target;
    }

    public function rewrite()
    {
        $target = $this->target;
        return CssUtils::filterUrls($this->originalContent, function($matches) use ($target) {

            // root relative
            if (isset($matches['url'][0]) && '/' == $matches['url'][0]) {
                // ensure target is properly formatted
                $target = rtrim($target, '/');
                // return the corrected content
                return str_replace($matches['url'], $target.$matches['url'], $matches[0]);
            }

            return $matches[0];

        });
    }

} 
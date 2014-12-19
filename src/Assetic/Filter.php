<?php namespace KevBaldwyn\CssPathRewrite\Assetic;

use Assetic\Filter\BaseCssFilter;
use Assetic\Asset\AssetInterface;
use KevBaldwyn\CssPathRewrite\Rewriter;

class Filter extends BaseCssFilter {

    protected $target;

    public function __construct($target)
    {
        $this->target = $target;
    }

    public function filterLoad(AssetInterface $asset) {}

    public function filterDump(AssetInterface $asset)
    {
        $writer = new Rewriter($asset->getContent(), $this->target);
        $content = $writer->rewrite();
        $asset->setContent($content);
    }

} 
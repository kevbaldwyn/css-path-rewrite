<?php  namespace KevBaldwyn\Tests\CssPathRewrite;

use \PHPUnit_Framework_TestCase;
use \Mockery as m;
use KevBaldwyn\CssPathRewrite\Rewriter;

class RewriterTest extends PHPUnit_Framework_TestCase {

    private $target = 'http://wwww.example.com/';

    public function testRewriteUrlWithoutQuotes()
    {
        $input = 'background-image: url(/path/to/image.jpg);';
        $expected = 'background-image: url(' . $this->target . 'path/to/image.jpg);';

        $writer = new Rewriter($input, $this->target);
        $output = $writer->rewrite();

        $this->assertSame($expected, $output);
    }

    public function testRewriteUrlWithQuotes()
    {
        $input = 'background-image: url("/path/to/image.jpg");';
        $expected = 'background-image: url("' . $this->target . 'path/to/image.jpg");';

        $writer = new Rewriter($input, $this->target);
        $output = $writer->rewrite();

        $this->assertSame($expected, $output);
    }

}
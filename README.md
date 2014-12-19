css-path-rewrite
================

Rewrite paths in css files to things like images from local to remote (or anything else). Currently only handles "root relative" url paths, ie urls that start with `/`. 

##Installation
With Composer

    "require": {
        ...
        "kevbaldwyn/css-path-rewrite":"0.*"
        ...
    }

Composer Update:

    $ composer update kevbaldwyn/newrelic-fuel

##Usage
To simply rewrite urls in a css file:

    $cssFileContent = file_get_contents('/path/to/my/file.css');
    $writer = new KevBaldwyn\CssPathRewrite\Rewriter($cssFileContent, 'http://www.example.com');
    $output = $writer->rewrite();
    file_put_contents('/path/to/my/file.css', $output);

Or if using assetic simply include in your filters array:

    $css = new AssetCollection(array(
        new FileAsset('/path/to/src/styles.less', array(new LessFilter())),
        new GlobAsset('/path/to/css/*'),
    ), array(
        new KevBaldwyn\CssPathRewrite\Assetic\Filter('http://www.example.com'),
    ));
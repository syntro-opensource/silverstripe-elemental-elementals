<?php

use SilverStripe\Forms\HTMLEditor\HtmlEditorConfig;
use Syntro\SilverstripeElementalElementals\BootstrapConfig;

$style_formats = [
    [
        'title' => _t(BootstrapConfig::class . '.COLOR', 'Color'),
        'items' => BootstrapConfig::getEditorColorFormats()
    ], [
        'title' => _t(BootstrapConfig::class . '.LINKCOLOR', 'Link Color'),
        'items' => BootstrapConfig::getEditorLinkColorFormats()
    ], [
        'title' => _t(BootstrapConfig::class . '.FONTSTYLE', 'Font Style'),
        'items' => BootstrapConfig::getEditorFontFormats()
    ]
];

$formats = HtmlEditorConfig::get('cms')->getOption('formats');
$formats['alignleft'] = [
    [ 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,li', 'classes' =>'text-start' ],
    [ 'selector' => 'div,ul,ol,table,img,figure', 'classes' =>'text-start']
];
$formats['alignright'] = [
    [ 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,li', 'classes' =>'text-end' ],
    [ 'selector' => 'div,ul,ol,table,img,figure', 'classes' =>'text-end' ]
];
HtmlEditorConfig::get('cms')->setOption('formats', $formats);

HtmlEditorConfig::get('cms')->insertButtonsAfter('formatselect', 'styleselect');
HtmlEditorConfig::get('cms')
    ->setOption('importcss_append', true)
    ->setOption('style_formats_autohide', true)
    ->setOption('importcss_file_filter', 'dom.css')
    ->setOption('style_formats', $style_formats);

HtmlEditorConfig::get('cms')->enablePlugins('hr');
HtmlEditorConfig::get('cms')->insertButtonsAfter('sslink', 'hr');

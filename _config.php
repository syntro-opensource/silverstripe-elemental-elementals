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
    ], [
        'title' => _t(BootstrapConfig::class . '.TABLESTYLE', 'Table Styles'),
        'items' => BootstrapConfig::getTableStyleFormats()
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

HtmlEditorConfig::get('cms')->insertButtonsAfter('formatselect', 'styleselect');
HtmlEditorConfig::get('cms')->enablePlugins('hr');
HtmlEditorConfig::get('cms')->insertButtonsAfter('sslink', 'hr');
HtmlEditorConfig::get('cms')
    // add the new formats
    ->setOption('formats', $formats)
    // configure htmleditor to correctly display style options
    ->setOption('importcss_append', true)
    ->setOption('style_formats_autohide', true)
    ->setOption('importcss_file_filter', 'dom.css')
    ->setOption('style_formats', $style_formats)
    // add the default .table class to tables
    ->setOption('table_default_attributes', [
        'class' => 'table'
    ]);

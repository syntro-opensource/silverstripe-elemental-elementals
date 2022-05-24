<?php

use SilverStripe\Forms\HTMLEditor\HtmlEditorConfig;
use Syntro\SilverstripeElementalElementals\BootstrapConfig;

$style_formats = [
    [
        'title' => 'Colors',
        'items' => BootstrapConfig::getEditorColorFormats()
    ], [
        'title' => 'Font',
        'items' => BootstrapConfig::getEditorFontFormats()
    ]
];

HtmlEditorConfig::get('cms')
    ->setOption('style_formats_autohide', true
    ->setOption('style_formats', $style_formats);
    
HtmlEditorConfig::get('cms')->enablePlugins('hr');
HtmlEditorConfig::get('cms')->insertButtonsAfter('sslink', 'hr');

<?php

namespace Syntro\SilverstripeElementalElementals;

use SilverStripe\Core\Config\Configurable;

/**
 * The bootstrap config allows the configuration of bootstrap specific
 * things like available utility classes, colors and more.
 *
 * @author Matthias Leutenegger <hello@syntro.ch>
 */
class BootstrapConfig
{
    use Configurable;

    /**
     * enable the 'small' format in the editor
     * @config
     * @var bool
     */
     private static $enable_small_format = true;

     /**
      * enable the 'lead' format in the editor
      * @config
      * @var bool
      */
     private static $enable_lead_format = true;

    /**
     * enable the heading format classes (.h1 - .h6) in the editor
     * @config
     * @var bool
     */
    private static $enable_headings_format = true;

    /**
     * defines the available display formats for the editor
     * @config
     * @var string[]
     */
    private static $display_classes = [
        'display-6' => 'Display 6',
        'display-5' => 'Display 5',
        'display-4' => 'Display 4',
        'display-3' => 'Display 3',
        'display-2' => 'Display 2',
        'display-1' => 'Display 1'
    ];

    /**
     * defines the available color formats for the editor
     * @config
     * @var string[]
     */
    private static $colors = [
        'primary'   => 'Primary',
        'secondary' => 'Secondary',
        'info'      => 'Info',
        'success'   => 'Success',
        'warning'   => 'Warning',
        'danger'    => 'Danger',
        'dark'      => 'Dark',
        'light'     => 'Light',
    ];

    /**
     * defines the available color utility formats for the editor
     * @config
     * @var string[]
     */
    private static $utility_colors = [
        'black'     => 'Black',
        'white'     => 'White',
    ];

    /**
     * getEditorFontFormats - returns the
     *
     * @return array
     */
    public static function getEditorFontFormats()
    {
        $formats = static::config()->get('display_classes');
        $editorFormats = [];
        $selectors = 'p,h1,h2,h3,h4,h5,h6,td,th,li,a';
        if (static::config()->get('enable_small_format')) {
            $editorFormats[] = ['title' => 'Small', 'selector' => $selectors, 'classes' => 'small'];
        }
        if (static::config()->get('enable_lead_format')) {
            $editorFormats[] = ['title' => 'Lead', 'selector' => $selectors, 'classes' => 'lead'];
        }
        if (static::config()->get('enable_headings_format')) {
            $editorFormats[] = ['title' => _t(__CLASS__ . '.NAME:H6', 'Heading 6'), 'selector' => $selectors, 'classes' => 'h6'];
            $editorFormats[] = ['title' => _t(__CLASS__ . '.NAME:H5', 'Heading 5'), 'selector' => $selectors, 'classes' => 'h5'];
            $editorFormats[] = ['title' => _t(__CLASS__ . '.NAME:H4', 'Heading 4'), 'selector' => $selectors, 'classes' => 'h4'];
            $editorFormats[] = ['title' => _t(__CLASS__ . '.NAME:H3', 'Heading 3'), 'selector' => $selectors, 'classes' => 'h3'];
            $editorFormats[] = ['title' => _t(__CLASS__ . '.NAME:H2', 'Heading 2'), 'selector' => $selectors, 'classes' => 'h2'];
            $editorFormats[] = ['title' => _t(__CLASS__ . '.NAME:H1', 'Heading 1'), 'selector' => $selectors, 'classes' => 'h1'];
        }
        foreach ($formats as $key => $value) {
            $editorFormats[] = ['title' => "$value", 'selector' => $selectors, 'classes' => "$key"];
        }
        // throw new \Exception(json_encode($editorFormats), 1);

        return $editorFormats;
    }

    /**
     * getEditorFontFormats - returns the
     *
     * @return array
     */
    public static function getEditorColorFormats()
    {
        $colors = static::config()->get('colors');
        $utilityColors = static::config()->get('utility_colors');
        $editorFormats = [];
        $selectors = 'p,h1,h2,h3,h4,h5,h6,td,th,li';
        $inline = 'span';
        foreach ($utilityColors as $key => $value) {
            $editorFormats[] = ['title' => "$value", 'inline' => "$inline", 'selector' => $selectors, 'classes' => "text-$key"];
        }
        foreach ($colors as $key => $value) {
            $editorFormats[] = ['title' => "$value", 'inline' => "$inline", 'selector' => $selectors, 'classes' => "text-$key"];
        }
        return $editorFormats;
    }

    /**
     * getEditorFontFormats - returns the
     *
     * @return array
     */
    public static function getEditorLinkColorFormats()
    {
        $colors = static::config()->get('colors');
        $utilityColors = static::config()->get('utility_colors');
        $editorFormats = [];
        $selectors = 'a';
        foreach ($colors as $key => $value) {
            $editorFormats[] = ['title' => "$value", 'selector' => $selectors, 'classes' => "link-$key"];
        }
        return $editorFormats;
    }
}

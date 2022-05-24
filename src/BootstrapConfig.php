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
     * defines the available display formats for the editor
     * @config
     * @var string[]
     */
    private static $display_classes = [
        'display-1' => 'Display 1',
        'display-2' => 'Display 2',
        'display-3' => 'Display 3',
        'display-4' => 'Display 4',
        'display-5' => 'Display 5',
        'display-6' => 'Display 6'
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
        $selectors = 'a,p,h1,h2,h3,h4,h5,h6,td,th,li';
        if (static::config()->get('enable_small_format')) {
            $editorFormats[] = ['title' => 'Small', 'selectors' => $selectors, 'classes' => 'small'];
        }
        if (static::config()->get('enable_lead_format')) {
            $editorFormats[] = ['title' => 'Lead', 'selectors' => $selectors, 'classes' => 'lead'];
        }
        foreach ($formats as $key => $value) {
            $editorFormats[] = ['title' => "$value", 'selectors' => $selectors, 'classes' => "$key"];
        }
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
            $editorFormats[] = ['title' => "$value", 'inline' => "$inline", 'selectors' => $selectors, 'classes' => "$key"];
        }
        foreach ($colors as $key => $value) {
            $editorFormats[] = ['title' => "$value", 'inline' => "$inline", 'selectors' => $selectors, 'classes' => "$key"];
        }
    }
}

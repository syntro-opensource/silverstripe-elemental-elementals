<?php

namespace Syntro\SilverstripeElementalElementals\Element;

use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\FieldList;
use DNADesign\Elemental\Models\BaseElement;
use Syntro\SilverstripeElementalElementals\Traits\TranslatableConfigArrays;

/**
 * A Spacer is a simple element allowing the injection of whitespace on a page
 *
 * @author Matthias LEutenegger <hello@syntro.ch>
 */
class Spacer extends BaseElement
{
    use TranslatableConfigArrays;

    /**
     * Defines the database table name
     *  @var string
     */
    private static $table_name = 'ElementSpacer';

    /**
     * @var string
     */
    private static $icon = 'font-icon-caret-up-down';

    /**
     * Singular name for CMS
     *  @var string
     */
    private static $singular_name = 'Spacer';

    /**
     * Plural name for CMS
     *  @var string
     */
    private static $plural_name = 'Spacer';

    /**
     * @var bool
     */
    private static $inline_editable = true;

    private static $allow_title_customization = false;

    /**
     * Display a show title button
     *
     * @config
     * @var boolean
     */
    private static $displays_title_in_template = false;

    /**
     * available spacing options
     *
     * @config
     * @var array
     */
    private static $spacing_options = [
        'p-1' => 'Very small',
        'p-2' => 'Small',
        'p-3' => 'Medium',
        'p-4' => 'Large',
        'p-5' => 'Very large',
    ];

    /**
     * Database fields
     * @var array
     */
    private static $db = [
        'Spacing' => 'Varchar',
    ];

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab(
            'Root.Main',
            $spacingField = DropdownField::create(
                'Spacing',
                'Spacing',
                $this->getTranslatedConfigArray('spacing_options')
            ),
        );
        return $fields;
    }


    /**
     * getType
     *
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Spacer');
    }

    /**
     * @return array
     */
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getTranslatedConfigArrayOption('spacing_options', $this->Spacing);
        return $blockSchema;
    }

}

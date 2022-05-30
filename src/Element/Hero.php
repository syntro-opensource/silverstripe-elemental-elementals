<?php

namespace Syntro\SilverstripeElementalElementals\Element;

use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\FieldList;
use DNADesign\Elemental\Models\ElementContent;
use Syntro\SilverStripeElementalBaseitem\Forms\GridFieldConfig_ElementalChildren;
use Syntro\SilverstripeElementalElementals\Model\Button;

/**
 * A Spacer is a simple element allowing the injection of whitespace on a page
 *
 * @author Matthias LEutenegger <hello@syntro.ch>
 */
class Hero extends ElementContent
{

    /**
     * Defines the database table name
     * @config
     *  @var string
     */
    private static $table_name = 'ElementHero';

    /**
     * @config
     * @var string
     */
    private static $icon = 'font-icon-block-promo-2';

    /**
     * @config
     * Singular name for CMS
     *  @var string
     */
    private static $singular_name = 'Hero';

    /**
     * Plural name for CMS
     * @config
     *  @var string
     */
    private static $plural_name = 'Heroes';

    /**
     * @config
     * @var bool
     */
    private static $inline_editable = false;

    /**
     * Display a show title button
     *
     * @config
     * @var boolean
     */
    private static $displays_title_in_template = true;


    /**
     * Database fields
     * @config
     * @var array
     */
    private static $db = [
        'ShowContent' => 'Boolean'
    ];

    /**
     * Has_many relationship
     * @config
     * @var array
     */
    private static $has_many = [
        'Buttons' => Button::class,
    ];

    /**
     * Relationship version ownership
     *
     * @var array
     */
    private static $owns = [
        'Buttons'
    ];

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName([
            'ShowContent'
        ]);
        $fields->insertBefore(
            'HTML',
            CheckboxField::create(
                'ShowContent',
                _t(__CLASS__ . '.SHOWCONTENTTITLE', 'Show Content')
            )
        );
        $contentField = $fields->fieldByName('Root.Main.HTML');
        $contentField->hideUnless('ShowContent')->isChecked();
        if ($this->ID) {
            /** @var GridField $griditems */
            $griditems = $fields->fieldByName('Root.Buttons.Buttons');
            $griditems->setConfig(GridFieldConfig_ElementalChildren::create());
            $fields->removeByName([
                'Buttons',
                'Root.Buttons.Buttons'
            ]);
            $fields->addFieldToTab(
                'Root.Main',
                $griditems
            );
        } else {
            $fields->removeByName([
                'Buttons',
                'Root.Buttons.Buttons'
            ]);
        }
        return $fields;
    }


    /**
     * getType
     *
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Hero');
    }

    /**
     * getSummary
     *
     * @return string
     */
    public function getSummary()
    {
        if ($this->ShowContent) {
            return '"' . parent::getSummary() . '" + ' . $this->Buttons()->count() . ' Buttons';
        }
        return $this->Buttons()->count() . ' Buttons';
    }
}

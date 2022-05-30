<?php

namespace Syntro\SilverstripeElementalElementals\Extension;

use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FieldGroup;

/**
 * Adds fields specific to the display of the title.
 *
 * These fields are added to every element via base-element,
 * but you can disable them in the CMS by setting the 'allow_title_customization'
 * to false.
 *
 * @author Matthias Leutenegger <hello@syntro.ch>
 */
class ElementTitleExtension extends DataExtension
{
    /**
     * Database fields
     * @config
     * @var array
     */
    private static $db = [
        'TitleTag' => 'Enum("h1,h2,h3,h4,h5,h6,p", "h2")',
        'TitleAlignment' => 'Enum("start,center,end", "start")',
        'TitleExtraClasses' => 'Varchar'
    ];

    /**
     * Add default values to database
     * @config
     *  @var array
     */
    private static $defaults = [
        'TitleTag' => 'h2',
        'TitleAlignment' => 'start',
    ];

    /**
     * updateCMSFields
     *
     * @param  FieldList $fields the original fields
     * @return FieldList
     */
    public function updateCMSFields($fields)
    {
        $owner = $this->getOwner();
        $fields->removeByName(['TitleTag', 'TitleAlignment', 'TitleExtraClasses']);

        $allowCustomTitle = $owner->config()->get('allow_title_customization');
        $inlineEditable = $owner->config()->get('inline_editable');

        if ($allowCustomTitle) {
            $titleFields = [
                $tagField = DropdownField::create(
                    'TitleTag',
                    _t(__CLASS__ . '.TIITLETAGTITLE', 'Title Tag'),
                    ['h1' => 'H1', 'h2' => 'H2', 'h3' => 'H3', 'h4' => 'H4', 'h5' => 'H5', 'h6' => 'H6', 'p' => 'p']
                ),
                $alignmentField = DropdownField::create(
                    'TitleAlignment',
                    _t(__CLASS__ . '.TIITLEALIGNMENTTITLE', 'Title Alignment'),
                    [
                        'start' => _t(__CLASS__ . '.TIITLEALIGNMENTSTART', 'Left Aligned'),
                        'center' => _t(__CLASS__ . '.TIITLEALIGNMENTCENTER', 'Centered'),
                        'end' => _t(__CLASS__ . '.TIITLEALIGNMENTEND', 'Right Aligned')
                    ]
                ),
                $extraclassesField = TextField::create(
                    'TitleExtraClasses',
                    _t(__CLASS__ . '.TIITLEEXTRACLASSTITLE', 'Title Extra Classes')
                )
            ];
            $fields->insertAfter('ExtraClass', FieldGroup::create( _t(__CLASS__ . '.TITLESETTINGS', 'Title Settings'), $titleFields));
        }
        return $fields;
    }
}
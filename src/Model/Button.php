<?php

namespace Syntro\SilverstripeElementalElementals\Model;

use SilverStripe\ORM\DataObject;
use gorriecoe\Link\Models\Link;
use gorriecoe\LinkField\LinkField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use Syntro\SilverStripeElementalBaseitem\Model\BaseItem;
use Syntro\SilverstripeElementalElementals\Traits\TranslatableConfigArrays;

/**
 * A displayable Button
 *
 * @author Matthias Leutenegger <hello@syntro.ch>
 */
class Button extends BaseItem
{
    use TranslatableConfigArrays;
    /**
     * Defines the database table name
     *  @var string
     */
    private static $table_name = 'ElementalsButton';

    /**
     * @config
     * @var array
     */
     private static $styles = [];


     /**
      * Database fields
      * @var array
      */
     private static $db = [
         'Style' => 'Varchar',
     ];

    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = [
        'Section' => DataObject::class,
        'Link' => Link::class
    ];

    /**
     * Relationship version ownership
     * @var array
     */
    private static $owns = [
        'Link'
    ];

    /**
     * Defines summary fields commonly used in table columns
     * as a quick overview of the data for this dataobject
     * @var array
     */
    private static $summary_fields = [
        'Link.Title' => 'Title',
        'Style' => 'Style',
    ];

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName([
            'SectionID',
            'LinkID',
            'Style',
            'Title',
        ]);
        if (count(static::getTranslatedConfigArray('styles'))) {
            $fields->addFieldToTab(
                'Root.Main',
                $styleField = DropdownField::create(
                    'Style',
                    _t(__CLASS__ . '.STYLETITLE', 'Style'),
                    static::getTranslatedConfigArray('styles')
                )
            );
        }
        $fields->addFieldToTab(
            'Root.Main',
            $linkField = LinkField::create(
                'Link',
                _t(__CLASS__ . '.LINKTITLE', 'Link'),
                $this
            )
        );

        return $fields;
    }

    /**
     * getTitle - pipe the link-title
     *
     * @return string
     */
    public function getTitle()
    {
        return isset($this->Link->Title) ? $this->Link->Title : _t(__CLASS__ . '.UNTITLEDBUTTON', 'Untitled Button');
    }
}

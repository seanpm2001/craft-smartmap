<?php
namespace Craft;

class SmartMap_AddressRecord extends BaseRecord
{
    public function getTableName()
    {
        return craft()->smartMap->pluginTable;
    }

    protected function defineAttributes()
    {

        // Creates SQL column of "decimal(12,8)"
        $coordColumn = array(
            AttributeType::Number,
            'column'   => ColumnType::Decimal,
            'length'   => 12,
            'decimals' => 8,
        );

        return array(
            'handle'    => AttributeType::String,
            'street1'   => AttributeType::String,
            'street2'   => AttributeType::String,
            'city'      => AttributeType::String,
            'state'     => AttributeType::String,
            'zip'       => AttributeType::String,
            'lat'       => $coordColumn,
            'lng'       => $coordColumn,
        );

    }

    public function defineRelations()
    {
        return array(
            'element' => array(static::BELONGS_TO, 'ElementRecord', 'required' => true, 'onDelete' => static::CASCADE),
        );
    }

}
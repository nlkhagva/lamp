<?php


class ShippingZoneTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ShippingZone');
    }
}
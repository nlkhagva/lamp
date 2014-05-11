<?php


class ShopOrderItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ShopOrderItem');
    }
}
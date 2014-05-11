<?php


class ShopOrderStatusTable extends Doctrine_Table
{
    const NEW_ORDER = 1;
    const ADMIN_CONFIRM = 2;
    const FEE_COMPLETE = 3;
    const COMPLETE = 4;
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ShopOrderStatus');
    }
}
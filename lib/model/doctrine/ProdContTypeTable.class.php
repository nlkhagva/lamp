<?php


class ProdContTypeTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ProdContType');
    }
}
<?php


class PageTable extends Doctrine_Table
{
    const TERMS_OF_CONDITIONS = 1;
    
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Page');
    }
}
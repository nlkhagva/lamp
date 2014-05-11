<?php


class SectionTypeTable extends Doctrine_Table
{
    const CONTENT = 1;
    const IMAGE = 2;
    const VIDEO = 3;

    public static function getInstance()
    {
        return Doctrine_Core::getTable('SectionType');
    }
}
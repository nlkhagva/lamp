<?php


class GalleryTable extends PluginGalleryTable
{
    const HOMEPAGE = 1;


    public static function getInstance()
    {
        return Doctrine_Core::getTable('Gallery');
    }
}
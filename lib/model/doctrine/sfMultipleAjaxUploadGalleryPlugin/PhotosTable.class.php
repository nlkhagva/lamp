<?php


class PhotosTable extends PluginPhotosTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Photos');
    }
}
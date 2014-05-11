<?php


class sfGuardLoginHistoryTable extends PluginsfGuardLoginHistoryTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardLoginHistory');
    }
}
<?php


class ShopOptionValueTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ShopOptionValue');
    }
    public function getValue($option_id, $value_id){
        $q = $this->getInstance()->createQuery();
        $q->addWhere('option_id =?', $option_id);
        $q->addWhere('id = ?', $value_id);
        
        return $q->fetchOne();
    }
}
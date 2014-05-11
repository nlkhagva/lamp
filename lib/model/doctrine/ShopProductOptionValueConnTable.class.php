<?php


class ShopProductOptionValueConnTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ShopProductOptionValueConn');
    }
    public function getObject($product_id, $value_id)
    {
        $q = $this->getInstance()->createQuery();
        $q->addWhere('product_id =?', $product_id);
        $q->addWhere('value_id = ?', $value_id);
        
        return $q->fetchOne();
    }
    public static function getOptionIdsByProduct($product_id)
    {
        $q = self::getInstance()->createQuery();
        $q->addWhere('product_id = ?', $product_id);
        $q->groupBy('option_id');
        
        $ids = array();
        
        foreach($q->execute() as $item){
            $ids[] = $item->getOptionId();
        }
        
        return $ids;
    }
    public static function getValueIdsByProduct($product_id)
    {
        $q = self::getInstance()->createQuery();
        $q->addWhere('product_id = ?', $product_id);
        $q->groupBy('value_id');
        
        $ids = array();
        
        foreach($q->execute() as $item){
            $ids[] = $item->getValueId();
        }
        
        return $ids;
    }
}
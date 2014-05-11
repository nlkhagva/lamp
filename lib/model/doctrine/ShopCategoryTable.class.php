<?php


class ShopCategoryTable extends Doctrine_Table
{
    const DRIED  = 1;
    const BERRY  = 2;
    
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ShopCategory');
    }
    public function getTopLevel()
    {
        $q = $this->createQuery();
        $q->addWhere('parent_id IS NULL');
        $q->orderBy('sort_order ASC');
        
        return $q->execute();
    }
    public function getList($parent_id = 0, $order_by = array()){
        $q = self::getInstance()->createQuery();
        
        if($parent_id)
            $q->addWhere('parent_id = ?', $parent_id);
        
        $q->addWhere('sort_order > -1');
        if(count($order_by) > 0){
            $q->orderBy(implode(',', $order_by));
        }
        
        return $q->execute();
    }
}
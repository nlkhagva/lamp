<?php

class CategoryTable extends Doctrine_Table
{
    const FEATURE_RECIPE = 1;
    const HEALTH_BERRY   = 2;
    const HEALTH_BENEFITS  = 12;
    const HEALTH_MYPLANE   = 13;
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Category');
    }

    public static function getAccess()
    {
       return array('berry' => 'Browse by berry', 'course' => 'Browse by course', 'theme' => 'Browse by theme'); 
    }
    
    public function getPageCategories()
    {
        return $this->getInstance()->findBy('section_id', SectionTable::PAGE);
    }
    
    public function getList($section_id = 0, $limit = 0, $order_by = array())
    {
        $q = self::getInstance()->createQuery();
       
        if($section_id)
            $q->addWhere('section_id = ? ', $section_id);
        
        if(count($order_by) > 0){
            $q->orderBy(implode(', ', $order_by));
        }
        
        if($limit)
            $q->limit($limit);
        
        return $q->execute();
    }
    public static function browseType($key)
    {
        $q = self::getInstance()->createQuery()->where('access = ?', $key)->orderBy('order_id ASC');
        
        return $q->execute();
    }
    
}
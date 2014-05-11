<?php


class VideoTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Video');
    }
    
    public function getLatestVideo($category_id = 0, $limit = 0)
    {
        $q = $this->createQuery();
        
        if($category_id)
            $q->addWhere('category_id =?', $category_id);
        $q->orderBy('created_at DESC');

        if($limit)
            $q->limit($limit);
        if($limit == 1)
            return $q->fetchOne ();
        
        return $q->execute();
    }
}
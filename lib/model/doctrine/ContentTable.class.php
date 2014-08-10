<?php


class ContentTable extends Doctrine_Table
{
    const PURPOSE      = 1;
    const GREETING     = 2; 
    const INTRODUCTION = 3; 
    const CONTACT_US   = 4; 
    const COMMUNITY    = 5; 
    const AJLIIN_BAIR  = 6; 
    const ANKET        = 7; 
    
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Content');
    }
    public function getListQuery($category_id = 0,$order = array(), $limit = 0)
    {
        $q = Doctrine_Query::create()
                    ->from('Content c')->leftJoin('c.CategoryContent o')->addWhere('c.published = 1');

        if($category_id)
            $q->addWhere('o.category_id = ?', $category_id);

        if($order){
                $q->orderBy(implode(', ', $order));
        }else{
            $q->orderBy('created_at Desc');
        }
        
        if($limit){
            $q->limit($limit);
        }
        
        $q->addWhere('c.published =?', 1);
        return $q;
    }
    public function getList($category_id = 0, $limit = 0, $order = array())
    {
        return $this->getListQuery($category_id, $order, $limit)->execute();
    }
    public function FiltSecQuery($sec_id = 0, $limit = 0,$order = array(), $where = array())
    {
        $q = Doctrine_Query::create()
                    ->from('Content c')->addWhere('c.published = 1');

        if($sec_id)
            $q->addWhere('c.section_id = ?', $sec_id);

        if($where){
            foreach($where as $con => $w){
                $q->addWhere($con, $w);
            }
        }
        
        if($order){
            $q->orderBy(implode(',', $order));
        }else{
            $q->orderBy('created_at Desc');
        }
        if($limit){
            $q->limit($limit);
        }
        
        return $q;
    }
    public function getFiltSec($sec_id = 0, $limit = 0,$order = array(), $where = array())
    {
        return $this->FiltSecQuery($sec_id, $limit, $order, $where)->execute();
    }
    
    public function getTopWithImage($limit = 5)
    {
        return $this->getList(CategoryTable::TOP_WITH_IMAGE, $limit);
    }
    
    public function getEvents($limit = 3)
    {
        return $this->getList(CategoryTable::EVENT, $limit);
    }
    
    
    public function getProductsWithFilter($lang ='mn', $cat_id = 0, $search_key = '')
    {
        $pdo = Doctrine_Manager::connection()->getDbh();
//		SELECT * FROM content_translation as L LEFT JOIN content AS R ON L.id = R.id WHERE L.title like '%we%'
                        
        $sql = "SELECT L.title, R.image_name, L.id, AA.category_id FROM (content_translation as L LEFT JOIN content AS R ON L.id = R.id)  LEFT JOIN category_content AS  AA ON  R.id = AA.content_id WHERE R.section_id = 4 AND L.lang = '$lang' ";
        if($cat_id)
            $sql .= " AND AA.category_id = $cat_id";
        else if($search_key)
            $sql .= " AND L.title LIKE '%$search_key%'";

        return $pdo->query($sql)->fetchAll();	
    }
    

}
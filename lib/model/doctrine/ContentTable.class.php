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
    
    public function getTopRecipes($limit = 0)
    {
        $q = self::getInstance()->getRecipesQuery($limit, null, array('is_feature = ?' => 1));
//        $q->addWhere('is_feature = 1');
        
        return $q->execute();
    }
    
    public function getRecipesQuery($limit = 0, $orders = array(), $wheres = array()){
        $q = Doctrine_Query::create()
                    ->from('Content c');

        $q->where('section_id = ?', SectionTable::RECIPE);

        if(count($wheres) > 0){
            foreach($wheres as $con => $where){
                $q->addWhere($con, $where);
            }
        }
        
        if(count($orders) > 0){
            $q->orderBy(implode(',', $orders));
        }else{
            $q->orderBy('created_at DESC');
        }
        
        if($limit)
            $q->limit($limit);
        
        return $q;
    }
    public function getRecipes($limit = 0, $orders = array(), $wheres = array())
    {
        $q = self::getInstance()->getRecipesQuery($limit, $orders, $wheres);
        
        return $q->execute();
    }
    
    
    public function getBrowseRecipesQuery($slug = false)
    {
        $q = CategoryTable::getInstance()->createQuery()->addWhere('section_id = ?', SectionTable::RECIPE);
        
        if($slug)
            $q->addWhere('access = ?', $slug);
        
        $cat_ids = array();
        foreach($q->execute() as $category){
            $cat_ids[] = $category->id;
        }
        
        if(count($cat_ids) == 0 )
            return false;
        
        $q = ContentTable::getInstance()->createQuery('c')->leftJoin('c.CategoryContent t');
        
        if(count($cat_ids) > 0 )
            $q->whereIn('t.category_id', $cat_ids);
               
        $q->orderBy('created_at DESC');
        
        return $q;
    }
    public function getBrowseRecipes($slug)
    {
        $q = self::getInstance()->getBrowseRecipeQuery($slug);
        return $q->execute();
    }
}
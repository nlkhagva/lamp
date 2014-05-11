<?php

/**
 * Content
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Content extends BaseContent
{
    
    public function getThisSecContent($limit = 5, $order_by = array())
    {
        return Doctrine_Core::getTable('Content')
                ->FiltSecQuery($this->getSectionId(), $limit)
                ->addWhere('id != ?', $this->getId())
                ->orderBy('RAND()') 
                ->execute();
    }
    public function isStatic()
    {
        $cnt = Doctrine_Core::getTable('Content')
                ->createQuery()
                ->whereIn(ContentTable::getStaticContents())
                ->count();
        if($cnt)
            return true;
        else
            return false;
    }
    
    public function haveOneCategory()
    {
        $cnt = Doctrine_Core::getTable('CategoryContent')->createQuery()->where('content_id =?', $this->getId())->count();
        
        if($cnt == 0)
            return false;
        else
            return true;
    }
    public function getOneCategory()
    {
        $cat = $this->getCategories();
        
        return $cat[0];
    }
    public function getRelationNews($limit = 0)
    {
        return $this->getOneCategory()->getContentsWithOrder($limit, array('RAND()'), $this->getId());
    }
    
    
    public function updateRating()
    {
        $conn = Doctrine_Manager::connection()->getDbh();
        
        $query = 'SELECT SUM(rating)/count(*) as total FROM `content_rating` WHERE content_id = '.$this->getId();
        
        $total = $conn->query($query)->fetch();
        
        $this->setRating($total['total']);
        $this->save();
    }
}
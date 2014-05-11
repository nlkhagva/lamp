<?php


class ShopProductTable extends Doctrine_Table
{
    const STRAWBERRY = 20;
    const BLUEBERRY  = 21;
    const RASPBERRY  = 22;
    const BLACKBERRY = 23;
    
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ShopProduct');
    }
    public static function getPriceTypes()
    {
        return array(0 => '₮', 1 => '$');
    }
    
    public function getProductsQuery($category_id = 0, $limit = 0, $order_by = array())
    {
        $q = self::getInstance()->createQuery();
        
        if($category_id){ 
            $q->addWhere('category_id = ?', array($category_id));
        }
        
        if(count($order_by) > 0)$q->orderBy(implode(', ', $order_by));
        
        if($limit) $q->limit($limit);
        
        return $q;
    }
    
    public function getQueryWithParentCat($top_level_cat = 0, $limit = 0, $order_by = array()){
        $category = ShopCategoryTable::getInstance()->find($top_level_cat);
        
        $ids = array($top_level_cat);
        
        foreach($category->getChilds() as $item){
            $ids[] = $item->id;
        }
        
        $q = self::getInstance()->createQuery();
        
        $q->whereIn('category_id', $ids);
        
        if(count($order_by) > 0)$q->orderBy(implode(', ', $order_by));
        if($limit) $q->limit($limit);
        
        return $q;
    }

    public static function getBestSellerProductIds($limit = 0)
    {
        $conn = Doctrine_Manager::connection()->getDbh();
        $sql = "SELECT SUM(quantity) as lk, product_id FROM shop_order_item GROUP BY product_id ORDER BY lk ";
        if($limit)
            $sql .= ' LIMIT '.$limit;

        $products = $conn->query($sql)->fetchAll();
        $ids = array();

        foreach($products as $p){
            $ids[] = $p['product_id'];
        }

        return count($ids)?$ids:false;
    }

    public function bestSeller($limit = 3)
    {
        $ids = self::getBestSellerProductIds($limit);

        return self::getInstance()->createQuery()->whereIn('id', $ids)->execute();;
    }
    
}
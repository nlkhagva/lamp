<?php


class ShopOrderTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ShopOrder');
    }
    public function getSearchQuery($query)
    {
        $q = self::getInstance()->createQuery('o');
        $q->leftJoin('o.Customer u');
        
        $q->orWhere('o.invoice_number like ?', $query);
        
        $q->orWhere('u.email_address like ?', '%'.$query.'%');
        $q->orWhere('u.first_name like ?', '%'.$query.'%');
        $q->orWhere('u.phone like ?', '%'.$query.'%');
        $q->orWhere('u.phone2 like ?', '%'.$query.'%');
        
        $q->leftJoin('o.OrderItems i');
        $q->leftJoin('i.ShopProduct p');
        $q->leftJoin('p.Translation pt');
        $q->orWhere('pt.title like ?', '%'.$query.'%');
        
        return $q;
    }
}
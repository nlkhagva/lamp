<?php


class ShopOrderTransactionTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ShopOrderTransaction');
    }
    
    public function getTotalAmount($order_id = 0, $is_today = false)
    {
        $q = self::getInstance()->createQuery()->select('SUM(amount) as total_amount');

        if($order_id)
            $q->where('order_id = ?', $order_id);

        if($is_today){
            $q->addWhere(' DATE(created_at) = DATE(NOW())');
        }
        $total = $q->fetchOne();
        
        return $total['total_amount'];
    }

}
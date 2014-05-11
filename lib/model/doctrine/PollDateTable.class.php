<?php


class PollDateTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PollDate');
    }
    public function getLastVote($ip_address = '127.0.0.1', $poll_id = 0)
    {
        $q = Doctrine_Query::create()
                ->from('PollDate p')
                ->where('p.ip_address =?', $ip_address)
                ->addWhere('p.poll_id =?', $poll_id)
                ->orderBy('p.created_at Desc')
                ->limit(1)
                ->execute();
        return $q[0];
    }
    
}
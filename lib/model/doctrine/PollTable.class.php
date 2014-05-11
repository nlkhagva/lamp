<?php


class PollTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Poll');
    }
    public function getLatest($limit = 0)
    {
        $q = Doctrine_Query::create()
                    ->from('Poll p')
                    ->orderBy('p.created_at DESC');
        if($limit)
            $q->limit($limit);

        if($limit == 1){
            $arra = $q->execute();
            return $arra[0];
        }else
            return $q->execute();
    }    
}
<?php


class PollDataTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PollData');
    }
    public function getPollDatas($id)
    {
	    	$q = Doctrine_Query::create()
	    				->from('PollData p')
	    				->where('poll_id =?', $id);
	    	
	    	return $q ->execute();
    }    
}
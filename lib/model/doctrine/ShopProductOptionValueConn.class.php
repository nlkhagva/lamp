<?php

/**
 * ShopProductOptionValueConn
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ShopProductOptionValueConn extends BaseShopProductOptionValueConn
{
    public function save(Doctrine_Connection $conn = null)
    {
        if($this->getValueId()){
            $this->setOption($this->getOptionValue()->getOption());
        }
        
        parent::save($conn);
    }
}

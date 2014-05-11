<?php

/**
 * BaseOrderShipping
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $order_id
 * @property string $address
 * @property integer $user_id
 * @property boolean $is_complete
 * @property ShopOrder $ShopOrder
 * @property sfGuardUser $Customer
 * 
 * @method integer       getOrderId()     Returns the current record's "order_id" value
 * @method string        getAddress()     Returns the current record's "address" value
 * @method integer       getUserId()      Returns the current record's "user_id" value
 * @method boolean       getIsComplete()  Returns the current record's "is_complete" value
 * @method ShopOrder     getShopOrder()   Returns the current record's "ShopOrder" value
 * @method sfGuardUser   getCustomer()    Returns the current record's "Customer" value
 * @method OrderShipping setOrderId()     Sets the current record's "order_id" value
 * @method OrderShipping setAddress()     Sets the current record's "address" value
 * @method OrderShipping setUserId()      Sets the current record's "user_id" value
 * @method OrderShipping setIsComplete()  Sets the current record's "is_complete" value
 * @method OrderShipping setShopOrder()   Sets the current record's "ShopOrder" value
 * @method OrderShipping setCustomer()    Sets the current record's "Customer" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOrderShipping extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('order_shipping');
        $this->hasColumn('order_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('address', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('is_complete', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ShopOrder', array(
             'local' => 'order_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as Customer', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}
<?php

/**
 * BaseShopOrderMessage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $order_id
 * @property integer $send_user_id
 * @property string $message
 * @property boolean $is_block
 * @property boolean $is_read
 * @property ShopOrder $ShopOrder
 * @property sfGuardUser $Sender
 * 
 * @method integer          getOrderId()      Returns the current record's "order_id" value
 * @method integer          getSendUserId()   Returns the current record's "send_user_id" value
 * @method string           getMessage()      Returns the current record's "message" value
 * @method boolean          getIsBlock()      Returns the current record's "is_block" value
 * @method boolean          getIsRead()       Returns the current record's "is_read" value
 * @method ShopOrder        getShopOrder()    Returns the current record's "ShopOrder" value
 * @method sfGuardUser      getSender()       Returns the current record's "Sender" value
 * @method ShopOrderMessage setOrderId()      Sets the current record's "order_id" value
 * @method ShopOrderMessage setSendUserId()   Sets the current record's "send_user_id" value
 * @method ShopOrderMessage setMessage()      Sets the current record's "message" value
 * @method ShopOrderMessage setIsBlock()      Sets the current record's "is_block" value
 * @method ShopOrderMessage setIsRead()       Sets the current record's "is_read" value
 * @method ShopOrderMessage setShopOrder()    Sets the current record's "ShopOrder" value
 * @method ShopOrderMessage setSender()       Sets the current record's "Sender" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseShopOrderMessage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('shop_order_message');
        $this->hasColumn('order_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('send_user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('message', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_block', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_read', 'boolean', null, array(
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

        $this->hasOne('sfGuardUser as Sender', array(
             'local' => 'send_user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
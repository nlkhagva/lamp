<?php

/**
 * BaseShopCoupon
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $type_id
 * @property integer $object_id
 * @property integer $user_id
 * @property float $percent
 * @property float $sale_value
 * @property float $kg_value
 * @property timestamp $start_date
 * @property timestamp $end_date
 * @property ShopObjectType $ShopObjectType
 * @property sfGuardUser $CouponCustomer
 * 
 * @method integer        getTypeId()         Returns the current record's "type_id" value
 * @method integer        getObjectId()       Returns the current record's "object_id" value
 * @method integer        getUserId()         Returns the current record's "user_id" value
 * @method float          getPercent()        Returns the current record's "percent" value
 * @method float          getSaleValue()      Returns the current record's "sale_value" value
 * @method float          getKgValue()        Returns the current record's "kg_value" value
 * @method timestamp      getStartDate()      Returns the current record's "start_date" value
 * @method timestamp      getEndDate()        Returns the current record's "end_date" value
 * @method ShopObjectType getShopObjectType() Returns the current record's "ShopObjectType" value
 * @method sfGuardUser    getCouponCustomer() Returns the current record's "CouponCustomer" value
 * @method ShopCoupon     setTypeId()         Sets the current record's "type_id" value
 * @method ShopCoupon     setObjectId()       Sets the current record's "object_id" value
 * @method ShopCoupon     setUserId()         Sets the current record's "user_id" value
 * @method ShopCoupon     setPercent()        Sets the current record's "percent" value
 * @method ShopCoupon     setSaleValue()      Sets the current record's "sale_value" value
 * @method ShopCoupon     setKgValue()        Sets the current record's "kg_value" value
 * @method ShopCoupon     setStartDate()      Sets the current record's "start_date" value
 * @method ShopCoupon     setEndDate()        Sets the current record's "end_date" value
 * @method ShopCoupon     setShopObjectType() Sets the current record's "ShopObjectType" value
 * @method ShopCoupon     setCouponCustomer() Sets the current record's "CouponCustomer" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseShopCoupon extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('shop_coupon');
        $this->hasColumn('type_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('object_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('percent', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('sale_value', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('kg_value', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('start_date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('end_date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ShopObjectType', array(
             'local' => 'type_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as CouponCustomer', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}
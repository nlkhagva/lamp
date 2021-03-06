<?php

/**
 * BaseProductToContent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $product_id
 * @property integer $content_id
 * @property integer $type_id
 * @property ShopProduct $ShopProduct
 * @property Content $Content
 * @property ProdContType $ProdContType
 * 
 * @method integer          getProductId()    Returns the current record's "product_id" value
 * @method integer          getContentId()    Returns the current record's "content_id" value
 * @method integer          getTypeId()       Returns the current record's "type_id" value
 * @method ShopProduct      getShopProduct()  Returns the current record's "ShopProduct" value
 * @method Content          getContent()      Returns the current record's "Content" value
 * @method ProdContType     getProdContType() Returns the current record's "ProdContType" value
 * @method ProductToContent setProductId()    Sets the current record's "product_id" value
 * @method ProductToContent setContentId()    Sets the current record's "content_id" value
 * @method ProductToContent setTypeId()       Sets the current record's "type_id" value
 * @method ProductToContent setShopProduct()  Sets the current record's "ShopProduct" value
 * @method ProductToContent setContent()      Sets the current record's "Content" value
 * @method ProductToContent setProdContType() Sets the current record's "ProdContType" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProductToContent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('product_to_content');
        $this->hasColumn('product_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('content_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('type_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ShopProduct', array(
             'local' => 'product_id',
             'foreign' => 'id'));

        $this->hasOne('Content', array(
             'local' => 'content_id',
             'foreign' => 'id'));

        $this->hasOne('ProdContType', array(
             'local' => 'type_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($i18n0);
    }
}
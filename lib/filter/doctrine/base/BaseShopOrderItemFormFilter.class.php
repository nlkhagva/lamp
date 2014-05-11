<?php

/**
 * ShopOrderItem filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShopOrderItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'order_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'add_empty' => true)),
      'quantity'    => new sfWidgetFormFilterInput(),
      'product_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopProduct'), 'add_empty' => true)),
      'unit_price'  => new sfWidgetFormFilterInput(),
      'total_price' => new sfWidgetFormFilterInput(),
      'sale_log'    => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'order_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ShopOrder'), 'column' => 'id')),
      'quantity'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'product_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ShopProduct'), 'column' => 'id')),
      'unit_price'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'total_price' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'sale_log'    => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('shop_order_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopOrderItem';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'order_id'    => 'ForeignKey',
      'quantity'    => 'Number',
      'product_id'  => 'ForeignKey',
      'unit_price'  => 'Number',
      'total_price' => 'Number',
      'sale_log'    => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}

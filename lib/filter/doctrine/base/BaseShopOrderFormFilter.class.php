<?php

/**
 * ShopOrder filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShopOrderFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'invoice_number'        => new sfWidgetFormFilterInput(),
      'invoice_number_report' => new sfWidgetFormFilterInput(),
      'status_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrderStatus'), 'add_empty' => true)),
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'), 'add_empty' => true)),
      'shipping_fee'          => new sfWidgetFormFilterInput(),
      'remain_amount'         => new sfWidgetFormFilterInput(),
      'total_amount'          => new sfWidgetFormFilterInput(),
      'product_total_amount'  => new sfWidgetFormFilterInput(),
      'product_count'         => new sfWidgetFormFilterInput(),
      'ip_address'            => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'invoice_number'        => new sfValidatorPass(array('required' => false)),
      'invoice_number_report' => new sfValidatorPass(array('required' => false)),
      'status_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ShopOrderStatus'), 'column' => 'id')),
      'user_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Customer'), 'column' => 'id')),
      'shipping_fee'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'remain_amount'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'total_amount'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'product_total_amount'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'product_count'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ip_address'            => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('shop_order_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopOrder';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'invoice_number'        => 'Text',
      'invoice_number_report' => 'Text',
      'status_id'             => 'ForeignKey',
      'user_id'               => 'ForeignKey',
      'shipping_fee'          => 'Number',
      'remain_amount'         => 'Number',
      'total_amount'          => 'Number',
      'product_total_amount'  => 'Number',
      'product_count'         => 'Number',
      'ip_address'            => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}

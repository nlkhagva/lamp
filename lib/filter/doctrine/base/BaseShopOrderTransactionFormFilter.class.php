<?php

/**
 * ShopOrderTransaction filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShopOrderTransactionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'order_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'add_empty' => true)),
      'status_id'   => new sfWidgetFormFilterInput(),
      'user_id'     => new sfWidgetFormFilterInput(),
      'code'        => new sfWidgetFormFilterInput(),
      'amount'      => new sfWidgetFormFilterInput(),
      'exchange'    => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'ip_address'  => new sfWidgetFormFilterInput(),
      'created_by'  => new sfWidgetFormFilterInput(),
      'updated_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UpdateCustomer'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'order_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ShopOrder'), 'column' => 'id')),
      'status_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'code'        => new sfValidatorPass(array('required' => false)),
      'amount'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'exchange'    => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'ip_address'  => new sfValidatorPass(array('required' => false)),
      'created_by'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_by'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UpdateCustomer'), 'column' => 'id')),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('shop_order_transaction_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopOrderTransaction';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'order_id'    => 'ForeignKey',
      'status_id'   => 'Number',
      'user_id'     => 'Number',
      'code'        => 'Text',
      'amount'      => 'Number',
      'exchange'    => 'Text',
      'description' => 'Text',
      'ip_address'  => 'Text',
      'created_by'  => 'Number',
      'updated_by'  => 'ForeignKey',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}

<?php

/**
 * ProductStock filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProductStockFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'product_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopProduct'), 'add_empty' => true)),
      'value'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_when'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'is_add'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'description' => new sfWidgetFormFilterInput(),
      'order_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'add_empty' => true)),
      'created_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedUser'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'product_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ShopProduct'), 'column' => 'id')),
      'value'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_when'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'is_add'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'description' => new sfValidatorPass(array('required' => false)),
      'order_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ShopOrder'), 'column' => 'id')),
      'created_by'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CreatedUser'), 'column' => 'id')),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('product_stock_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductStock';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'product_id'  => 'ForeignKey',
      'value'       => 'Number',
      'date_when'   => 'Date',
      'is_add'      => 'Boolean',
      'description' => 'Text',
      'order_id'    => 'ForeignKey',
      'created_by'  => 'ForeignKey',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}

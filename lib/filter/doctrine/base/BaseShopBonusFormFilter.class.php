<?php

/**
 * ShopBonus filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShopBonusFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopObjectType'), 'add_empty' => true)),
      'object_id'    => new sfWidgetFormFilterInput(),
      'min_interval' => new sfWidgetFormFilterInput(),
      'percent'      => new sfWidgetFormFilterInput(),
      'sale_value'   => new sfWidgetFormFilterInput(),
      'kg_value'     => new sfWidgetFormFilterInput(),
      'start_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'type_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ShopObjectType'), 'column' => 'id')),
      'object_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'min_interval' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'percent'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'sale_value'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'kg_value'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'start_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('shop_bonus_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopBonus';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'type_id'      => 'ForeignKey',
      'object_id'    => 'Number',
      'min_interval' => 'Number',
      'percent'      => 'Number',
      'sale_value'   => 'Number',
      'kg_value'     => 'Number',
      'start_date'   => 'Date',
      'end_date'     => 'Date',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}

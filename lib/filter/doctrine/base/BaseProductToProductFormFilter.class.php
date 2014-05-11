<?php

/**
 * ProductToProduct filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProductToProductFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'product_id'          => new sfWidgetFormFilterInput(),
      'relation_product_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProductRelation'), 'add_empty' => true)),
      'sort_order'          => new sfWidgetFormFilterInput(),
      'type_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProdContType'), 'add_empty' => true)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'product_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'relation_product_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProductRelation'), 'column' => 'id')),
      'sort_order'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProdContType'), 'column' => 'id')),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('product_to_product_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductToProduct';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'product_id'          => 'Number',
      'relation_product_id' => 'ForeignKey',
      'sort_order'          => 'Number',
      'type_id'             => 'ForeignKey',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}

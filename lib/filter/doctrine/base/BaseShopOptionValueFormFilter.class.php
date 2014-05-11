<?php

/**
 * ShopOptionValue filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShopOptionValueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'option_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Option'), 'add_empty' => true)),
      'image_name'    => new sfWidgetFormFilterInput(),
      'sort_order'    => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'products_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ShopProduct')),
    ));

    $this->setValidators(array(
      'option_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Option'), 'column' => 'id')),
      'image_name'    => new sfValidatorPass(array('required' => false)),
      'sort_order'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'products_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ShopProduct', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop_option_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addProductsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ShopProductOptionValueConn ShopProductOptionValueConn')
      ->andWhereIn('ShopProductOptionValueConn.product_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'ShopOptionValue';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'option_id'     => 'ForeignKey',
      'image_name'    => 'Text',
      'sort_order'    => 'Number',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'products_list' => 'ManyKey',
    );
  }
}

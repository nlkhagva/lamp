<?php

/**
 * ShopProduct filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShopProductFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'code'               => new sfWidgetFormFilterInput(),
      'cover_photo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CoverPhoto'), 'add_empty' => true)),
      'price'              => new sfWidgetFormFilterInput(),
      'price_type'         => new sfWidgetFormFilterInput(),
      'product_code'       => new sfWidgetFormFilterInput(),
      'stock_count'        => new sfWidgetFormFilterInput(),
      'total_add'          => new sfWidgetFormFilterInput(),
      'total_minus'        => new sfWidgetFormFilterInput(),
      'created_by'         => new sfWidgetFormFilterInput(),
      'is_active'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_featured'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_submit'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_new'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'related_content'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'add_empty' => true)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'option_values_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ShopOptionValue')),
    ));

    $this->setValidators(array(
      'category_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'code'               => new sfValidatorPass(array('required' => false)),
      'cover_photo_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CoverPhoto'), 'column' => 'id')),
      'price'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'price_type'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'product_code'       => new sfValidatorPass(array('required' => false)),
      'stock_count'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_add'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_minus'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_by'         => new sfValidatorPass(array('required' => false)),
      'is_active'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_featured'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_submit'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_new'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'related_content'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Content'), 'column' => 'id')),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'option_values_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ShopOptionValue', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop_product_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addOptionValuesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ShopProductOptionValueConn.value_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'ShopProduct';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'category_id'        => 'ForeignKey',
      'code'               => 'Text',
      'cover_photo_id'     => 'ForeignKey',
      'price'              => 'Number',
      'price_type'         => 'Number',
      'product_code'       => 'Text',
      'stock_count'        => 'Number',
      'total_add'          => 'Number',
      'total_minus'        => 'Number',
      'created_by'         => 'Text',
      'is_active'          => 'Boolean',
      'is_featured'        => 'Boolean',
      'is_submit'          => 'Boolean',
      'is_new'             => 'Boolean',
      'related_content'    => 'ForeignKey',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'option_values_list' => 'ManyKey',
    );
  }
}

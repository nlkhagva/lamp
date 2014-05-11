<?php

/**
 * ShopOption filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShopOptionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'selectbox' => 'selectbox', 'checkbox' => 'checkbox', 'textarea' => 'textarea', 'input' => 'input'))),
      'sort_order'      => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ShopCategory')),
    ));

    $this->setValidators(array(
      'type'            => new sfValidatorChoice(array('required' => false, 'choices' => array('selectbox' => 'selectbox', 'checkbox' => 'checkbox', 'textarea' => 'textarea', 'input' => 'input'))),
      'sort_order'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ShopCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop_option_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addCategoriesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ShopCategoryOptionConn ShopCategoryOptionConn')
      ->andWhereIn('ShopCategoryOptionConn.category_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'ShopOption';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'type'            => 'Enum',
      'sort_order'      => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'categories_list' => 'ManyKey',
    );
  }
}

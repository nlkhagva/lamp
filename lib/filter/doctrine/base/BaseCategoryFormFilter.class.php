<?php

/**
 * Category filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'section_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Section'), 'add_empty' => true)),
      'published'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'access'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'order_id'      => new sfWidgetFormFilterInput(),
      'created_by'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'updated_by'    => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'contents_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Content')),
    ));

    $this->setValidators(array(
      'section_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Section'), 'column' => 'id')),
      'published'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'access'        => new sfValidatorPass(array('required' => false)),
      'order_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_by'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_by'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'contents_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Content', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addContentsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.CategoryContent CategoryContent')
      ->andWhereIn('CategoryContent.content_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'section_id'    => 'ForeignKey',
      'published'     => 'Boolean',
      'access'        => 'Text',
      'order_id'      => 'Number',
      'created_by'    => 'Number',
      'updated_by'    => 'Number',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'contents_list' => 'ManyKey',
    );
  }
}

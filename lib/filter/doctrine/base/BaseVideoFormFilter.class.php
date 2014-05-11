<?php

/**
 * Video filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVideoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'section_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Section'), 'add_empty' => true)),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'image'       => new sfWidgetFormFilterInput(),
      'file_name'   => new sfWidgetFormFilterInput(),
      'is_embed'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'embed_src'   => new sfWidgetFormFilterInput(),
      'order_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'published'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_by'  => new sfWidgetFormFilterInput(),
      'updated_by'  => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'section_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Section'), 'column' => 'id')),
      'category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'image'       => new sfValidatorPass(array('required' => false)),
      'file_name'   => new sfValidatorPass(array('required' => false)),
      'is_embed'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'embed_src'   => new sfValidatorPass(array('required' => false)),
      'order_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'published'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_by'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_by'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('video_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Video';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'section_id'  => 'ForeignKey',
      'category_id' => 'ForeignKey',
      'image'       => 'Text',
      'file_name'   => 'Text',
      'is_embed'    => 'Boolean',
      'embed_src'   => 'Text',
      'order_id'    => 'Number',
      'published'   => 'Boolean',
      'created_by'  => 'Number',
      'updated_by'  => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}

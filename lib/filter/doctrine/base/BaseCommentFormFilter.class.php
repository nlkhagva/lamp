<?php

/**
 * Comment filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCommentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'content_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'add_empty' => true)),
      'name'         => new sfWidgetFormFilterInput(),
      'email'        => new sfWidgetFormFilterInput(),
      'comment_text' => new sfWidgetFormFilterInput(),
      'created_by'   => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'content_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Content'), 'column' => 'id')),
      'name'         => new sfValidatorPass(array('required' => false)),
      'email'        => new sfValidatorPass(array('required' => false)),
      'comment_text' => new sfValidatorPass(array('required' => false)),
      'created_by'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comment';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'content_id'   => 'ForeignKey',
      'name'         => 'Text',
      'email'        => 'Text',
      'comment_text' => 'Text',
      'created_by'   => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}

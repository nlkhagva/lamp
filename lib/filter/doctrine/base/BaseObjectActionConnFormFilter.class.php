<?php

/**
 * ObjectActionConn filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseObjectActionConnFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'action_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Action'), 'add_empty' => true)),
      'object_type_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ObjectType'), 'add_empty' => true)),
      'slug'            => new sfWidgetFormFilterInput(),
      'sentence_format' => new sfWidgetFormFilterInput(),
      'is_wall'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_notification' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'action_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Action'), 'column' => 'id')),
      'object_type_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ObjectType'), 'column' => 'id')),
      'slug'            => new sfValidatorPass(array('required' => false)),
      'sentence_format' => new sfValidatorPass(array('required' => false)),
      'is_wall'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_notification' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('object_action_conn_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObjectActionConn';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'action_id'       => 'ForeignKey',
      'object_type_id'  => 'ForeignKey',
      'slug'            => 'Text',
      'sentence_format' => 'Text',
      'is_wall'         => 'Boolean',
      'is_notification' => 'Boolean',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}

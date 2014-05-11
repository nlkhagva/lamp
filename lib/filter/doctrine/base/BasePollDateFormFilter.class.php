<?php

/**
 * PollDate filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePollDateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'poll_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'), 'add_empty' => true)),
      'answer_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ip_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'poll_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Poll'), 'column' => 'id')),
      'answer_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ip_address' => new sfValidatorPass(array('required' => false)),
      'user_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('poll_date_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PollDate';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'poll_id'    => 'ForeignKey',
      'answer_id'  => 'Number',
      'ip_address' => 'Text',
      'user_id'    => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}

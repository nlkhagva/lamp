<?php

/**
 * PollDate form base class.
 *
 * @method PollDate getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePollDateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'poll_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'), 'add_empty' => false)),
      'answer_id'  => new sfWidgetFormInputText(),
      'ip_address' => new sfWidgetFormInputText(),
      'user_id'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'poll_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'))),
      'answer_id'  => new sfValidatorInteger(),
      'ip_address' => new sfValidatorString(array('max_length' => 100)),
      'user_id'    => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('poll_date[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PollDate';
  }

}

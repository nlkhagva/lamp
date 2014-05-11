<?php

/**
 * PollData form base class.
 *
 * @method PollData getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePollDataForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'created_by' => new sfWidgetFormInputText(),
      'poll_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'), 'add_empty' => false)),
      'order_id'   => new sfWidgetFormInputText(),
      'vote_count' => new sfWidgetFormInputText(),
      'published'  => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'created_by' => new sfValidatorInteger(array('required' => false)),
      'poll_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'))),
      'order_id'   => new sfValidatorInteger(array('required' => false)),
      'vote_count' => new sfValidatorInteger(array('required' => false)),
      'published'  => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('poll_data[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PollData';
  }

}

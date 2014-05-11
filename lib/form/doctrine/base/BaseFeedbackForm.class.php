<?php

/**
 * Feedback form base class.
 *
 * @method Feedback getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFeedbackForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'title'      => new sfWidgetFormInputText(),
      'body'       => new sfWidgetFormTextarea(),
      'name'       => new sfWidgetFormInputText(),
      'phone'      => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'ip_address' => new sfWidgetFormInputText(),
      'is_read'    => new sfWidgetFormInputCheckbox(),
      'user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 100)),
      'body'       => new sfValidatorString(),
      'name'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'phone'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'ip_address' => new sfValidatorString(array('max_length' => 100)),
      'is_read'    => new sfValidatorBoolean(array('required' => false)),
      'user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('feedback[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Feedback';
  }

}

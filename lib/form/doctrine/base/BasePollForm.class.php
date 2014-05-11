<?php

/**
 * Poll form base class.
 *
 * @method Poll getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePollForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'order_id'    => new sfWidgetFormInputText(),
      'position_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PollPosition'), 'add_empty' => true)),
      'published'   => new sfWidgetFormInputCheckbox(),
      'frequency'   => new sfWidgetFormInputText(),
      'created_by'  => new sfWidgetFormInputText(),
      'updated_by'  => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'order_id'    => new sfValidatorInteger(array('required' => false)),
      'position_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PollPosition'), 'required' => false)),
      'published'   => new sfValidatorBoolean(array('required' => false)),
      'frequency'   => new sfValidatorInteger(array('required' => false)),
      'created_by'  => new sfValidatorInteger(array('required' => false)),
      'updated_by'  => new sfValidatorInteger(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('poll[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Poll';
  }

}

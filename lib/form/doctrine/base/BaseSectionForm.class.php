<?php

/**
 * Section form base class.
 *
 * @method Section getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSectionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'published'  => new sfWidgetFormInputCheckbox(),
      'access'     => new sfWidgetFormInputText(),
      'type_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SectionType'), 'add_empty' => false)),
      'order_id'   => new sfWidgetFormInputText(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'published'  => new sfValidatorBoolean(array('required' => false)),
      'access'     => new sfValidatorString(array('max_length' => 50)),
      'type_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SectionType'))),
      'order_id'   => new sfValidatorInteger(array('required' => false)),
      'created_by' => new sfValidatorInteger(),
      'updated_by' => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('section[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Section';
  }

}

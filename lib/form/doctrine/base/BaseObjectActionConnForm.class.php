<?php

/**
 * ObjectActionConn form base class.
 *
 * @method ObjectActionConn getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseObjectActionConnForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'action_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Action'), 'add_empty' => true)),
      'object_type_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ObjectType'), 'add_empty' => true)),
      'slug'            => new sfWidgetFormInputText(),
      'sentence_format' => new sfWidgetFormInputText(),
      'is_wall'         => new sfWidgetFormInputCheckbox(),
      'is_notification' => new sfWidgetFormInputCheckbox(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'action_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Action'), 'required' => false)),
      'object_type_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ObjectType'), 'required' => false)),
      'slug'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'sentence_format' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_wall'         => new sfValidatorBoolean(array('required' => false)),
      'is_notification' => new sfValidatorBoolean(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ObjectActionConn', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('object_action_conn[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObjectActionConn';
  }

}

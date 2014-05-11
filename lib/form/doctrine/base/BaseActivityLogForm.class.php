<?php

/**
 * ActivityLog form base class.
 *
 * @method ActivityLog getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActivityLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'object_action_conn_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ObjectActionConn'), 'add_empty' => true)),
      'object_type_id'        => new sfWidgetFormInputText(),
      'object_id'             => new sfWidgetFormInputText(),
      'sentence_html'         => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'object_action_conn_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ObjectActionConn'), 'required' => false)),
      'object_type_id'        => new sfValidatorInteger(array('required' => false)),
      'object_id'             => new sfValidatorInteger(array('required' => false)),
      'sentence_html'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('activity_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivityLog';
  }

}

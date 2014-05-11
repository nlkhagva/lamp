<?php

/**
 * ObjectType form base class.
 *
 * @method ObjectType getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseObjectTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInputText(),
      'slug'              => new sfWidgetFormInputText(),
      'object_model_name' => new sfWidgetFormInputText(),
      'object_table_name' => new sfWidgetFormInputText(),
      'body'              => new sfWidgetFormInputText(),
      'sentence_format'   => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'actions_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Action')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 200)),
      'slug'              => new sfValidatorString(array('max_length' => 50)),
      'object_model_name' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'object_table_name' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'body'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sentence_format'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'actions_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Action', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'ObjectType', 'column' => array('slug'))),
        new sfValidatorDoctrineUnique(array('model' => 'ObjectType', 'column' => array('object_model_name'))),
        new sfValidatorDoctrineUnique(array('model' => 'ObjectType', 'column' => array('object_table_name'))),
      ))
    );

    $this->widgetSchema->setNameFormat('object_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObjectType';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['actions_list']))
    {
      $this->setDefault('actions_list', $this->object->Actions->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveActionsList($con);

    parent::doSave($con);
  }

  public function saveActionsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['actions_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Actions->getPrimaryKeys();
    $values = $this->getValue('actions_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Actions', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Actions', array_values($link));
    }
  }

}

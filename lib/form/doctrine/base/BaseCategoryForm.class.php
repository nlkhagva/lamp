<?php

/**
 * Category form base class.
 *
 * @method Category getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'section_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Section'), 'add_empty' => false)),
      'published'     => new sfWidgetFormInputCheckbox(),
      'access'        => new sfWidgetFormInputText(),
      'order_id'      => new sfWidgetFormInputText(),
      'created_by'    => new sfWidgetFormInputText(),
      'updated_by'    => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'contents_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Content')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'section_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Section'))),
      'published'     => new sfValidatorBoolean(array('required' => false)),
      'access'        => new sfValidatorString(array('max_length' => 50)),
      'order_id'      => new sfValidatorInteger(array('required' => false)),
      'created_by'    => new sfValidatorInteger(),
      'updated_by'    => new sfValidatorInteger(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'contents_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Content', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['contents_list']))
    {
      $this->setDefault('contents_list', $this->object->Contents->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveContentsList($con);

    parent::doSave($con);
  }

  public function saveContentsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['contents_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Contents->getPrimaryKeys();
    $values = $this->getValue('contents_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Contents', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Contents', array_values($link));
    }
  }

}

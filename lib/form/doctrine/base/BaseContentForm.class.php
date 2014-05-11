<?php

/**
 * Content form base class.
 *
 * @method Content getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'is_feature'      => new sfWidgetFormInputCheckbox(),
      'published'       => new sfWidgetFormInputCheckbox(),
      'section_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Section'), 'add_empty' => false)),
      'album_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => true)),
      'image_name'      => new sfWidgetFormInputText(),
      'created_by'      => new sfWidgetFormInputText(),
      'updated_by'      => new sfWidgetFormInputText(),
      'rating'          => new sfWidgetFormInputText(),
      'hits'            => new sfWidgetFormInputText(),
      'access'          => new sfWidgetFormInputText(),
      'start_date'      => new sfWidgetFormDateTime(),
      'end_date'        => new sfWidgetFormDateTime(),
      'extra'           => new sfWidgetFormInputText(),
      'order_id'        => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Category')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_feature'      => new sfValidatorBoolean(array('required' => false)),
      'published'       => new sfValidatorBoolean(array('required' => false)),
      'section_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Section'))),
      'album_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'required' => false)),
      'image_name'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_by'      => new sfValidatorInteger(),
      'updated_by'      => new sfValidatorInteger(array('required' => false)),
      'rating'          => new sfValidatorInteger(array('required' => false)),
      'hits'            => new sfValidatorInteger(array('required' => false)),
      'access'          => new sfValidatorString(array('max_length' => 50)),
      'start_date'      => new sfValidatorDateTime(array('required' => false)),
      'end_date'        => new sfValidatorDateTime(array('required' => false)),
      'extra'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'order_id'        => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Category', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Content';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['categories_list']))
    {
      $this->setDefault('categories_list', $this->object->Categories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveCategoriesList($con);

    parent::doSave($con);
  }

  public function saveCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Categories->getPrimaryKeys();
    $values = $this->getValue('categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Categories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Categories', array_values($link));
    }
  }

}

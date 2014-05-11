<?php

/**
 * ShopOption form base class.
 *
 * @method ShopOption getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopOptionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'type'            => new sfWidgetFormChoice(array('choices' => array('selectbox' => 'selectbox', 'checkbox' => 'checkbox', 'textarea' => 'textarea', 'input' => 'input'))),
      'sort_order'      => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ShopCategory')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'            => new sfValidatorChoice(array('choices' => array(0 => 'selectbox', 1 => 'checkbox', 2 => 'textarea', 3 => 'input'), 'required' => false)),
      'sort_order'      => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ShopCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop_option[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopOption';
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

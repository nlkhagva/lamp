<?php

/**
 * ShopOptionValue form base class.
 *
 * @method ShopOptionValue getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopOptionValueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'option_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Option'), 'add_empty' => true)),
      'image_name'    => new sfWidgetFormInputText(),
      'sort_order'    => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'products_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ShopProduct')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'option_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Option'), 'required' => false)),
      'image_name'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sort_order'    => new sfValidatorInteger(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'products_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ShopProduct', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop_option_value[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopOptionValue';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['products_list']))
    {
      $this->setDefault('products_list', $this->object->Products->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveProductsList($con);

    parent::doSave($con);
  }

  public function saveProductsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['products_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Products->getPrimaryKeys();
    $values = $this->getValue('products_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Products', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Products', array_values($link));
    }
  }

}

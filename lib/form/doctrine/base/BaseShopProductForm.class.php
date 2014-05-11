<?php

/**
 * ShopProduct form base class.
 *
 * @method ShopProduct getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopProductForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'category_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'code'               => new sfWidgetFormInputText(),
      'cover_photo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CoverPhoto'), 'add_empty' => true)),
      'price'              => new sfWidgetFormInputText(),
      'price_type'         => new sfWidgetFormInputText(),
      'product_code'       => new sfWidgetFormInputText(),
      'stock_count'        => new sfWidgetFormInputText(),
      'total_add'          => new sfWidgetFormInputText(),
      'total_minus'        => new sfWidgetFormInputText(),
      'created_by'         => new sfWidgetFormInputText(),
      'is_active'          => new sfWidgetFormInputCheckbox(),
      'is_featured'        => new sfWidgetFormInputCheckbox(),
      'is_submit'          => new sfWidgetFormInputCheckbox(),
      'is_new'             => new sfWidgetFormInputCheckbox(),
      'related_content'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'add_empty' => true)),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'option_values_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ShopOptionValue')),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'code'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cover_photo_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CoverPhoto'), 'required' => false)),
      'price'              => new sfValidatorNumber(array('required' => false)),
      'price_type'         => new sfValidatorInteger(array('required' => false)),
      'product_code'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'stock_count'        => new sfValidatorInteger(array('required' => false)),
      'total_add'          => new sfValidatorInteger(array('required' => false)),
      'total_minus'        => new sfValidatorInteger(array('required' => false)),
      'created_by'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_active'          => new sfValidatorBoolean(array('required' => false)),
      'is_featured'        => new sfValidatorBoolean(array('required' => false)),
      'is_submit'          => new sfValidatorBoolean(array('required' => false)),
      'is_new'             => new sfValidatorBoolean(array('required' => false)),
      'related_content'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
      'option_values_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ShopOptionValue', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop_product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopProduct';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['option_values_list']))
    {
      $this->setDefault('option_values_list', $this->object->OptionValues->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveOptionValuesList($con);

    parent::doSave($con);
  }

  public function saveOptionValuesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['option_values_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->OptionValues->getPrimaryKeys();
    $values = $this->getValue('option_values_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('OptionValues', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('OptionValues', array_values($link));
    }
  }

}

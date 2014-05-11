<?php

/**
 * ShopObjectType form base class.
 *
 * @method ShopObjectType getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopObjectTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'object_model_name' => new sfWidgetFormInputText(),
      'object_table_name' => new sfWidgetFormInputText(),
      'name'              => new sfWidgetFormInputText(),
      'extra'             => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'object_model_name' => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'object_table_name' => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'extra'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_object_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopObjectType';
  }

}

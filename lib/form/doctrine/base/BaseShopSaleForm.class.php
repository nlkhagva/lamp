<?php

/**
 * ShopSale form base class.
 *
 * @method ShopSale getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopSaleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'type_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopObjectType'), 'add_empty' => true)),
      'object_id'  => new sfWidgetFormInputText(),
      'percent'    => new sfWidgetFormInputText(),
      'sale_value' => new sfWidgetFormInputText(),
      'kg_value'   => new sfWidgetFormInputText(),
      'start_date' => new sfWidgetFormDateTime(),
      'end_date'   => new sfWidgetFormDateTime(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopObjectType'), 'required' => false)),
      'object_id'  => new sfValidatorInteger(array('required' => false)),
      'percent'    => new sfValidatorNumber(array('required' => false)),
      'sale_value' => new sfValidatorNumber(array('required' => false)),
      'kg_value'   => new sfValidatorNumber(array('required' => false)),
      'start_date' => new sfValidatorDateTime(array('required' => false)),
      'end_date'   => new sfValidatorDateTime(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_sale[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopSale';
  }

}

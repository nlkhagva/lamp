<?php

/**
 * ShopOrderItem form base class.
 *
 * @method ShopOrderItem getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopOrderItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'order_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'add_empty' => true)),
      'quantity'    => new sfWidgetFormInputText(),
      'product_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopProduct'), 'add_empty' => true)),
      'unit_price'  => new sfWidgetFormInputText(),
      'total_price' => new sfWidgetFormInputText(),
      'sale_log'    => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'order_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'required' => false)),
      'quantity'    => new sfValidatorInteger(array('required' => false)),
      'product_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopProduct'), 'required' => false)),
      'unit_price'  => new sfValidatorNumber(array('required' => false)),
      'total_price' => new sfValidatorNumber(array('required' => false)),
      'sale_log'    => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_order_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopOrderItem';
  }

}

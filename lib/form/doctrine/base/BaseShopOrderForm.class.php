<?php

/**
 * ShopOrder form base class.
 *
 * @method ShopOrder getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopOrderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'invoice_number'        => new sfWidgetFormInputText(),
      'invoice_number_report' => new sfWidgetFormInputText(),
      'status_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrderStatus'), 'add_empty' => true)),
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'), 'add_empty' => true)),
      'shipping_fee'          => new sfWidgetFormInputText(),
      'remain_amount'         => new sfWidgetFormInputText(),
      'total_amount'          => new sfWidgetFormInputText(),
      'product_total_amount'  => new sfWidgetFormInputText(),
      'product_count'         => new sfWidgetFormInputText(),
      'ip_address'            => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'invoice_number'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'invoice_number_report' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'status_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrderStatus'), 'required' => false)),
      'user_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'), 'required' => false)),
      'shipping_fee'          => new sfValidatorNumber(array('required' => false)),
      'remain_amount'         => new sfValidatorNumber(array('required' => false)),
      'total_amount'          => new sfValidatorNumber(array('required' => false)),
      'product_total_amount'  => new sfValidatorNumber(array('required' => false)),
      'product_count'         => new sfValidatorInteger(array('required' => false)),
      'ip_address'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_order[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopOrder';
  }

}

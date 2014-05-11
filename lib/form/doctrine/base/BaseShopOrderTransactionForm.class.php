<?php

/**
 * ShopOrderTransaction form base class.
 *
 * @method ShopOrderTransaction getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopOrderTransactionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'order_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'add_empty' => true)),
      'status_id'   => new sfWidgetFormInputText(),
      'user_id'     => new sfWidgetFormInputText(),
      'code'        => new sfWidgetFormInputText(),
      'amount'      => new sfWidgetFormInputText(),
      'exchange'    => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'ip_address'  => new sfWidgetFormInputText(),
      'created_by'  => new sfWidgetFormInputText(),
      'updated_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UpdateCustomer'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'order_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'required' => false)),
      'status_id'   => new sfValidatorInteger(array('required' => false)),
      'user_id'     => new sfValidatorInteger(array('required' => false)),
      'code'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'amount'      => new sfValidatorNumber(array('required' => false)),
      'exchange'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ip_address'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'created_by'  => new sfValidatorInteger(array('required' => false)),
      'updated_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UpdateCustomer'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_order_transaction[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopOrderTransaction';
  }

}

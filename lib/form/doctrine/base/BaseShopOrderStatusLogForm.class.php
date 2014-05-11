<?php

/**
 * ShopOrderStatusLog form base class.
 *
 * @method ShopOrderStatusLog getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopOrderStatusLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'order_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'add_empty' => true)),
      'status_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrderStatus'), 'add_empty' => true)),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'), 'add_empty' => true)),
      'when_date'   => new sfWidgetFormDateTime(),
      'description' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'order_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'required' => false)),
      'status_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrderStatus'), 'required' => false)),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'), 'required' => false)),
      'when_date'   => new sfValidatorDateTime(array('required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_order_status_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopOrderStatusLog';
  }

}

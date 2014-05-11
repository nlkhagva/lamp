<?php

/**
 * ShopOrderMessage form base class.
 *
 * @method ShopOrderMessage getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopOrderMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'order_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'add_empty' => true)),
      'send_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sender'), 'add_empty' => true)),
      'message'      => new sfWidgetFormInputText(),
      'is_block'     => new sfWidgetFormInputCheckbox(),
      'is_read'      => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'order_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'required' => false)),
      'send_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Sender'), 'required' => false)),
      'message'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_block'     => new sfValidatorBoolean(array('required' => false)),
      'is_read'      => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_order_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopOrderMessage';
  }

}

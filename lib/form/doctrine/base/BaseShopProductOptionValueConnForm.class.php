<?php

/**
 * ShopProductOptionValueConn form base class.
 *
 * @method ShopProductOptionValueConn getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopProductOptionValueConnForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'product_id' => new sfWidgetFormInputHidden(),
      'option_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Option'), 'add_empty' => true)),
      'value_id'   => new sfWidgetFormInputHidden(),
      'quantity'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'product_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('product_id')), 'empty_value' => $this->getObject()->get('product_id'), 'required' => false)),
      'option_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Option'), 'required' => false)),
      'value_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('value_id')), 'empty_value' => $this->getObject()->get('value_id'), 'required' => false)),
      'quantity'   => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_product_option_value_conn[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopProductOptionValueConn';
  }

}

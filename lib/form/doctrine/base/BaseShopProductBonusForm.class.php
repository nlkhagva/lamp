<?php

/**
 * ShopProductBonus form base class.
 *
 * @method ShopProductBonus getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopProductBonusForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'product_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopProduct'), 'add_empty' => true)),
      'min_interval' => new sfWidgetFormInputText(),
      'percent'      => new sfWidgetFormInputText(),
      'sale_value'   => new sfWidgetFormInputText(),
      'kg_value'     => new sfWidgetFormInputText(),
      'start_date'   => new sfWidgetFormDateTime(),
      'end_date'     => new sfWidgetFormDateTime(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'product_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopProduct'), 'required' => false)),
      'min_interval' => new sfValidatorNumber(array('required' => false)),
      'percent'      => new sfValidatorNumber(array('required' => false)),
      'sale_value'   => new sfValidatorNumber(array('required' => false)),
      'kg_value'     => new sfValidatorNumber(array('required' => false)),
      'start_date'   => new sfValidatorDateTime(array('required' => false)),
      'end_date'     => new sfValidatorDateTime(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_product_bonus[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopProductBonus';
  }

}

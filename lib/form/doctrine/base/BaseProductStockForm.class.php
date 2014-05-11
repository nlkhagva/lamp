<?php

/**
 * ProductStock form base class.
 *
 * @method ProductStock getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProductStockForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'product_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopProduct'), 'add_empty' => false)),
      'value'       => new sfWidgetFormInputText(),
      'date_when'   => new sfWidgetFormDateTime(),
      'is_add'      => new sfWidgetFormInputCheckbox(),
      'description' => new sfWidgetFormInputText(),
      'order_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'add_empty' => true)),
      'created_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedUser'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'product_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopProduct'))),
      'value'       => new sfValidatorInteger(array('required' => false)),
      'date_when'   => new sfValidatorDateTime(array('required' => false)),
      'is_add'      => new sfValidatorBoolean(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'order_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopOrder'), 'required' => false)),
      'created_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedUser'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('product_stock[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductStock';
  }

}

<?php

/**
 * ProductToProduct form base class.
 *
 * @method ProductToProduct getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProductToProductForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'product_id'          => new sfWidgetFormInputText(),
      'relation_product_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProductRelation'), 'add_empty' => true)),
      'sort_order'          => new sfWidgetFormInputText(),
      'type_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProdContType'), 'add_empty' => true)),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'product_id'          => new sfValidatorInteger(array('required' => false)),
      'relation_product_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProductRelation'), 'required' => false)),
      'sort_order'          => new sfValidatorInteger(array('required' => false)),
      'type_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProdContType'), 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('product_to_product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductToProduct';
  }

}

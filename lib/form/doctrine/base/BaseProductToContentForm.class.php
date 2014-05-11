<?php

/**
 * ProductToContent form base class.
 *
 * @method ProductToContent getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProductToContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'product_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopProduct'), 'add_empty' => true)),
      'content_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'add_empty' => true)),
      'type_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProdContType'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'product_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopProduct'), 'required' => false)),
      'content_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'required' => false)),
      'type_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProdContType'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('product_to_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductToContent';
  }

}

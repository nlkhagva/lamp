<?php

/**
 * ShopProductTranslation filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShopProductTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'intro_text' => new sfWidgetFormFilterInput(),
      'content'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'      => new sfValidatorPass(array('required' => false)),
      'intro_text' => new sfValidatorPass(array('required' => false)),
      'content'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop_product_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopProductTranslation';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'title'      => 'Text',
      'intro_text' => 'Text',
      'content'    => 'Text',
      'lang'       => 'Text',
    );
  }
}

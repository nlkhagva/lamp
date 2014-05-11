<?php

/**
 * WebsiteConfigTranslation form base class.
 *
 * @method WebsiteConfigTranslation getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWebsiteConfigTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'company_name'   => new sfWidgetFormInputText(),
      'company_slogan' => new sfWidgetFormInputText(),
      'address'        => new sfWidgetFormTextarea(),
      'lang'           => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'company_name'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'company_slogan' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'        => new sfValidatorString(array('required' => false)),
      'lang'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('website_config_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebsiteConfigTranslation';
  }

}

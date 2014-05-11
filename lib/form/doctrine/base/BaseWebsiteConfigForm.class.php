<?php

/**
 * WebsiteConfig form base class.
 *
 * @method WebsiteConfig getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWebsiteConfigForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'logo'          => new sfWidgetFormInputText(),
      'phone'         => new sfWidgetFormInputText(),
      'fax'           => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'google_map'    => new sfWidgetFormTextarea(),
      'domain'        => new sfWidgetFormInputText(),
      'facebook_page' => new sfWidgetFormInputText(),
      'twitter'       => new sfWidgetFormInputText(),
      'google_plus'   => new sfWidgetFormInputText(),
      'linkedin'      => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'logo'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fax'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'google_map'    => new sfValidatorString(array('required' => false)),
      'domain'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'facebook_page' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'twitter'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'google_plus'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'linkedin'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('website_config[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebsiteConfig';
  }

}

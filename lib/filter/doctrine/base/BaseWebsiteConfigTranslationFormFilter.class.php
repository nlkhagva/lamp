<?php

/**
 * WebsiteConfigTranslation filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWebsiteConfigTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'company_name'   => new sfWidgetFormFilterInput(),
      'company_slogan' => new sfWidgetFormFilterInput(),
      'address'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'company_name'   => new sfValidatorPass(array('required' => false)),
      'company_slogan' => new sfValidatorPass(array('required' => false)),
      'address'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('website_config_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebsiteConfigTranslation';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'company_name'   => 'Text',
      'company_slogan' => 'Text',
      'address'        => 'Text',
      'lang'           => 'Text',
    );
  }
}

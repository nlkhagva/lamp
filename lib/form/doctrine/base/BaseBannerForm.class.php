<?php

/**
 * Banner form base class.
 *
 * @method Banner getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBannerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'file_name'   => new sfWidgetFormInputText(),
      'link'        => new sfWidgetFormInputText(),
      'partner'     => new sfWidgetFormInputText(),
      'position_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BannerPosition'), 'add_empty' => false)),
      'order_id'    => new sfWidgetFormInputText(),
      'published'   => new sfWidgetFormInputCheckbox(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 100)),
      'file_name'   => new sfValidatorString(array('max_length' => 255)),
      'link'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'partner'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'position_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BannerPosition'))),
      'order_id'    => new sfValidatorInteger(),
      'published'   => new sfValidatorBoolean(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('banner[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banner';
  }

}

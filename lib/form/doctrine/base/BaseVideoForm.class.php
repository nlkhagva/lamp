<?php

/**
 * Video form base class.
 *
 * @method Video getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVideoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'section_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Section'), 'add_empty' => false)),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'image'       => new sfWidgetFormInputText(),
      'file_name'   => new sfWidgetFormInputText(),
      'is_embed'    => new sfWidgetFormInputCheckbox(),
      'embed_src'   => new sfWidgetFormTextarea(),
      'order_id'    => new sfWidgetFormInputText(),
      'published'   => new sfWidgetFormInputCheckbox(),
      'created_by'  => new sfWidgetFormInputText(),
      'updated_by'  => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'section_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Section'))),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'image'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'file_name'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_embed'    => new sfValidatorBoolean(array('required' => false)),
      'embed_src'   => new sfValidatorString(array('required' => false)),
      'order_id'    => new sfValidatorInteger(),
      'published'   => new sfValidatorBoolean(array('required' => false)),
      'created_by'  => new sfValidatorInteger(array('required' => false)),
      'updated_by'  => new sfValidatorInteger(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('video[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Video';
  }

}

<?php

/**
 * CategoryContent form base class.
 *
 * @method CategoryContent getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoryContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'content_id'  => new sfWidgetFormInputHidden(),
      'category_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'content_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('content_id')), 'empty_value' => $this->getObject()->get('content_id'), 'required' => false)),
      'category_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('category_id')), 'empty_value' => $this->getObject()->get('category_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CategoryContent';
  }

}

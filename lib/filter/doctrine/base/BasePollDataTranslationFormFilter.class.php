<?php

/**
 * PollDataTranslation filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePollDataTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'answer' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'answer' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('poll_data_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PollDataTranslation';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'answer' => 'Text',
      'lang'   => 'Text',
    );
  }
}

<?php

/**
 * Banner filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBannerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'file_name'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'link'        => new sfWidgetFormFilterInput(),
      'partner'     => new sfWidgetFormFilterInput(),
      'position_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BannerPosition'), 'add_empty' => true)),
      'order_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'published'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'file_name'   => new sfValidatorPass(array('required' => false)),
      'link'        => new sfValidatorPass(array('required' => false)),
      'partner'     => new sfValidatorPass(array('required' => false)),
      'position_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BannerPosition'), 'column' => 'id')),
      'order_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'published'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('banner_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banner';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'file_name'   => 'Text',
      'link'        => 'Text',
      'partner'     => 'Text',
      'position_id' => 'ForeignKey',
      'order_id'    => 'Number',
      'published'   => 'Boolean',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}

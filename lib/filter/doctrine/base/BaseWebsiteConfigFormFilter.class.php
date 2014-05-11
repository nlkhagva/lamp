<?php

/**
 * WebsiteConfig filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWebsiteConfigFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'logo'          => new sfWidgetFormFilterInput(),
      'phone'         => new sfWidgetFormFilterInput(),
      'fax'           => new sfWidgetFormFilterInput(),
      'email'         => new sfWidgetFormFilterInput(),
      'google_map'    => new sfWidgetFormFilterInput(),
      'domain'        => new sfWidgetFormFilterInput(),
      'facebook_page' => new sfWidgetFormFilterInput(),
      'twitter'       => new sfWidgetFormFilterInput(),
      'google_plus'   => new sfWidgetFormFilterInput(),
      'linkedin'      => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'logo'          => new sfValidatorPass(array('required' => false)),
      'phone'         => new sfValidatorPass(array('required' => false)),
      'fax'           => new sfValidatorPass(array('required' => false)),
      'email'         => new sfValidatorPass(array('required' => false)),
      'google_map'    => new sfValidatorPass(array('required' => false)),
      'domain'        => new sfValidatorPass(array('required' => false)),
      'facebook_page' => new sfValidatorPass(array('required' => false)),
      'twitter'       => new sfValidatorPass(array('required' => false)),
      'google_plus'   => new sfValidatorPass(array('required' => false)),
      'linkedin'      => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('website_config_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebsiteConfig';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'logo'          => 'Text',
      'phone'         => 'Text',
      'fax'           => 'Text',
      'email'         => 'Text',
      'google_map'    => 'Text',
      'domain'        => 'Text',
      'facebook_page' => 'Text',
      'twitter'       => 'Text',
      'google_plus'   => 'Text',
      'linkedin'      => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}

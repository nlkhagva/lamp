<?php

/**
 * sfGuardUser form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
      $this->useFields(array('last_name', 'first_name', 'email_address', 'phone', 'phone2', 'address'));

      $this->widgetSchema['address'] = new sfWidgetFormTextarea();

      $this->widgetSchema['last_name']->setLabel('Овог*');
      $this->widgetSchema['first_name']->setLabel('Нэр*');
      $this->widgetSchema['email_address']->setLabel('Мэйл*');
      $this->widgetSchema['phone']->setLabel('Утас*');
      $this->widgetSchema['phone2']->setLabel('Утас 2*');
      $this->widgetSchema['address']->setLabel('Хаяг*');

      $this->validatorSchema['last_name']->setOption('required', true);
      $this->validatorSchema['first_name']->setOption('required', true);
      $this->validatorSchema['phone']->setOption('required', true);
      $this->validatorSchema['phone2']->setOption('required', true);
      $this->validatorSchema['address']->setOption('required', true);
  }
}

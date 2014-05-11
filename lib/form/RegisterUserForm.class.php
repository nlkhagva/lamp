<?php

/**
 * sfGuardUser form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RegisterUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
        $this->setWidgets(array(
            'last_name'         => new sfWidgetFormInputText(array('label' => 'Овог')),
            'first_name'        => new sfWidgetFormInputText(array('label' => 'Нэр')),
            'email_address'     => new sfWidgetFormInputText(array('label' => 'И-мэйл *')),
            'password'          => new sfWidgetFormInputPassword(array('label' => 'Нууц үг *')),
            'password_again'    => new sfWidgetFormInputPassword(array('label' => 'Нууц үгээ давтана уу! *')),
            'phone'             => new sfWidgetFormInputText(array('label' => 'Утас')),
            'phone2'            => new sfWidgetFormInputText(array('label' => 'Утас 2'))
        ));
        
        $this->setValidators(array(
            'last_name'         => new sfValidatorString(array('min_length' => 2, 'required' => false)),
            'first_name'        => new sfValidatorString(array('min_length' => 2, 'required' => false)),
            'email_address'     => new sfValidatorEmail(array('required' => true), array('invalid'=>'Мэйл хаяг буруу байна.', 'required'=>'Мэйл хаягаа заавал оруулна уу')),
            'password'      	=> new sfValidatorString(array('min_length' => 2, 'required' => true), array('required'=>'Нууц үгээ заавал оруулна уу')),
            'password_again'	=> new sfValidatorPass(),
            'phone'          	=> new sfValidatorString(array('min_length' => 6), array('required'=>'Та заавал утсаа оруулна уу')),
            'phone2'        	=> new sfValidatorString(array('min_length' => 6, 'required' => false))
        ));
        
        $this->validatorSchema->setPostValidator(
            new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL , 'password_again',array(), array('invalid' => 'Нууц үгүүд ижилхэн байх ёстой!'))
        );

        $this->widgetSchema->setNameFormat('register[%s]');
  }
}

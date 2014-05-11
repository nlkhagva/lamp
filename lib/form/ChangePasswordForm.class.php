<?php 
class ChangePasswordForm extends BaseForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'password'              => new sfWidgetFormInputPassword(array('label' => 'Хуучин нууц үг')),
            'password_new'          => new sfWidgetFormInputPassword(array('label' => 'Шинэ нууц үг')),
            'password_new_again'    => new sfWidgetFormInputPassword(array('label' => 'Шинэ нууц үгээ давтана уу!')),
        ));
        
        $this->setValidators(array(
            'password'      	    => new sfValidatorString(array('min_length' => 2, 'required' => true)),
            'password_new'      	=> new sfValidatorString(array('min_length' => 2, 'required' => true)),
            'password_new_again'	=> new sfValidatorPass(),
        ));
        
        $this->validatorSchema->setPostValidator(
            new sfValidatorSchemaCompare('password_new', sfValidatorSchemaCompare::EQUAL , 'password_new_again',array(), array('invalid' => 'Нууц үгүүд ижилхэн байх ёстой!'))
        );

        $this->widgetSchema->setNameFormat('change_password[%s]');
    }
}
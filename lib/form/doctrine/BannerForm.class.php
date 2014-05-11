<?php

/**
 * Banner form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BannerForm extends BaseBannerForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);
      
	  $this->widgetSchema['file_name'] = new sfWidgetFormInputFileEditable(array(
          'label'       => 'Файлын нэр',
          'file_src'    => '/uploads/banner/'.$this->getObject()->getFileName(),
          'edit_mode'   => !$this->isNew(),
          'template'    => '<div class="file_editable"> <img src="/uploads/banner/'.$this->getObject()->getFileName().'" /> <br class="clear"/>%input%  %delete%  %delete_label% <br class="clear"/><div class="file_editable_file"> <a class="media-plugin" href="%file%"></a></div></div>',
      ));	  
      $this->widgetSchema['position_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BannerPosition')));
		
      
      $this->validatorSchema['file_name'] = new sfValidatorFile(array(
          'required'    => false,
          'path'		=> sfConfig::get('sf_upload_dir').'/banner/'
      ));
      
      $this->validatorSchema['file_name_delete'] = new sfValidatorBoolean();
      $this->validatorSchema['link'] = new sfValidatorUrl(array('required' => false));
      
      $this->widgetSchema->setLabel('link', 'Линк');
  }
}

<?php

/**
 * WebsiteConfig form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class WebsiteConfigForm extends BaseWebsiteConfigForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);
      
      $this->embedI18n(array('mn', 'en'));

      $this->widgetSchema->setLabel('mn', 'Монгол');
        $this->widgetSchema['mn']->setLabel('company_name', 'Компаний нэр');
        $this->widgetSchema['mn']->setLabel('company_slogan', 'Компаний уриа');
        $this->widgetSchema['mn']->setLabel('address', 'Хаяг');
        
      $this->widgetSchema->setLabel('en', 'English');
      
      $this->widgetSchema['logo'] = new sfWidgetFormInputFileEditable(array(
            'label'             => 'Зураг',
            'file_src'          => '/uploads/config/'.$this->getObject()->getLogo(),
            'is_image'          => true,
            'edit_mode'         => !$this->isNew(),
            'template'          => '<div>%file%<br/> %input%<br/>%delete% %delete_label%</div>',
      ));

      $this->validatorSchema['logo']  = new sfValidatorFile(array(
                                'required' => false, 
                                'mime_types' => 'web_images', 
                                'max_size' => 1000000, 
                                'path' => sfConfig::get('sf_upload_dir').'/config/',
                                'validated_file_class' => 'ThumbnailValidatedFile',
                            )
                            , array(
                                'mime_types' => 'Та .jpg, .gif, .png зургууд сонгоно уу', 'max_size' => 'Зургийн файлын хэмжээ 1MB-аас хэтрэхгүй байх ёстой '
                             ));
      $this->validatorSchema['image_name_delete'] = new sfValidatorPass();
  }
}

class ThumbnailValidatedFile extends sfValidatedFile 
{

    private $savedFilename;

    // Override sfValidatedFile's save method
      public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777)                 
      {

        $this->savedFilename = $this->generateFilename();
        // This makes sure we use only one savedFilename (it will be the first)
        if ($this->savedFilename === null ) 
        {
            $this->savedFilename = $file;
        }

        $thumbnail = new sfThumbnail(50,50);
        $thumbnail->loadFile($this->getTempName());
        $thumbnail->save(sfConfig::get('sf_upload_dir').'/config/50/'.$this->savedFilename);
        // Let the original save method do its magic :)
        $thumbnail = new sfThumbnail(150, 150);
        $thumbnail->loadFile($this->getTempName());
        $thumbnail->save(sfConfig::get('sf_upload_dir').'/config/150/'.$this->savedFilename);

        $thumbnail = new sfThumbnail(300, 300);
        $thumbnail->loadFile($this->getTempName());
        $thumbnail->save(sfConfig::get('sf_upload_dir').'/config/300/'.$this->savedFilename);
        // Let the original save method do its magic :)

        return parent::save($this->savedFilename, $fileMode, $create, $dirMode);
      }
}

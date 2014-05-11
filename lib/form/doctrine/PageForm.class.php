<?php

/**
 * Page form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PageForm extends BasePageForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);
      
      $this->embedi18n(array('mn', 'en'));
      
      $this->widgetSchema['category_id'] = new sfWidgetFormDoctrineChoice(array(
                'model'        => $this->getRelatedModelName('Category'),
                'table_method' => 'getPageCategories',
      ));
      
      
        $this->widgetSchema['image_name'] = new sfWidgetFormInputFileEditable(array(
                    'label' => 'Зураг',
                    'file_src' => '/uploads/page/' . $this->getObject()->getImageName(),
                    'is_image' => true,
                    'edit_mode' => !$this->isNew(),
                    'template' => '<div>%file%<br/> %input%<br/>%delete% %delete_label%</div>',
                ));


        $this->validatorSchema['image_name'] = new sfValidatorFile(array(
                    'required' => false,
                    'mime_types' => 'web_images',
                    'max_size' => 2000000,
                    'path' => sfConfig::get('sf_upload_dir') . '/page/',
                    'validated_file_class' => 'PageThumbnailValidatedFile',
                        )
                        , array(
                    'mime_types' => 'Та .jpg, .gif, .png зургууд сонгоно уу', 'max_size' => 'Зургийн файлын хэмжээ 1MB-аас хэтрэхгүй байх ёстой '
                ));
        $this->validatorSchema['image_name_delete'] = new sfValidatorPass();
  }
}

class PageThumbnailValidatedFile extends sfValidatedFile {

    private $savedFilename;

    // Override sfValidatedFile's save method
    public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777) {

        $this->savedFilename = $this->generateFilename();
        // This makes sure we use only one savedFilename (it will be the first)
        if ($this->savedFilename === null) {
            $this->savedFilename = $file;
        }

        foreach (sfConfig::get('app_content_photo_sizes') as $size) {
            $upload_directory = sfConfig::get('sf_upload_dir') . '/page/' . $size;

            if (!is_dir($upload_directory)) {
                mkdir($upload_directory, 0777);
            }

            $thumbnail = new sfThumbnail($size);
            $thumbnail->loadFile($this->getTempName());
            $thumbnail->save($upload_directory .'/'. $this->savedFilename);
            // Let the original save method do its magic :)
        }

        return parent::save($this->savedFilename, $fileMode, $create, $dirMode);
    }

}

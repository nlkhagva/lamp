<?php

/**
 * Content form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContentForm extends BaseContentForm {

    public function configure() {
        unset($this['created_by'], $this['updated_by'], $this['updated_at'], $this['hits'], $this['access']);
        //  $this->widgetSchema['category_id']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');

        $this->widgetSchema['section_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Section'),
                    'table_method' => 'getContentSection',
                ));

        $this->widgetSchema['created_at'] = new sfWidgetFormDateTime(array('default' => time(), 'label' => 'Огноо'));


        $this->embedi18n(array('mn', 'en'));
        $this->widgetSchema->setLabel('mn', 'Монгол');
        $this->widgetSchema['mn']->setLabel('title', 'Гарчиг');
        $this->widgetSchema['mn']->setLabel('intro_text', 'Товч текст/орц');
        $this->widgetSchema['mn']->setLabel('full_text', 'Бүрэн текст/заавар');
        $this->widgetSchema['mn']->setLabel('description', 'Тайлбар/илчлэг');
        $this->widgetSchema->setLabel('en', 'English');
        $this->widgetSchema['en']->setLabel('intro_text', 'Intro text');
        $this->widgetSchema['en']->setLabel('full_text', 'Full text');

        $this->widgetSchema['categories_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['image_name'] = new sfWidgetFormInputFileEditable(array(
                    'label' => 'Зураг',
                    'file_src' => '/uploads/news/' . $this->getObject()->getImageName(),
                    'is_image' => true,
                    'edit_mode' => !$this->isNew(),
                    'template' => '<div>%file%<br/> %input%<br/>%delete% %delete_label%</div>',
                ));


        $this->widgetSchema['created_at'] = new sfWidgetFormDateTime(array('default'=>time()), array('class' => 'span2'));

        $this->validatorSchema['image_name'] = new sfValidatorFile(array(
                    'required' => false,
                    'mime_types' => 'web_images',
                    'max_size' => 2000000,
                    'path' => sfConfig::get('sf_upload_dir') . '/news/',
                    'validated_file_class' => 'ThumbnailValidatedFile',
                        )
                        , array(
                    'mime_types' => 'Та .jpg, .gif, .png зургууд сонгоно уу', 'max_size' => 'Зургийн файлын хэмжээ 1MB-аас хэтрэхгүй байх ёстой '
                ));
        $this->validatorSchema['image_name_delete'] = new sfValidatorPass();
    }

}

class ThumbnailValidatedFile extends sfValidatedFile {

    private $savedFilename;

    // Override sfValidatedFile's save method
    public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777) {

        $this->savedFilename = $this->generateFilename();
        // This makes sure we use only one savedFilename (it will be the first)
        if ($this->savedFilename === null) {
            $this->savedFilename = $file;
        }

        foreach (sfConfig::get('app_content_photo_sizes') as $size) {
            $upload_directory = sfConfig::get('sf_upload_dir') . '/news/' . $size;

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

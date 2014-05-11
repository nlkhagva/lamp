<?php

/**
 * Video form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VideoForm extends BaseVideoForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at'],$this['created_by'], $this['updated_by'], $this['order_id']);

      $this->embedI18n(array('mn','en'));
      $this->widgetSchema->setLabel('mn', 'Монгол');
          $this->widgetSchema['mn']->setLabel('title', 'Гарчиг');
          $this->widgetSchema['mn']->setLabel('description', 'Тайлбар (нэмэлт)');
      $this->widgetSchema->setLabel('en', 'English');
      
      $this->widgetSchema['section_id'] = new sfWidgetFormDoctrineChoice(array(
                'model'        => $this->getRelatedModelName('Section'),
                'table_method' => 'getVideoSection',
      ));

      /* Зураг тохиргоо */
      $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
          'label'       => 'Зураг',
          'file_src'    => '/uploads/video/image/'.$this->getObject()->getImage(),
          'is_image'    => true,
          'edit_mode'   => !$this->isNew(),
          'template'    => '<div>%file%<br class="clear"/> %input% <br class="clear"/> %delete% %delete_label%</div>',
      ));

      $this->validatorSchema['image'] = new sfValidatorFile(array(
          'required'    => false,
          'path'        => sfConfig::get('sf_upload_dir').'/video/image/',
          'mime_types'  => 'web_images',
      ));
      $this->validatorSchema['image_delete'] = new sfValidatorPass();
  }
}

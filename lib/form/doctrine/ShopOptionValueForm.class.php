<?php

/**
 * ShopOptionValue form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShopOptionValueForm extends BaseShopOptionValueForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);

      $this->embedI18n(array('mn', 'en'));

      $this->widgetSchema['image_name'] = new sfWidgetFormInputFileEditable(array(
          'label'       => 'Зураг',
          'file_src'    => '/uploads/shop/optionvalue/'.$this->getObject()->getImageName(),
          'is_image'    => true,
          'edit_mode'   => !$this->isNew(),
          'template'    => '<div>%file%<br class="clear"/> %input% <br class="clear"/> %delete% %delete_label%',
      ));

      $this->validatorSchema['image_name'] = new sfValidatorFile(array(
          'required'    => false,
          'path'        => sfConfig::get('sf_upload_dir').'/shop/optionvalue/',
          'mime_types'  => 'web_images',
      ));
      $this->validatorSchema['image_name_delete'] = new sfValidatorPass();
  }
}

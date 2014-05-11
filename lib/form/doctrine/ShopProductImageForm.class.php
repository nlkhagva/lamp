<?php

/**
 * ShopProductImage form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShopProductImageForm extends BaseShopProductImageForm
{
  public function configure()
  {
      unset($this['product_id'], $this['created_at'], $this['updated_at']);
      $this->widgetSchema['img_src'] = new sfWidgetFormInputSWFUpload();
      
      $this->validatorSchema['img_src'] = new sfValidatorFile(array(
          'required'    => false,
          'path'        => sfConfig::get('sf_upload_dir').'/products/',
          'mime_types'  => 'web_images',
      ));
  }
}

<?php

/**
 * Gallery form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GalleryForm extends PluginGalleryForm
{
  public function configure()
  {
      $this->widgetSchema['section_id'] = new sfWidgetFormDoctrineChoice(array(
                'model'        => $this->getRelatedModelName('Section'),
                'table_method' => 'getImageSection',
      ));
      
//      $this->embedi18n(array('mn', 'en'));
  }
}

<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
      $this->enablePlugins('sfDoctrinePlugin');
      $this->enablePlugins('bootstrapAdminThemePlugin');
      $this->enablePlugins('sfDoctrineGuardPlugin');
	  
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfCKEditorPlugin');
    $this->enablePlugins('sfMultipleAjaxUploadGalleryPlugin');
    $this->enablePlugins('sfThumbnailPlugin');
    $this->enablePlugins('sfWidgetFormInputSWFUploadPlugin');
    $this->enablePlugins('sfCaptchaGDPlugin');
	  
  }
}

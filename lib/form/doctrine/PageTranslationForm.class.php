<?php

/**
 * PageTranslation form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PageTranslationForm extends BasePageTranslationForm
{
  public function configure()
  {
      $this->widgetSchema->setLabel('title', "Гарчиг");
      $this->widgetSchema->setLabel('body', "Текст");
      $this->widgetSchema['body'] = new sfWidgetFormCKEditor();

  }
}

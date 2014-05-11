<?php

/**
 * ShopProductTranslation form.
 *
 * @package    CMS
 * @subpackage form
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShopProductTranslationForm extends BaseShopProductTranslationForm
{
  public function configure()
  {
//      unset($this['intro_text']);
    $this->widgetSchema['content'] = new sfWidgetFormCKEditor(array('jsoptions'=>array('toolbar' => 'Min', 'width' => '700')));
    $this->widgetSchema['intro_text'] = new sfWidgetFormCKEditor(array('jsoptions'=>array('toolbar' => 'Min', 'width' => '700')));
    $this->widgetSchema->setLabel('intro_text', 'Хүснэгт');
    $this->widgetSchema->setLabel('content', 'Тайлбар');
  }
}

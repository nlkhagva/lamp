<?php

/**
 * ShopOrderMessage form.
 *
 * @package    CMS
 * @subpackage form
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShopOrderMessageForm extends BaseShopOrderMessageForm
{
  public function configure()
  {
      $this->useFields(array('message'));
      $this->widgetSchema['message'] = new sfWidgetFormTextarea();
  }
}

<?php

/**
 * ShopOrderStatus form.
 *
 * @package    CMS
 * @subpackage form
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShopOrderStatusForm extends BaseShopOrderStatusForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);

      $this->embedI18n(array('mn', 'en'));
  }
}

<?php

/**
 * ShopOrder form.
 *
 * @package    CMS
 * @subpackage form
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShopOrderForm extends BaseShopOrderForm
{
  public function configure()
  {
      unset(
        $this['invoice_number'], $this['remain_amount'],
        $this['total_amount'], $this['product_total_amount'], $this['product_count'],
        $this['created_at'], $this['updated_at'], $this['ip_address'], $this['user_id'],$this['invoice_number_report']
      );

      $this->widgetSchema['status_id']->setLabel('Төлөв');
      $this->widgetSchema['shipping_fee']->setLabel('Хүргэлтийн хөлс');
  }
}

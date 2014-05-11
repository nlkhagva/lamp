<?php

/**
 * ProductStock form.
 *
 * @package    CMS
 * @subpackage form
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductStockForm extends BaseProductStockForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at'], $this['date_when'], $this['created_by'], $this['description'], $this['order_id'], $this['is_add']);
      
      $this->widgetSchema['value']->setLabel('Нэгж');
      $this->widgetSchema['product_id']->setLabel('Бараа бүтээгдэхүүн');
//      $this->widgetSchema['is_add']->setLabel('Нэмэгдэл');
  }
}

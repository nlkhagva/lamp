<?php

/**
 * ShopProduct form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShopProductForm extends BaseShopProductForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at'], $this['cover_photo_id'], $this['created_by']);
      
      $this->widgetSchema['price_type'] = new sfWidgetFormChoice(array('choices' => ShopProductTable::getPriceTypes()));
//      $this->widgetSchema['content'] = new sfWidgetFormCKEditor();
      $this->widgetSchema['category_id'] = new sfWidgetFormInputHidden();
      
      $this->embedI18n(array('mn', 'en'));
      $this->widgetSchema['category_id']->setLabel('Ангилал');
      $this->widgetSchema['price']->setLabel('Үнэ');
      $this->widgetSchema['price_type']->setLabel('Үнэ төрөл');
      $this->widgetSchema['code']->setLabel('Код');
      $this->widgetSchema['is_active']->setLabel('Идэвхтэй');
      $this->widgetSchema['is_featured']->setLabel('Онцлох');
  }
}

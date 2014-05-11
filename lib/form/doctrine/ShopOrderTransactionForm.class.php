<?php

/**
 * ShopOrderTransaction form.
 *
 * @package    CMS
 * @subpackage form
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShopOrderTransactionForm extends BaseShopOrderTransactionForm
{
  public function configure()
  {
      $this->useFields(array('amount', 'description'));
      $this->widgetSchema['amount']->setLabel('Дүн');
      $this->widgetSchema['description']->setLabel('Тайлбар');

      $this->validatorSchema['amount']->setOption('required', true);
  }
}

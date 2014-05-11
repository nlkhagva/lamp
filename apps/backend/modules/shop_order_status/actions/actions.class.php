<?php

require_once dirname(__FILE__).'/../lib/shop_order_statusGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/shop_order_statusGeneratorHelper.class.php';

/**
 * shop_order_status actions.
 *
 * @package    CMS
 * @subpackage shop_order_status
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class shop_order_statusActions extends autoShop_order_statusActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'order');
        parent::preExecute();
    }
}

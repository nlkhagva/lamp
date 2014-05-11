<?php

require_once dirname(__FILE__).'/../lib/shop_option_valueGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/shop_option_valueGeneratorHelper.class.php';

/**
 * shop_option_value actions.
 *
 * @package    sf_sandbox
 * @subpackage shop_option_value
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class shop_option_valueActions extends autoShop_option_valueActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'product');
        parent::preExecute();
    }
}

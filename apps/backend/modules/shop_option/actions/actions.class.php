<?php

require_once dirname(__FILE__).'/../lib/shop_optionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/shop_optionGeneratorHelper.class.php';

/**
 * shop_option actions.
 *
 * @package    sf_sandbox
 * @subpackage shop_option
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class shop_optionActions extends autoShop_optionActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'product');
        parent::preExecute();
    }
}

<?php

require_once dirname(__FILE__).'/../lib/shop_categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/shop_categoryGeneratorHelper.class.php';

/**
 * shop_category actions.
 *
 * @package    sf_sandbox
 * @subpackage shop_category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class shop_categoryActions extends autoShop_categoryActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'product');
        parent::preExecute();
    }
    
}

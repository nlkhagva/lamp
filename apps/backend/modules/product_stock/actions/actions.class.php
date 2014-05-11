<?php

require_once dirname(__FILE__).'/../lib/product_stockGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/product_stockGeneratorHelper.class.php';

/**
 * product_stock actions.
 *
 * @package    CMS
 * @subpackage product_stock
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class product_stockActions extends autoProduct_stockActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'product');
        parent::preExecute();
    }
    
}

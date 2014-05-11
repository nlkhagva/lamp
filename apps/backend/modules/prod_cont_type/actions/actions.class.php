<?php

require_once dirname(__FILE__).'/../lib/prod_cont_typeGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prod_cont_typeGeneratorHelper.class.php';

/**
 * prod_cont_type actions.
 *
 * @package    CMS
 * @subpackage prod_cont_type
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class prod_cont_typeActions extends autoProd_cont_typeActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'content');
        parent::preExecute();
    }
    
}

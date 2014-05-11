<?php

require_once dirname(__FILE__).'/../lib/product_to_contentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/product_to_contentGeneratorHelper.class.php';

/**
 * product_to_content actions.
 *
 * @package    CMS
 * @subpackage product_to_content
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class product_to_contentActions extends autoProduct_to_contentActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'content');
        parent::preExecute();
    }
}

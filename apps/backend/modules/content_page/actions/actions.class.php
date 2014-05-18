<?php

require_once dirname(__FILE__).'/../lib/content_pageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/content_pageGeneratorHelper.class.php';

/**
 * content_page actions.
 *
 * @package    sf_sandbox
 * @subpackage content_page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class content_pageActions extends autoContent_pageActions
{
    public function preExecute()
    {
        $this->getRequest()->setParameter('mainmenu', 'content');
        $this->getRequest()->setParameter('submenu', 'page-index');
        parent::preExecute();
    }
    
}

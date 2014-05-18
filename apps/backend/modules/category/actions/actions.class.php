<?php

require_once dirname(__FILE__).'/../lib/categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/categoryGeneratorHelper.class.php';

/**
 * category actions.
 *
 * @package    sf_sandbox
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends autoCategoryActions
{
    public function preExecute()
    {
        $this->getRequest()->setParameter('mainmenu', 'content');
        $this->getRequest()->setParameter('submenu', 'category');
        parent::preExecute();
    }
    public function executeIndex(sfWebRequest $request)
    {
        $request->setParameter('categorymenu', 'index');
        parent::executeIndex($request);
    }
    public function executeNew(sfWebRequest $request)
    {
        $request->setParameter('categorymenu', 'new');
        parent::executeNew($request);
    }
}

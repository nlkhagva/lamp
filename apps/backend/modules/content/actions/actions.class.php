<?php

require_once dirname(__FILE__).'/../lib/contentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/contentGeneratorHelper.class.php';

/**
 * content actions.
 *
 * @package    sf_sandbox
 * @subpackage content
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends autoContentActions
{
    public function preExecute()
    {
        $this->getRequest()->setParameter('mainmenu', 'content');
        parent::preExecute();
    }

    public function executeIndex(sfWebRequest $request){
        $request->setParameter('submenu', 'content-index');
        parent::executeIndex($request);
    }
    public function executeNew(sfWebRequest $request){
        $request->setParameter('submenu', 'content-new');
        parent::executeNew($request);
    }
}

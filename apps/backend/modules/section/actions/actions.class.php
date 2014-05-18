<?php

require_once dirname(__FILE__).'/../lib/sectionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sectionGeneratorHelper.class.php';

/**
 * section actions.
 *
 * @package    sf_sandbox
 * @subpackage section
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sectionActions extends autoSectionActions
{
    public function preExecute()
    {
        $this->getRequest()->setParameter('mainmenu', 'content');
        $this->getRequest()->setParameter('submenu', 'section');
        parent::preExecute();
    }
    public function executeIndex(sfWebRequest $request)
    {
        $request->setParameter('section_menu', 'index');
        parent::executeIndex($request);
    }
    public function executeNew(sfWebRequest $request)
    {
        $request->setParameter('section_menu', 'new');
        parent::executeNew($request);
    }
}

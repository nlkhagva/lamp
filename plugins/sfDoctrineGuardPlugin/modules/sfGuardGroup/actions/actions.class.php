<?php

require_once dirname(__FILE__).'/../lib/sfGuardGroupGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sfGuardGroupGeneratorHelper.class.php';

/**
 * sfGuardGroup actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardGroup
 * @author     Fabien Potencier
 * @version    SVN: $Id: actions.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardGroupActions extends autosfGuardGroupActions
{
    public function preExecute()
    {
        $this->getRequest()->setParameter('mainmenu', 'user');
        parent::preExecute();
    }
    public function executeIndex(sfWebRequest $request)
    {
        parent::executeIndex($request);
        $this->getRequest()->setParameter('submenu', 'user-group');
        $this->getRequest()->setParameter('user-group-menu', 'index');
    }
    public function executeNew(sfWebRequest $request)
    {
        parent::executeNew($request);
        $this->getRequest()->setParameter('submenu', 'user-group');
        $this->getRequest()->setParameter('user-group-menu', 'new');

    }
}

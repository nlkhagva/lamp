<?php

require_once dirname(__FILE__).'/../lib/poll_positionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/poll_positionGeneratorHelper.class.php';

/**
 * poll_position actions.
 *
 * @package    sf_sandbox
 * @subpackage poll_position
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class poll_positionActions extends autoPoll_positionActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'lk_poll_position');
        return parent::preExecute();
    }
    
}

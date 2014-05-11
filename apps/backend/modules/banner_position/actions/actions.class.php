<?php

require_once dirname(__FILE__).'/../lib/banner_positionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/banner_positionGeneratorHelper.class.php';

/**
 * banner_position actions.
 *
 * @package    sf_sandbox
 * @subpackage banner_position
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class banner_positionActions extends autoBanner_positionActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'lk_banner_position');
        parent::preExecute();
    }
}

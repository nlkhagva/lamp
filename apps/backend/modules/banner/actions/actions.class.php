<?php

require_once dirname(__FILE__).'/../lib/bannerGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/bannerGeneratorHelper.class.php';

/**
 * banner actions.
 *
 * @package    sf_sandbox
 * @subpackage banner
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bannerActions extends autoBannerActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'lk_banner');
        parent::preExecute();
    }
    
}

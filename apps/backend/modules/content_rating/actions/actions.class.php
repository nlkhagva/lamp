<?php

require_once dirname(__FILE__).'/../lib/content_ratingGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/content_ratingGeneratorHelper.class.php';

/**
 * content_rating actions.
 *
 * @package    CMS
 * @subpackage content_rating
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class content_ratingActions extends autoContent_ratingActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'content');
        parent::preExecute();
    }
}

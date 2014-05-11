<?php

require_once dirname(__FILE__).'/../lib/feedbackGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/feedbackGeneratorHelper.class.php';

/**
 * feedback actions.
 *
 * @package    sf_sandbox
 * @subpackage feedback
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class feedbackActions extends autoFeedbackActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'lk_feedback');
        return parent::preExecute();
    }
    
}

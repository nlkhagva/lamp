<?php

/**
 * public actions.
 *
 * @package    sf_sandbox
 * @subpackage public
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    public function executeIndex(sfWebRequest $request)
    {
        $request->setParameter('mainmenu','homepage');
    }

    public function executeTest(sfWebRequest $request)
    {

    }
}

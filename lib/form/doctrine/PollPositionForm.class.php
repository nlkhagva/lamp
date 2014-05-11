<?php

/**
 * PollPosition form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollPositionForm extends BasePollPositionForm
{
  public function configure()
  {
      $this->useFields(array('name', 'description', 'symbol'));
  }
}

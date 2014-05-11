<?php

/**
 * PollData form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollDataForm extends BasePollDataForm
{
  public function configure()
  {
      $this->useFields(array('order_id', 'published'));
      $this->embedi18n(array('mn', 'en'));
  }
}

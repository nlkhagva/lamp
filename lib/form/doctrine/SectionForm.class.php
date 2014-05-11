<?php

/**
 * Section form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SectionForm extends BaseSectionForm
{
  public function configure()
  {
      unset($this['access'], $this['created_at'], $this['updated_at'], $this['created_by']);

      $this->embedI18n(array('mn','en'));
      $this->widgetSchema->setLabel('mn', 'Монгол');
      $this->widgetSchema['mn']->setLabel('name', 'Нэр');
      $this->widgetSchema['mn']->setLabel('description', 'Тайлбар');
      
  }
}

<?php

/**
 * Category form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryForm extends BaseCategoryForm
{
  public function configure()
  {
      unset($this['created_at'], $this['created_by'],$this['updated_at'], $this['updated_by'], $this['contents_list']);

      $this->embedi18n(array('en','mn'));
      $this->widgetSchema->setLabel('mn', 'Монгол');
            $this->widgetSchema['mn']->setLabel('name', 'Нэр');
            $this->widgetSchema['mn']->setLabel('description', 'Тайлбар');
      $this->widgetSchema->setLabel('en', 'English');

      $array = array('' => '');
      $access_choices = CategoryTable::getAccess();
      $access_choices = array_merge($array, $access_choices);  
      
      $this->widgetSchema['access'] = new sfWidgetFormChoice(array(
          'choices' => $access_choices
      ));
      
      $this->validatorSchema['access']->setOption('required', false);
  }
}

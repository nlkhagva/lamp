<?php

/**
 * ContentRating form.
 *
 * @package    CMS
 * @subpackage form
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContentRatingForm extends BaseContentRatingForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at'], $this['content_id'], $this['user_id']);
      
      $this->widgetSchema['rating'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['description'] = new sfValidatorString(array('required' => true));
      
  }
}

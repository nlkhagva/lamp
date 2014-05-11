<?php

/**
 * Comment form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm
{
  public function configure()
  {
      unset($this['content_id'], $this['created_at'], $this['updated_at'], $this['created_by']);
      
      
      
      $this->setWidgets(array(
          'name'            => new sfWidgetFormInputText(),
          'email'           => new sfWidgetFormInputText(),
          'comment_text'    => new sfWidgetFormTextarea()
      ));
      
      $this->setValidators(array(
          'name'            => new sfValidatorString(array('required' => true), array('required' => 'Та нэрээ оруулна уу !')),
          'email'           => new sfValidatorEmail(array('required' => false), array('invalid' => 'Э-шуудан буруу байна !')),
          'comment_text'    => new sfValidatorString(array('required' => true), array('required' => 'Та сэтгэгдэлээ бичнэ үү !'))
      ));
      
      $this->widgetSchema->setNameFormat('comment[%s]');
  }
}

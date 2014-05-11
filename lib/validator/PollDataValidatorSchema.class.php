<?php

class PollDataValidatorSchema extends sfValidatorSchema
{
  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('answer_mn', 'The answer mn is required.');
    $this->addMessage('answer_en', 'The answer en is required.');
  }
 
  protected function doClean($values)
  {
    $errorSchema = new sfValidatorErrorSchema($this);
 
    foreach($values as $key => $value)
    {
      $errorSchemaLocal = new sfValidatorErrorSchema($this);
 
      if (!$value['mn']['answer'] && !$value['en']['answer'])
      {
        unset($values[$key]);
      }else{
        if (!$value['mn']['answer'])
        {
            $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'answer_mn');
        }
        if (!$value['en']['answer'])
        {
            $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'answer_en');
        }
          
      }
      // no caption and no filename, remove the empty values
 
      // some error for this embedded-form
      if (count($errorSchemaLocal))
      {
        $errorSchema->addError($errorSchemaLocal, (string) $key);
      }
    }
 
    // throws the error for the main form
    if (count($errorSchema))
    {
      throw new sfValidatorErrorSchema($this, $errorSchema);
    }
 
    return $values;
  }
}


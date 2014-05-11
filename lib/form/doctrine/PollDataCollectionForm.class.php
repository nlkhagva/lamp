<?php

class PollDataCollectionForm extends sfForm
{
  public function configure()
  {
    if (!$poll = $this->getOption('poll'))
    {
      throw new InvalidArgumentException('You must provide a product object.');
    }

    for ($i = 0; $i < $this->getOption('size', 1); $i++)
    {
      $poll_data = new PollData();
      $poll_data->Poll = $poll;
 
      $form = new PollDataForm($poll_data);
 
      $this->embedForm($i, $form);
    }

    $this->mergePostValidator(new PollDataValidatorSchema());
  }
}
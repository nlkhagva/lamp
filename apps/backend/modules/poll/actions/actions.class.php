<?php

/**
 * poll actions.
 *
 * @package    sf_sandbox
 * @subpackage poll
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pollActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'lk_poll');
    }
    
  public function executeList(sfWebRequest $request)
  {
    $this->polls = Doctrine::getTable('Poll')->findAll();
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
  	$id   = $request->getParameter('id');
  	
  	if($id)
        {
            $poll = Doctrine::getTable('poll')->find($id);
            $this->forward404Unless($poll);
            $flash = "Амжилттай заслаа";
  	}else {
            $poll = new Poll();
            $flash = "Амжилттай нэмлээ";
  	}
  	
  	$form = new PollForm($poll);
  	
  	if($request->isMethod('post')){
            $form->bind($request->getParameter('poll'));

            if($form->isValid())
            {
                $form->save();
                $this->getUser()->setFlash('success', $flash);
                $this->redirect('@poll_edit?id='.$poll->getId());
            }
  	}

        $this->id   = $id;
  	$this->form = $form;
  }
  
  public function executeAddAnswer(sfWebRequest $request)
  {
  	$pid = $request->getParameter('pollId');

        $this->poll = Doctrine::getTable('Poll')->find($pid);
        $this->forward404Unless($this->poll);

        $data = new PollData();
        $data->setPollId($pid);
        $this->form = new PollDataForm($data);


        if($request->isMethod('post'))
        {
            $this->form->bind($request->getParameter('poll_data'));

            if($this->form->isValid())
            {
                $this->form->save();
                $this->getUser()->setFlash('success', 'Амжилттай нэмлээ!!');
                $this->redirect('@addAnswer?pollId='.$this->poll->getId());
            }
        }
        $this->pid = $pid;
  }
  public function executeRemoveData(sfWebRequest $request)
  {
      $dataId = $request->getParameter('dataId');

      $data = Doctrine::getTable('PollData')->find(array($dataId));
      $this->forward404Unless($data);

      if(Doctrine_Core::getTable('PollDate')->findBy('answer_id', $data->getId()))
        foreach(Doctrine_Core::getTable('PollDate')->findBy('answer_id', $data->getId()) as $poll_date )
              $poll_date->delete();
      
      $pollId = $data->getPollId();
      $data->delete();

      $this->getUser()->setFlash('success', 'Хариултыг амжилттай устгаллаа');
      $this->redirect('@addAnswer?pollId='.$pollId);
  }
  public function executeDelete(sfWebRequest $request)
  {
  	$id = $request->getParameter('id');
  	$poll = Doctrine::getTable('Poll')->find(array($id));
  	$this->forward404Unless($poll);
        $answers = Doctrine::getTable('PollData')->findBy('poll_id', $poll->getId());
        foreach($answers as $answer)
        {
           foreach(Doctrine_Core::getTable('PollDate')->findBy('answer_id', $answer->getId()) as $poll_date )
                   $poll_date->delete();
              
           $answer->delete();
        }

  	$poll->delete();

  	$this->getUser()->setFlash('success','Амжилттай устгалаа');
  	$this->redirect('@poll_list');
  }
}

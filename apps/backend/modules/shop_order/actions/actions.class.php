<?php

/**
 * shop_order actions.
 *
 * @package    CMS
 * @subpackage shop_order
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class shop_orderActions extends sfActions
{
  public function preExecute()
  {
      $this->getUser()->setFlash('mainmenu', 'order');
      
      parent::preExecute();
  }
  
  public function executeAjaxTransaction(sfWebRequest $request)
  {
      $this->forward404Unless($request->isXmlHttpRequest());
      
      $id = $request->getParameter('id');
      
      $this->order = ShopOrderTable::getInstance()->find($id);
     
      $obj = new ShopOrderTransaction();
      $obj->order_id = $id;
      $obj->user_id = $this->getUser()->getGuardUser()->getId();
      $obj->status_id = $this->order->status_id;
      
      
      $this->form = new ShopOrderTransactionForm($obj);
  }
  public function executeViewTransactionAjax(sfWebRequest $request){
      $this->transactions = ShopOrderTransactionTable::getInstance()->findBy('order_id', $request->getParameter('id'));
  }

  public function executeSaveTransaction(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod('post'));
      
      $id = $request->getParameter('id');
      $order = ShopOrderTable::getInstance()->find($id);
      
      $t = new ShopOrderTransaction();
      $t->order_id = $id;
      $t->status_id = $order->status_id;
      $t->user_id = $this->getUser()->getGuardUser()->getId();
      $t->ip_address = $request->getRemoteAddress();
      
      $this->form = new ShopOrderTransactionForm($t);
      
      $this->form->bind($request->getParameter($this->form->getName()));

      if($this->form->isValid()){
          $tran = $this->form->save();
          $this->getUser()->setFlash('success', 'Гүйлгээ амжилттай нэмэгдлээ.');
          $order->updateTransaction();
      }
      
      $this->redirect('shop_order/edit?id='.$id);
  }
    
  public function executeIndex(sfWebRequest $request)
  {
    $query = Doctrine::getTable('ShopOrder')
      ->createQuery('a');
    
    if($request->getParameter('status_id')){
        $query->addWhere('status_id = ?', $request->getParameter('status_id'));
    }
    
    $this->pager = new sfDoctrinePager('ShopOrder', sfConfig::get('app_shop_order_perpage'));
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init();
    
    $this->title = 'Захиалгууд';
    $this->total_order = $this->pager->count();
    $this->page_url = 'shop_order/index?page=';
    
    $this->order_status = ShopOrderStatusTable::getInstance()->findAll();
    $this->status_url = 'shop_order/index?status_id=';
  }
  
  public function executeSearch(sfWebRequest $request)
  {
    $q = $request->getParameter('q');
    $query = ShopOrderTable::getInstance()->getSearchQuery($q);
    
    if($request->getParameter('status_id')){
        $query->addWhere('status_id = ?', $request->getParameter('status_id'));
    }
      
    $this->pager = new sfDoctrinePager('ShopOrder', sfConfig::get('app_shop_order_perpage'));
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init();
    
    $this->title = 'Хайлт: '.$q;
    $this->total_order = $this->pager->count();
    $this->q = $q;
    $this->page_url = 'shop_order/search?q='.$q.'&page=';
    $this->setTemplate('index');

    $this->order_status = ShopOrderStatusTable::getInstance()->findAll();
    $this->status_url = 'shop_order/search?q='.$q.'&status_id=';
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ShopOrderForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ShopOrderForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($shop_order = Doctrine::getTable('ShopOrder')->find(array($request->getParameter('id'))), sprintf('Object shop_order does not exist (%s).', $request->getParameter('id')));
    $this->form = new ShopOrderForm($shop_order);
    $this->message_form = new ShopOrderMessageForm();
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($shop_order = Doctrine::getTable('ShopOrder')->find(array($request->getParameter('id'))), sprintf('Object shop_order does not exist (%s).', $request->getParameter('id')));
    $this->form = new ShopOrderForm($shop_order);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($shop_order = Doctrine::getTable('ShopOrder')->find(array($request->getParameter('id'))), sprintf('Object shop_order does not exist (%s).', $request->getParameter('id')));
    $shop_order->delete();

    $this->redirect('shop_order/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $shop_order = $form->save();

      $this->redirect('shop_order/edit?id='.$shop_order->getId());
    }
  }

    public function executeAddMessage(sfWebRequest $request)
    {
        // $this->forward404Unless($request->isXmlHttpRequest() || $request->isMethod('post'));

        $message = new ShopOrderMessage();
        $message->order_id = $request->getParameter('id');
        $message->send_user_id = $this->getUser()->getGuardUser()->getId();

        $this->form = new ShopOrderMessageForm($message);
        $this->form->bind($request->getParameter($this->form->getName()));

        if($this->form->isValid()){
            $message = $this->form->save();
            $str = $this->getPartial('shop_order/messageItem', array('message' => $message));
            die ($str);
        }else{
            die('error');
        }
    }

    public function executeMessageRead(sfWebRequest $request)
    {
        $id = $request->getParameter('msg_id');
        $order_id = $request->getParameter('order_id', 0);

        if(!$order_id){
            $message = ShopOrderMessageTable::getInstance()->find($id);
            $message->is_read = 1;
            $message->save();
        }else{

        }


        return sfView::NONE;
    }
}

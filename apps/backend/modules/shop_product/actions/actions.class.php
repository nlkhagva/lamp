<?php

/**
 * shop_product actions.
 *
 * @package    sf_sandbox
 * @subpackage shop_product
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class shop_productActions extends sfActions
{
    public function preExecute()
    {
        $this->getUser()->setFlash('mainmenu', 'product');
        parent::preExecute();
    }
  public function executeGetImages(sfWebRequest $request)
  {
      $id = $request->getParameter('id');
      $this->product = ShopProductTable::getInstance()->find($id);
      
      $this->setLayout(false);
  }
    
    
  public function executeAddPictures(sfWebRequest $request)
  {
      $id = $request->getParameter('id');
      $this->product = ShopProductTable::getInstance()->find($id);
      $this->forward404Unless($this->product);
      
      $this->image = new ShopProductImage();
      $this->image->setProduct($this->product);
      
      $this->image_form = new ShopProductImageForm($this->image);
      if($request->isMethod('put')){
          foreach($request->getFiles() as $file ){
              $file_name = $file['img_src']['name'];
              
              $extension = substr(strrchr($file_name, "."), 0);
              $file_name = 'uploaded_'.sha1($file_name.time());
                
              foreach( sfConfig::get('app_product_photo_sizes') as $size ){
                $upload_directory = sfConfig::get('sf_upload_dir').'/products/'.$size;
                
                if(!is_dir($upload_directory)){
                    mkdir($upload_directory, 0777);
                }
                  
                $thumbnail = new sfThumbnail($size);
                $thumbnail->loadFile($file['img_src']['tmp_name']);
                $thumbnail->save($upload_directory.'/'.$file_name.$extension);
              }

              $thumbnail = new sfThumbnail();
              $thumbnail->loadFile($file['img_src']['tmp_name']);
              $thumbnail->save(sfConfig::get('sf_upload_dir').'/products/'.$file_name.$extension);
              
              $image_product = new ShopProductImage();
              $image_product->setProduct($this->product);
              $image_product->setImgSrc($file_name.$extension);
              $image_product->save();
          }
          $this->setLayout(false);
          return sfView::NONE;
      }
      
  }
  
  public function executeImageChangeActive(sfWebRequest $request)
  {
      $id = $request->getParameter('id');
      $image = ShopProductImageTable::getInstance()->find($id);
      
      if($image->getIsActive() == 1)
          $image->setIsActive(0);
      else
          $image->setIsActive(1);
      
      $image->save();
      
      $this->setLayout(false);
      return sfView::NONE;
  }
  
  public function executeChoiceCoverPhoto(sfWebRequest $request)
  {
      $id = $request->getParameter('id');
      $image = ShopProductImageTable::getInstance()->find($id);

      $product = $image->getProduct();
      $product->setCoverPhotoId($id);
      $product->save();
      
      $this->setLayout(false);
      return sfView::NONE;
  }
  
  
  public function executeRemovePhoto(sfWebRequest $request)
  {
      $id = $request->getParameter('id');
      $image = ShopProductImageTable::getInstance()->find($id);

      if($image->getProduct()->getCoverPhotoId() == $image->getId()){
          die('is_cover_photo');
      }
      
      $image->delete();
      
      $this->setLayout(false);
      return sfView::NONE;
  }
    
  public function executeAjaxOptionList(sfWebRequest $request)
  {
      $id = $request->getParameter('id');
      $this->category = ShopCategoryTable::getInstance()->find($id);
      $this->fieldname  = $request->getParameter('fieldname');
      
      $this->product = ShopProductTable::getInstance()->find($request->getParameter('product_id'));
      
      $this->setLayout(false);
  }
  
  public function executeChoiceCategory(sfWebRequest $requests)
  {
    $this->toplevel_categories = ShopCategoryTable::getInstance()->getTopLevel();
  }
    
    
  public function executeIndex(sfWebRequest $request)
  {
      $query = ShopProductTable::getInstance()->createQuery()->orderBy('created_at DESC');
      
      $this->shop_products = new sfDoctrinePager('ShopProduct', sfConfig::get('app_product_list_perpage'));
      $this->shop_products->setQuery($query);
      $this->shop_products->setPage($request->getParameter('page', 1));
      $this->shop_products->init();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->category_id = $request->getParameter('category_id', 0);
    $this->category = ShopCategoryTable::getInstance()->find($this->category_id);
    
    $product = new ShopProduct();
    $product->setCategoryId($this->category_id);
    $this->form = new ShopProductForm($product);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->category_id = $request->getParameter('category_id', 0);
    $this->category = ShopCategoryTable::getInstance()->find($this->category_id);
    
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ShopProductForm();

    $this->processForm($request, $this->form, $step_3 = true);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($shop_product = Doctrine::getTable('ShopProduct')->find(array($request->getParameter('id'))), sprintf('Object shop_product does not exist (%s).', $request->getParameter('id')));
    $this->form = new ShopProductForm($shop_product);

    $this->category_id = $shop_product->getCategoryId();
    $this->category = ShopCategoryTable::getInstance()->find($this->category_id);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($shop_product = Doctrine::getTable('ShopProduct')->find(array($request->getParameter('id'))), sprintf('Object shop_product does not exist (%s).', $request->getParameter('id')));
    $this->form = new ShopProductForm($shop_product);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();

    $this->forward404Unless($shop_product = Doctrine::getTable('ShopProduct')->find(array($request->getParameter('id'))), sprintf('Object shop_product does not exist (%s).', $request->getParameter('id')));
    $shop_product->delete();

    $this->redirect('shop_product/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form, $step_3 = false)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $shop_product = $form->save();
      $option_values = $request->getParameter('shop_product_option_value');
      if(!$option_values)   $option_values = array();
      
      foreach($option_values as $option_id => $option_values){
          foreach($option_values as $value_id => $value){
              $value_object = ShopOptionValueTable::getInstance()->getValue($option_id, $value_id);
              
              if(!$value_object){
                  $value_object = new ShopOptionValue();
                  $value_object->setOptionId($option_id);
              }
              $value_object->setName($value);
              $value_object->setName($value);
              $value_object->save();
              $value_product_conn = ShopProductOptionValueConnTable::getInstance()->getObject($shop_product->getId(), $value_object->getId());
              
              if(!$value_product_conn){
                  $value_product_conn = new ShopProductOptionValueConn();
                  $value_product_conn->setProduct($shop_product);
                  $value_product_conn->setOptionValue($value_object);
                  $value_product_conn->save();
              }
          }
      }

      if($step_3){
          $this->redirect('shop_product/addPictures?id='.$shop_product->getId());
      }else{
          $this->redirect('shop_product/edit?id='.$shop_product->getId());
      }
    }
  }
}

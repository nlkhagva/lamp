<?php

/**
 * content_page module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage content_page
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContent_pageGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array(  'label' => 'Үйлдэл',  '_new' =>   array(    'label' => 'Шинээр үүсгэх',  ),  '_delete' =>   array(    'label' => 'Устгах',  ),  '_edit' =>   array(    'label' => 'Засах',  ),  '_save' =>   array(    'label' => 'Хадгалах',  ),  '_save_and_add' =>   array(    'label' => 'Хадгалах, нэмэх',  ),  '_list' =>   array(    'label' => 'Жагсаалт руу буцах',  ),);
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%title%% - %%Category%%';
  }

  public function getListTitle()
  {
    return 'Хуудас жагсаалт';
  }

  public function getEditTitle()
  {
    return 'Хуудас хэсэг засварлах';
  }

  public function getNewTitle()
  {
    return 'Шинэ хуудас үүсгэх';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'category_id',);
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'title',  1 => 'Category',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'slug' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Slug',),
      'category_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Ангилал',),
      'image_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'order_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Дэс дугаар',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'slug' => array(),
      'category_id' => array(),
      'image_name' => array(),
      'order_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'slug' => array(),
      'category_id' => array(),
      'image_name' => array(),
      'order_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'slug' => array(),
      'category_id' => array(),
      'image_name' => array(),
      'order_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'slug' => array(),
      'category_id' => array(),
      'image_name' => array(),
      'order_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'slug' => array(),
      'category_id' => array(),
      'image_name' => array(),
      'order_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'PageForm';
  }
  
  public function getListLayout(){}

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'PageFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}

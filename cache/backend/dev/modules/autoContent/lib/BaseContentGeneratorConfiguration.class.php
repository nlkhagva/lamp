<?php

/**
 * content module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage content
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContentGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array(  '_new' =>   array(    'label' => 'Шинээр үүсгэх',  ),  '_delete' =>   array(    'label' => 'Устгах',    'confirm' => 'Та итгэлтэй байна уу?',  ),  '_edit' =>   array(    'label' => 'Засах',  ),  '_save' =>   array(    'label' => 'Хадгалах',  ),  '_save_and_add' =>   array(    'label' => 'Хадгалах, нэмэх',  ),  '_list' =>   array(    'label' => 'Жагсаалт руу буцах',  ),);
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
    return '%%title%% - %%published%% - %%section%% - %%_categories%%';
  }

  public function getListTitle()
  {
    return 'Агуулгын жагсаалт';
  }

  public function getEditTitle()
  {
    return 'Засварлах хэсэг';
  }

  public function getNewTitle()
  {
    return 'Шинээр агуулга нэмэх';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'section_id',  1 => 'published',  2 => 'categories_list',);
  }

  public function getFormDisplay()
  {
    return array(  'Агуулгын хэсэг' =>   array(    0 => '_ajax_section_category',    1 => 'mn',    2 => 'en',  ),  'Тохиргооны хэсэг' =>   array(    0 => 'is_feature',    1 => 'album_id',    2 => 'image_name',    3 => 'published',    4 => 'created_at',    5 => 'extra',  ),);
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
    return array(  0 => 'title',  1 => 'published',  2 => 'section',  3 => '_categories',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'is_feature' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Онцлох',),
      'published' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Харуулах уу?',),
      'section_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Секци',),
      'album_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Зургийн цомог сонгоно уу!',),
      'image_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_by' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'updated_by' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'rating' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'hits' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'access' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'start_date' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'end_date' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'extra' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Дэс дугаар',),
      'order_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'categories_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Ангилалууд',),
      'section' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Секци',),
      'intro_text' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Товч текст/орц',),
      'full_text' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Бүрэн текст/заавар',),
      'description' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Тайлбар/илчлэг',),
      'title' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Гарчиг',),
      'categories' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Ангилалууд',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'is_feature' => array(),
      'published' => array(),
      'section_id' => array(),
      'album_id' => array(),
      'image_name' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'rating' => array(),
      'hits' => array(),
      'access' => array(),
      'start_date' => array(),
      'end_date' => array(),
      'extra' => array(),
      'order_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'categories_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'is_feature' => array(),
      'published' => array(),
      'section_id' => array(),
      'album_id' => array(),
      'image_name' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'rating' => array(),
      'hits' => array(),
      'access' => array(),
      'start_date' => array(),
      'end_date' => array(),
      'extra' => array(),
      'order_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'categories_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'is_feature' => array(),
      'published' => array(),
      'section_id' => array(),
      'album_id' => array(),
      'image_name' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'rating' => array(),
      'hits' => array(),
      'access' => array(),
      'start_date' => array(),
      'end_date' => array(),
      'extra' => array(),
      'order_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'categories_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'is_feature' => array(),
      'published' => array(),
      'section_id' => array(),
      'album_id' => array(),
      'image_name' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'rating' => array(),
      'hits' => array(),
      'access' => array(),
      'start_date' => array(),
      'end_date' => array(),
      'extra' => array(),
      'order_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'categories_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'is_feature' => array(),
      'published' => array(),
      'section_id' => array(),
      'album_id' => array(),
      'image_name' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'rating' => array(),
      'hits' => array(),
      'access' => array(),
      'start_date' => array(),
      'end_date' => array(),
      'extra' => array(),
      'order_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'categories_list' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'ContentForm';
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
    return 'ContentFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 15;
  }

  public function getDefaultSort()
  {
    return array('created_at', 'desc');
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

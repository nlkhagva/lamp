<?php

/**
 * video module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage video
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVideoGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%title%% - %%description%%';
  }

  public function getListTitle()
  {
    return 'Видео жагсаалт';
  }

  public function getEditTitle()
  {
    return 'Видео засварлах';
  }

  public function getNewTitle()
  {
    return 'Шинээр видео нэмэх хэсэг';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'section_id',  1 => 'category_id',);
  }

  public function getFormDisplay()
  {
    return array(  0 => 'mn',  1 => 'en',  2 => '_ajax_section_category',  3 => 'embed_src',  4 => 'image',  5 => 'file_name',);
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
    return array(  0 => 'title',  1 => 'description',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'section_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Секци',),
      'category_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Ангилал',),
      'image' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Зургаа сонгоно уу',),
      'file_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Файлын нэр оруулна уу',),
      'is_embed' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'embed_src' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Embed код',),
      'order_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'published' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'created_by' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'updated_by' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'title' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Гарчиг',),
      'description' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Тайлбар',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'section_id' => array(),
      'category_id' => array(),
      'image' => array(),
      'file_name' => array(),
      'is_embed' => array(),
      'embed_src' => array(),
      'order_id' => array(),
      'published' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'section_id' => array(),
      'category_id' => array(),
      'image' => array(),
      'file_name' => array(),
      'is_embed' => array(),
      'embed_src' => array(),
      'order_id' => array(),
      'published' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'section_id' => array(),
      'category_id' => array(),
      'image' => array(),
      'file_name' => array(),
      'is_embed' => array(),
      'embed_src' => array(),
      'order_id' => array(),
      'published' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'section_id' => array(),
      'category_id' => array(),
      'image' => array(),
      'file_name' => array(),
      'is_embed' => array(),
      'embed_src' => array(),
      'order_id' => array(),
      'published' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'section_id' => array(),
      'category_id' => array(),
      'image' => array(),
      'file_name' => array(),
      'is_embed' => array(),
      'embed_src' => array(),
      'order_id' => array(),
      'published' => array(),
      'created_by' => array(),
      'updated_by' => array(),
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
    return 'VideoForm';
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
    return 'VideoFormFilter';
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

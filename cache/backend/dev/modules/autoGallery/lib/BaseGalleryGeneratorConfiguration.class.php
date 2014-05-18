<?php

/**
 * gallery module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage gallery
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseGalleryGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return array(  '_list' => NULL,  '_delete' => NULL,  '_save' => NULL,  '_purge' =>   array(    'name' => 'backend.edit.purge',    'action' => 'purge',  ),);
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
    return '%%=id%% - %%=title%%';
  }

  public function getListTitle()
  {
    return 'Зургийн цомгууд';
  }

  public function getEditTitle()
  {
    return 'Зургийн цомог засах';
  }

  public function getNewTitle()
  {
    return 'Шинэ зургийн цомог үүсгэх';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array(  'Зургийн цомог' =>   array(    0 => 'id',    1 => 'title',    2 => '_ajax_section_category',    3 => 'description',    4 => 'is_active',  ),  'Зурагнууд' =>   array(    0 => '_photoUpload',  ),);
  }

  public function getNewDisplay()
  {
    return array(  'Зургийн цомог' =>   array(    0 => 'id',    1 => 'title',    2 => '_ajax_section_category',    3 => 'description',  ),);
  }

  public function getListDisplay()
  {
    return array(  0 => '=id',  1 => '=title',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'title' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Гарчиг',),
      'description' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Тайлбар',),
      'is_active' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'category_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'section_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Үүссэн огноо',  'date_format' => 'dd/MM/yyyy',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Засварлагдсан огноо',  'date_format' => 'dd/MM/yyyy',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'title' => array(),
      'description' => array(),
      'is_active' => array(),
      'category_id' => array(),
      'section_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'title' => array(),
      'description' => array(),
      'is_active' => array(),
      'category_id' => array(),
      'section_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'title' => array(),
      'description' => array(),
      'is_active' => array(),
      'category_id' => array(),
      'section_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'title' => array(),
      'description' => array(),
      'is_active' => array(),
      'category_id' => array(),
      'section_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'title' => array(),
      'description' => array(),
      'is_active' => array(),
      'category_id' => array(),
      'section_id' => array(),
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
    return 'galleryForm';
  }
  
  public function getListLayout(){}

  public function hasFilterForm()
  {
    return false;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'galleryFormFilter';
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

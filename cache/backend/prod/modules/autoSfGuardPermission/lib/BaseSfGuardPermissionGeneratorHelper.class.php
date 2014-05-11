<?php

/**
 * sfGuardPermission module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage sfGuardPermission
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSfGuardPermissionGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'sf_guard_permission' : 'sf_guard_permission_'.$action;
  }

  public function linkToNew($params)
  {
    return link_to('<i class="icon-plus icon-white"></i> '.__($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('new'), array('class' => 'btn btn-info'));
  }

  public function linkToEdit($object, $params)
  {
    return link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('edit'), $object, array('class' => 'btn'));
  }

  public function linkToDelete($object, $params)
  {
    if ($object->isNew())
    {
      return '';
    }

    return link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], 'class' => 'btn btn-danger pull-right'));
  }

  public function linkToList($params)
  {
    return link_to(__($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('list'), array('class' => 'btn'));
  }

  public function linkToSave($object, $params)
  {
    return '<button type="submit" class="btn btn-primary">'.__($params['label'], array(), 'sf_admin').'</button>';
  }

  public function linkToSaveAndAdd($object, $params)
  {
    if (!$object->isNew())
    {
      return '';
    }

    return '<button type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="_save_and_add" class="btn btn-primary">'.__($params['label'], array(), 'sf_admin').'</button>';
  }
}

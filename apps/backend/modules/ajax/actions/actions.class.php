<?php

/**
 * ajax actions.
 *
 * @package    sf_sandbox
 * @subpackage ajax
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ajaxActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    
/**
 * banner - ийн төрөл зураг байх юм бол энэ action руу үсэрнэ
 * @param sfWebRequest $request 
 */

  public function executeChoiceCategory(sfWebRequest $request)
  {
    if ($request->isXmlHttpRequest()) {
        $cat_ids = array();

        $section_id     = $request->getParameter('id');
        $content_id     = $request->getParameter('c_id');

        if($section_id == 0){
            $sections = Doctrine_Core::getTable('Section')->findAll();
            $this->section = $sections[0];
        }else{
            $this->section = Doctrine_Core::getTable('Section')->find($section_id);
        }

        foreach($this->section->getCategories() as $cat)
            $cat_ids[$cat->getId()] = '';


        if($content_id != 0){
            $content = Doctrine_Core::getTable('Content')->find($content_id);
            if($content->getSectionId() == $section_id)
                foreach($content->getCategories() as $cat){
                        $cat_ids[$cat->getId()] = 'checked';
                }
        }

        $this->cat_ids = $cat_ids;
    }
  }
    public function executeChoiceGalleryCategory(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            $s_id = $request->getParameter('id');
            $g_id = $request->getParameter('g_id');
            $this->c_id = 0;

            if($g_id != 0){
                $gallery = Doctrine_Core::getTable('Gallery')->find($g_id);
                $this->c_id = $gallery->getCategoryId();
            }

            $this->categories = Doctrine_Core::getTable('Category')->findBy('section_id', $s_id);
        }
    }
    public function executeChoiceVideoCategory(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            $s_id = $request->getParameter('id');
            $g_id = $request->getParameter('g_id');
            $this->c_id = 0;

            if($g_id != 0){
                $video = Doctrine_Core::getTable('Video')->find($g_id);
                $this->c_id = $video->getCategoryId();
            }

            $this->categories = Doctrine_Core::getTable('Category')->findBy('section_id', $s_id);
        }
    }
}

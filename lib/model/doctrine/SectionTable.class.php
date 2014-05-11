<?php


class SectionTable extends Doctrine_Table
{
    const RECIPES = 2;
    const HEALTHY = 3;
    const PAGE    = 7;
    
    /* RECIPES ID */
    const RECIPE  = 8;
//    const BROWSE_BY_BERRY  = 8;
//    const BROWSE_BY_COURSE = 9;
//    const BROWSE_BY_THEME  = 10;
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Section');
    }
    public function getContentSection()
    {
        return $this->getInstance()->findBy('type_id', SectionTypeTable::CONTENT);
    }
    public function getImageSection()
    {
        return $this->getInstance()->findBy('type_id', SectionTypeTable::IMAGE);
    }
    public function getVideoSection()
    {
        return $this->getInstance()->findBy('type_id', SectionTypeTable::VIDEO);
    }
    
//    public function getRecipes()
//    {
//        $q = $this->getInstance()->createQuery();
//        $q->whereIn('id',SectionTable::getRecipesId());
//        
//        return $q->execute();
//    }
//    
//    public static function getRecipesId()
//    {
//        return array(
//            SectionTable::BROWSE_BY_BERRY,
//            SectionTable::BROWSE_BY_COURSE,
//            SectionTable::BROWSE_BY_THEME
//        );
//    }
}
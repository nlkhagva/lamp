<?php

/**
 * BaseContent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property boolean $is_feature
 * @property boolean $published
 * @property integer $section_id
 * @property integer $album_id
 * @property string $image_name
 * @property string $intro_text
 * @property string $full_text
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $rating
 * @property integer $hits
 * @property string $access
 * @property timestamp $start_date
 * @property timestamp $end_date
 * @property string $description
 * @property string $extra
 * @property integer $order_id
 * @property Section $Section
 * @property Gallery $Gallery
 * @property Doctrine_Collection $Categories
 * @property Doctrine_Collection $ContentRating
 * @property CategoryContent $CategoryContents
 * @property Doctrine_Collection $Comments
 * @property Doctrine_Collection $ShopProduct
 * @property Doctrine_Collection $ProductToContent
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getTitle()            Returns the current record's "title" value
 * @method boolean             getIsFeature()        Returns the current record's "is_feature" value
 * @method boolean             getPublished()        Returns the current record's "published" value
 * @method integer             getSectionId()        Returns the current record's "section_id" value
 * @method integer             getAlbumId()          Returns the current record's "album_id" value
 * @method string              getImageName()        Returns the current record's "image_name" value
 * @method string              getIntroText()        Returns the current record's "intro_text" value
 * @method string              getFullText()         Returns the current record's "full_text" value
 * @method integer             getCreatedBy()        Returns the current record's "created_by" value
 * @method integer             getUpdatedBy()        Returns the current record's "updated_by" value
 * @method integer             getRating()           Returns the current record's "rating" value
 * @method integer             getHits()             Returns the current record's "hits" value
 * @method string              getAccess()           Returns the current record's "access" value
 * @method timestamp           getStartDate()        Returns the current record's "start_date" value
 * @method timestamp           getEndDate()          Returns the current record's "end_date" value
 * @method string              getDescription()      Returns the current record's "description" value
 * @method string              getExtra()            Returns the current record's "extra" value
 * @method integer             getOrderId()          Returns the current record's "order_id" value
 * @method Section             getSection()          Returns the current record's "Section" value
 * @method Gallery             getGallery()          Returns the current record's "Gallery" value
 * @method Doctrine_Collection getCategories()       Returns the current record's "Categories" collection
 * @method Doctrine_Collection getContentRating()    Returns the current record's "ContentRating" collection
 * @method CategoryContent     getCategoryContents() Returns the current record's "CategoryContents" value
 * @method Doctrine_Collection getComments()         Returns the current record's "Comments" collection
 * @method Doctrine_Collection getShopProduct()      Returns the current record's "ShopProduct" collection
 * @method Doctrine_Collection getProductToContent() Returns the current record's "ProductToContent" collection
 * @method Content             setId()               Sets the current record's "id" value
 * @method Content             setTitle()            Sets the current record's "title" value
 * @method Content             setIsFeature()        Sets the current record's "is_feature" value
 * @method Content             setPublished()        Sets the current record's "published" value
 * @method Content             setSectionId()        Sets the current record's "section_id" value
 * @method Content             setAlbumId()          Sets the current record's "album_id" value
 * @method Content             setImageName()        Sets the current record's "image_name" value
 * @method Content             setIntroText()        Sets the current record's "intro_text" value
 * @method Content             setFullText()         Sets the current record's "full_text" value
 * @method Content             setCreatedBy()        Sets the current record's "created_by" value
 * @method Content             setUpdatedBy()        Sets the current record's "updated_by" value
 * @method Content             setRating()           Sets the current record's "rating" value
 * @method Content             setHits()             Sets the current record's "hits" value
 * @method Content             setAccess()           Sets the current record's "access" value
 * @method Content             setStartDate()        Sets the current record's "start_date" value
 * @method Content             setEndDate()          Sets the current record's "end_date" value
 * @method Content             setDescription()      Sets the current record's "description" value
 * @method Content             setExtra()            Sets the current record's "extra" value
 * @method Content             setOrderId()          Sets the current record's "order_id" value
 * @method Content             setSection()          Sets the current record's "Section" value
 * @method Content             setGallery()          Sets the current record's "Gallery" value
 * @method Content             setCategories()       Sets the current record's "Categories" collection
 * @method Content             setContentRating()    Sets the current record's "ContentRating" collection
 * @method Content             setCategoryContents() Sets the current record's "CategoryContents" value
 * @method Content             setComments()         Sets the current record's "Comments" collection
 * @method Content             setShopProduct()      Sets the current record's "ShopProduct" collection
 * @method Content             setProductToContent() Sets the current record's "ProductToContent" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseContent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('content');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 200, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 200,
             ));
        $this->hasColumn('is_feature', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('published', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => '1',
             ));
        $this->hasColumn('section_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('album_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('image_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('intro_text', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             'length' => '',
             ));
        $this->hasColumn('full_text', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             'length' => '',
             ));
        $this->hasColumn('created_by', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('updated_by', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('rating', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             ));
        $this->hasColumn('hits', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('access', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('start_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => false,
             ));
        $this->hasColumn('end_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => false,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             'length' => '',
             ));
        $this->hasColumn('extra', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('order_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Section', array(
             'local' => 'section_id',
             'foreign' => 'id'));

        $this->hasOne('Gallery', array(
             'local' => 'album_id',
             'foreign' => 'id'));

        $this->hasMany('Category as Categories', array(
             'refClass' => 'CategoryContent',
             'local' => 'content_id',
             'foreign' => 'category_id'));

        $this->hasMany('ContentRating', array(
             'local' => 'id',
             'foreign' => 'content_id'));

        $this->hasOne('CategoryContent as CategoryContents', array(
             'local' => 'id',
             'foreign' => 'content_id'));

        $this->hasMany('Comment as Comments', array(
             'local' => 'id',
             'foreign' => 'content_id'));

        $this->hasMany('ShopProduct', array(
             'local' => 'id',
             'foreign' => 'related_content'));

        $this->hasMany('ProductToContent', array(
             'local' => 'id',
             'foreign' => 'content_id'));

        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'title',
              1 => 'intro_text',
              2 => 'full_text',
              3 => 'description',
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($i18n0);
        $this->actAs($timestampable0);
    }
}
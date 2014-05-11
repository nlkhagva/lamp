<?php

/**
 * BaseObjectActionConn
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $action_id
 * @property integer $object_type_id
 * @property string $slug
 * @property string $sentence_format
 * @property boolean $is_wall
 * @property boolean $is_notification
 * @property ObjectType $ObjectType
 * @property Action $Action
 * @property Doctrine_Collection $Logs
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getActionId()        Returns the current record's "action_id" value
 * @method integer             getObjectTypeId()    Returns the current record's "object_type_id" value
 * @method string              getSlug()            Returns the current record's "slug" value
 * @method string              getSentenceFormat()  Returns the current record's "sentence_format" value
 * @method boolean             getIsWall()          Returns the current record's "is_wall" value
 * @method boolean             getIsNotification()  Returns the current record's "is_notification" value
 * @method ObjectType          getObjectType()      Returns the current record's "ObjectType" value
 * @method Action              getAction()          Returns the current record's "Action" value
 * @method Doctrine_Collection getLogs()            Returns the current record's "Logs" collection
 * @method ObjectActionConn    setId()              Sets the current record's "id" value
 * @method ObjectActionConn    setActionId()        Sets the current record's "action_id" value
 * @method ObjectActionConn    setObjectTypeId()    Sets the current record's "object_type_id" value
 * @method ObjectActionConn    setSlug()            Sets the current record's "slug" value
 * @method ObjectActionConn    setSentenceFormat()  Sets the current record's "sentence_format" value
 * @method ObjectActionConn    setIsWall()          Sets the current record's "is_wall" value
 * @method ObjectActionConn    setIsNotification()  Sets the current record's "is_notification" value
 * @method ObjectActionConn    setObjectType()      Sets the current record's "ObjectType" value
 * @method ObjectActionConn    setAction()          Sets the current record's "Action" value
 * @method ObjectActionConn    setLogs()            Sets the current record's "Logs" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseObjectActionConn extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('object_action_conn');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             ));
        $this->hasColumn('action_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('object_type_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('slug', 'string', 100, array(
             'type' => 'string',
             'unique' => true,
             'length' => 100,
             ));
        $this->hasColumn('sentence_format', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_wall', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_notification', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ObjectType', array(
             'local' => 'object_type_id',
             'foreign' => 'id'));

        $this->hasOne('Action', array(
             'local' => 'action_id',
             'foreign' => 'id'));

        $this->hasMany('ActivityLog as Logs', array(
             'local' => 'id',
             'foreign' => 'object_action_conn_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
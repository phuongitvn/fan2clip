<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/24/2015
 * Time: 11:33 PM
 */
class WebUsers extends EMongoDocument
{
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $email;
    public $status;
    public $created_datetime;
    public $updated_datetime;
    public $last_visited;
    public $code;
    /**
     * Returns the static model of the specified AR class.
     * @return TubeVideo the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * returns the primary key field for this model
     */
    public function primaryKey()
    {
        return '_id';
    }

    /**
     * @return string the associated collection name
     */
    public function getCollectionName()
    {
        return 'tube_video';
    }
    public function getAllUsers()
    {
        $c = array(
            'conditions'=>array(
                'status'=>array('==' => 1),
            ),
        );
        $users = WebUsers::model()->findAll($c);
        $result = array();
        foreach($users as $user){
            $result[$user->code] = $user;
        }
        return $result;
    }
}
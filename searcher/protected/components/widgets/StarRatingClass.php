<?php
/**
 * Class for methods needed for star-rating of users
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

class StarRatingClass
{
    /**
     * @var int $user_id - id of user profile used for rating
     * @var string $modelClassName - name of CActiveRecord class that we use for info abouts users
     * @var bool $useRelations - either to use relations for calculating an average rating or not
     * @var string $relation - name of relation of $modelClassName for retrieving all necessary information
     * @var string $relationForAverageRating - name of relation of $modelClassName for average rating
     * @var CActiveRecord $model - instance of CActiveRecord model
     */
    
    public $user_id;
    public $modelClassName = 'User';
    public $useRelations = true;
    public $relation = 'ratings';
    public $relationForAverageRating = 'averageRating';
    public $model;
    
    /**
     * Class constructor
     * @param int $user_id - profile id of user we want to watch comments for
     */

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
        $this->model = call_user_func(array($this->modelClassName, 'model'));
        $this->model = $this->model->findByAttributes(array('id' => $this->user_id));
    }

    /**
     * Method for getting average rating of profile
     * @return float - average rating of profile
     */

    public function getAverageRating()
    {
        if(!empty($this->model->{$this->relationForAverageRating}))
        {
            return $this->model->{$this->relationForAverageRating};
        }
        return null;
    }

    /**
     * Method for getting rating object for looping etc.
     * @return array - set of related CActiveRecords
     */

    public function getRatingObject()
    {
        if(!empty($this->model->{$this->relation}))
        {
            return $this->model->{$this->relation};
        }
        return null;
    }

    /**
     * setter for model class name
     * @param $modelClassName
     * @return void
     */

    public function setModelClassName($modelClassName)
    {
        $this->modelClassName = $modelClassName;
    }

    /**
     * getter for model class name
     * @return string
     */

    public function getModelClassName()
    {
        return $this->modelClassName;
    }

    /**
     * Check whether vote cookie exists or not
     * @return bool whether cookie exists or not
     */

    public function doesCookieExist()
    {
        return isset(Yii::app()->request->cookies['already_voted']) && Yii::app()->request->cookies['already_voted']->value == $this->user_id;
    }

    /**
     * This method ensures whether there are some records about ratings for this user by this user
     * @return bool
     */

    public function doesDatabaseRecordExists()
    {
        $model = Rating::model()->findByAttributes(array('user_id' => $this->user_id, 'create_user_id' => Yii::app()->user->id));
        return $model !== null;
    }
}
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
        return $this->model->{$this->relationForAverageRating};
    }

    /**
     * Method for getting rating object for looping etc.
     * @return array - set of related CActiveRecords
     */

    public function getRatingObject()
    {
        return $this->model->{$this->relation};
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
}
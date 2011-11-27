<?php

/**
 * Class for common profile search functionality
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

abstract class AbstractProfileSearch
{
/**
     * @var string $searchQuery - search query that we are working with
     * @var array $searchAndQueries - additional array used in 'amd' queries
     * @var array $searchOrQueries - additional array used in 'or' queries
     */

    public $searchQuery;
    public $searchAndQueries = array();
    public $searchOrQueries = array();

   /**
    * @var array $searchableFromTopFormFields - fields from db table Profile we are going to search
    * These fields could be:
    *   1) Simple field from table (for example 'username')
    *   2) Enum field from table (for example 'gender')
    *   3) Link between field and class static property (for example 'education' field and Profile::$EducationArray)
    *   4) Relationship between model Profile and another model (for example 'hobbys')
    */

	public $fieldsThatAreSearchable = array(
        't.user_id' => array(     // this is because we are using eager loading in relationship queries (main table has pseudonym of 't')
            'type' => 'simple',
            'order' => 'nickname ASC',
        ),
        'nickname' => array(
            'type' => 'simple',
            'order' => 'nickname ASC',
        ),
//        'username',
//        'FirstName',
//        'LastName',
//        'city',
        'firstUniversity' => array(  // example of relationship field type
            'type' => 'relationship',
            'field' => 'name',
            'order' => 'nickname ASC',
        ),
        'gender' => array(  // if field in database has type of ENUM, we could set search phrases separated by comma for these fields
            'type' => 'enum',
            'synonyms' => array(
                'M' => 'male,man,men',
                'F' => 'female,woman,women'
            ),
            'order' => 'nickname ASC',
        ),
//        'education' => array(  // we could link search attribute with any class static property
//            'type' => 'linkedStaticProperty',
//            'linkedStaticProperty' => '$staticFieldValue = Profile::$EducationArray;',
//        ),
        'race' => array(  // example of relationship field type
            'type' => 'relationship',
            'field' => 'name',
            'order' => 'nickname ASC',
        ),

//        'hobbys' => array(  // example of relationship field type
//            'type' => 'relationship',
//            'field' => 'hobby_id',
//            'throughModel' => 'HobbyType', // we use this field if we want to search by field of other relation
//            'throughAttribute' => 'name', // for example hobby - hobbyType relations
//        ),
//        'religion' => array(
//            'type' => 'relationship',
//            'field' => 'name',
//        ),
    );

    /**
     * @var array $badQueries - queries that are not valid at all
     */

    public $badQueries = array(
        ''
    );

    /**
     * @var int $booleanAndLength - how much 'and' search string operators is supported
     * If this value = infinity we could face with performance problems
     */

    public $booleanAndLength = 10;

    /**
     * @var int $booleanOrLength - how much 'or' search string operators is supported
     * If this value = infinity we could face with performance problems
     */

    public $booleanOrLength = 10;

    /**
     * @var int $minLengthOfQuery - min length of bad query
     */

    public $minLengthOfQuery = 2;

    public $additionalSearchModifierClasses = array();

    /**
     * @var Profile $model - instance of model used in class
     * @var CDbCriteria $criteria - instance of database criteria used in class
     * @var CDataProvider $provider - instance of CDataProvider used in class
     */

    public $model;
    public $criteria;
    public $provider;

    public abstract function runSearch();

    /**
     * Class constructor
     * @param $searchQuery
     */

    public function __construct($searchQuery)
    {
        $this->searchQuery = $this->filterIncomingSearchQuery($searchQuery);
        if($this->isSearchQueryValid())
        {
            $this->model = BasicProfile::model();
            $this->criteria = new CDbCriteria();
            $this->resolveOrQueries();
            $this->resolveAndQueries();
            $this->runSearch();
        }
        else
        {
            $this->model = BasicProfile::model();
            $this->criteria = new CDbCriteria();
            $this->criteria->condition = 'user_id = 0';
        }
    }

    /**
     * @static Class factory method
     * @param $searchQuery
     * @return ProfileSearch
     */

    public static function factory($searchQuery)
    {
        return new ProfileSearch($searchQuery);
    }

    /**
     * @param $model
     * @return void
     */

    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return Profile
     */

    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return bool
     */

    public function isSearchQueryValid()
    {
        if(isset($_GET['FilterForm']) && $this->searchQuery == '') $this->searchQuery = ' ';
        if(isset($_GET['FilterForm'])) return true;
        return (strlen($this->searchQuery) >= $this->minLengthOfQuery && array_search($this->searchQuery, $this->badQueries) === FALSE);
    }

    /**
     * @param $searchQuery
     * @return string
     */

    protected function filterIncomingSearchQuery($searchQuery)
    {
        return strip_tags(trim(strtolower($searchQuery)));
    }

    /**
     * @return void
     */

    public function invokeAdditionalSearchModifiers()
    {
        foreach($this->additionalSearchModifierClasses as $class)
        {
            Yii::import('application.components.' . $class);
            $object = new $class($this->searchQuery);
            $object->setCriteria($this->criteria);
            $object->runSearch();
            $this->criteria = $object->getCriteria();
        }
    }

    /**
     * @param $criteria
     * @return void
     */

    public function setCriteria($criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * @return CDbCriteria
     */

    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * returns number of items per page for grid & thumbnail views
     * @return int
     */

    public function getPageSize()
    {
        $pageSize = 12;
        if(isset($_SESSION['pageSize']))
        {
            $pageSize = $_SESSION['pageSize'];
        }
        return $pageSize;
    }

    /**
     * This method is used to resolve 'or' queries from searchstring from form
     * For example, it resolves string such as 'value1 or value2 or value3'
     * @return void
     */

    protected function resolveOrQueries()
    {
        $this->searchOrQueries = explode('or', $this->searchQuery);
        $this->searchOrQueries = array_slice($this->searchOrQueries, 0, $this->booleanOrLength);
        $this->searchOrQueries = array_map('trim', $this->searchOrQueries);
    }

    /**
     * This method is used to resolve 'or' queries from searchstring from form
     * For example, it resolves string such as 'value1 or value2 or value3'
     * @return void
     */

    protected function resolveAndQueries()
    {
        $this->searchAndQueries = explode('and', $this->searchQuery);
        $this->searchAndQueries = array_slice($this->searchAndQueries, 0, $this->booleanAndLength);
        $this->searchAndQueries = array_map('trim', $this->searchAndQueries);

        if(sizeof($this->searchAndQueries) == 1 && sizeof($this->searchOrQueries) <= 1)
        {
            $this->searchAndQueries = explode(' ', $this->searchQuery);
            $this->searchAndQueries = array_slice($this->searchAndQueries, 0, $this->booleanAndLength);
            $this->searchAndQueries = array_map('trim', $this->searchAndQueries);
        }
    }
}

?>
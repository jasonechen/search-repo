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
            'order' => 'firstUniversity.name, states.name ASC',
        ),
        'nickname' => array(
            'type' => 'simple',
            //'order' => 'nickname ASC',
        ),
//        'username',
//        'FirstName',
//        'LastName',
//        'city',
        'firstUniversity' => array(  // example of relationship field type
            'type' => 'relationship',
            'field' => 'name',
            //'order' => 'nickname ASC',
        ),
        'gender' => array(  // if field in database has type of ENUM, we could set search phrases separated by comma for these fields
            'type' => 'enum',
            'synonyms' => array(
                'M' => 'male,man,men',
                'F' => 'female,woman,women'
            ),
            //'order' => 'nickname ASC',
        ),
            
        'state' => array(
            'type' => 'relationship',
            'field' => 'state',
            'throughModel' => 'States',
            'throughAttribute' => 'name',
        ),
        'ethnicity' => array(
            'type' => 'relationship',
            'field' => 'ethnic_origin',
            'throughModel' => 'EthnicType',
            'throughAttribute' => 'name',
        ),   
            
        'profile_type' => array(  
          'type' => 'linkedStaticProperty',
           'linkedStaticProperty' => 'BasicProfile::$ProfileTypeArray;',  
            ),
            
//        'education' => array(  // we could link search attribute with any class static property
//            'type' => 'linkedStaticProperty',
//            'linkedStaticProperty' => '$staticFieldValue = Profile::$EducationArray;',
//        ),
        'race' => array(  // example of relationship field type
            'type' => 'relationship',
            'field' => 'name',
            //'order' => 'nickname ASC',
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
     * @var array $sortableFields - we use it for appropriate sorting of CGridView widget
     */

    public $sortableFields = array(
        'firstUniversity' => array(
            'asc' => 'firstUniversity.name',
            'desc' => 'firstUniversity.name DESC',
        ),
        'race' => array(
            'asc' => 'race.name',
            'desc' => 'race.name DESC',
        ),
        'stateName' => array(
            'asc' => 'states.name',
            'desc' => 'states.name DESC',
        ),
        '*',
    );

    /**
     * @var array $sortableCriterias - we use it for appropriate sorting of CGridView widget
     */

    public $sortableCriterias = array(
        'firstUniversity',
        'race',
        'scoreProfile',
        'user' => array(
            'with' => array(
                'personalProfile' =>
                array(
                    'with' => 'states',
                )
            ),
        ),
    );

    /**
     * @var array $filters - we use it for filtering CGridView data
     */

    public $filters = array(
        0 => array(
            'attribute' => 'user_id',  // attribute of BasicProfile model
            'sqlAttribute' => 't.user_id', // column used in SQL query for this filter
            'exact' => false, // use LIKE in SQL query or not
        ),
        1 => array(
            'attribute' => 'gender',
            'sqlAttribute' => 't.gender',
            'exact' => false,
        ),
        2 => array(
            'attribute' => 'num_scores',
            'sqlAttribute' => 't.num_scores',
            'exact' => false,
        ),
        3 => array(
            'attribute' => 'num_academics',
            'sqlAttribute' => 't.num_academics',
            'exact' => false,
        ),
        4 => array(
            'attribute' => 'num_extracurriculars',
            'sqlAttribute' => 't.num_extracurriculars',
            'exact' => false,
        ),
        5 => array(
            'attribute' => 'nickname',
            'sqlAttribute' => 't.nickname',
            'exact' => false,
        ),
        6 => array(
            'attribute' => 'profile_type',
            'sqlAttribute' => 't.profile_type',
            'exact' => true,
        ),
        7 => array(
            'attribute' => 'firstUniversity',
            'sqlAttribute' => 'firstUniversity.name',
            'exact' => false,
        ),
        8 => array(
            'attribute' => 'race',
            'sqlAttribute' => 'race.name',
            'exact' => true,
        ),
        9 => array(
            'attribute' => 'stateName',
            'sqlAttribute' => 'personalProfile.state',
            'exact' => true,
        ),
        10 => array(
            'attribute' => 'sat_I_score_range',
            'sqlAttribute' => 't.sat_I_score_range',
            'exact' => true,
        ),
        11 => array(
            'attribute' => 'avg_profile_rating',
            'sqlAttribute' => 't.avg_profile_rating',
            'exact' => false,
        ),
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

    public $booleanAndLength = 11;

    /**
     * @var int $booleanOrLength - how much 'or' search string operators is supported
     * If this value = infinity we could face with performance problems
     */

    public $booleanOrLength = 11;

    /**
     * @var int $minLengthOfQuery - min length of bad query
     */

    public $minLengthOfQuery = 0;

    public $additionalSearchModifierClasses = array();

    /**
     * @var BasicProfile $model - instance of model used in class
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
            $this->model = new BasicProfile('search');

            $this->criteria = new CDbCriteria();
            $this->resolveOrQueries();
            $this->resolveAndQueries();
            $this->runSearch();
        }
        else
        {
            $this->model = new BasicProfile('search');
            $this->criteria = new CDbCriteria();
            $this->criteria->condition = 't.user_id = 0';
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

    public static function filterIncomingSearchQuery($searchQuery)
    {
        return htmlspecialchars(strip_tags(trim(strtolower($searchQuery))));
    }

    /**
     * @static
     * @return array
     */

    public static function restoreSearchSession()
    {
        $result = array();

        $id = '';
        $name = '';

        if(isset($_SESSION['search_first_university_id']))
        {
            $id = $_SESSION['search_first_university_id'];
            $model = UniversityName::model()->findByPk($id);

            if(!empty($model))
            {
                $name = $model->name;
            }
            else
            {
                $id = '';
                $name = '';
            }
        }

        if(isset($_SESSION['search_first_university_name']))
        {
            $name = $_SESSION['search_first_university_name'];
            $model = UniversityName::model()->findByAttributes(array('name' => $name));

            if(!empty($model))
            {
                $id = $model->id;
            }
            else
            {
                $id = '';
                $name = '';
            }
        }

        $result['id'] = $id;
        $result['name'] = $name;

        return $result;
    }

    /**
     * @return void
     */

    public function invokeAdditionalSearchModifiers()
    {
        foreach($this->additionalSearchModifierClasses as $class)
        {
            /**
             * @var AbstractProfileSearch $object
             */
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
        $this->searchOrQueries = explode(' or ', $this->searchQuery);
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
        $this->searchAndQueries = explode(' and ', $this->searchQuery);
        $this->searchAndQueries = array_slice($this->searchAndQueries, 0, $this->booleanAndLength);
        $this->searchAndQueries = array_map('trim', $this->searchAndQueries);

        if(sizeof($this->searchAndQueries) == 1 && sizeof($this->searchOrQueries) <= 1)
        {
            $this->searchAndQueries = explode(' ', $this->searchQuery);
            $this->searchAndQueries = array_slice($this->searchAndQueries, 0, $this->booleanAndLength);
            $this->searchAndQueries = array_map('trim', $this->searchAndQueries);
        }
    }

    /**
     * Function that applies filters defined by $this->filters array to model criteria
     */

    protected function addFilters()
    {
        // since $this doesn't work in closures before PHP 5.4.0 we have to use this hack

        $reference_variable = $this;

        $changeCriteria = function($sqlAttribute, $attribute, $exact = true) use (&$reference_variable)
        {
            if($exact)
            {
                $reference_variable->criteria->condition =
                    str_replace(
                        ') OR (', ') OR (' . $sqlAttribute . ' = "' . $attribute . '" AND ',
                        $reference_variable->criteria->condition
                    );
                if(strpos($reference_variable->criteria->condition, ') OR (') === FALSE)
                {
                    $reference_variable->criteria->condition .= ' AND ' . $sqlAttribute . ' = "' . $attribute . '"';
                }
            }
            else
            {
                $reference_variable->criteria->condition =
                    str_replace(
                        ') OR (', ') OR (' . $sqlAttribute . ' LIKE "%' . $attribute . '%" AND ',
                        $reference_variable->criteria->condition
                    );
                if(strpos($reference_variable->criteria->condition, ') OR (') === FALSE)
                {
                    $reference_variable->criteria->condition .= ' AND ' . $sqlAttribute . ' LIKE "%' . $attribute . '%"';
                }
            }
        };

        if(isset($_GET['BasicProfile']))
        {

            /**
             * Just a little pre-filtering of data received from user
             */

            foreach($_GET['BasicProfile'] as $key => $value)
            {
                $_GET[$key] = strip_tags($value);
            }

            /*
             * going through all defined filters
             */

            foreach($this->filters as $filter)
            {
                $attribute = $_GET['BasicProfile'][$filter['attribute']];

                if(!empty($attribute))
                {
                    $this->model->$filter['attribute'] = $attribute;

                    if(!$filter['exact'])
                    {
                        /**
                         * Adjusting of criteria condition using closure defined previously
                         */

                        $changeCriteria($filter['sqlAttribute'], $attribute, false);

                        /**
                         * Adjusting criteria WITH condition directly without using of closure
                         */

                        foreach($this->criteria->with as $withKey => $with)
                        {
                            if(!empty($with['condition']) && !is_numeric($withKey))
                            {
                                $this->criteria->with[$withKey]['condition'] .= ' AND ' . $filter['sqlAttribute'] . ' LIKE "%' . $attribute . '%"';
                            }
                        }
                    }
                    else
                    {
                        /**
                         * Adjusting of criteria condition using closure defined previously
                         */

                        $changeCriteria($filter['sqlAttribute'], $attribute, true);

                        /**
                         * Adjusting criteria WITH condition directly without using of closure
                         */

                        foreach($this->criteria->with as $withKey => $with)
                        {
                            if(!empty($with['condition']) && !is_numeric($withKey))
                            {
                                $this->criteria->with[$withKey]['condition'] .= ' AND ' . $filter['sqlAttribute'] . ' = "' . $attribute . '"';
                            }
                        }
                    }
                }
            }
        }
    }
}

?>
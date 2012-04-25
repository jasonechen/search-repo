<?php

/**
 * Class for advanced filter search functionality
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

Yii::import('application.components.FilterProfileModifier.FilterProfileModifierFactory');

class FilterProfileSearch extends AbstractProfileSearch
{
    /**
     * @var string $requestMethod - method that is used for filtering query ($_GET or $_POST)
     */

    public $requestMethod = 'get';

    /**
     * @var string $requestVariable - variable from $requestMethod array (for example $_GET['FilterForm'])
     */

    public $requestVariable = 'FilterForm';

    public $requestArray;

    /**
     * @var array $modificationOfCriteriaAccordingToValuesFromFilterForm - array of criteria for filter form
     * each array element has items:
     *  1) key - request variable (for example 'education')
     *  2) value - object from components/FilterProfileModifier folder (for example 'CheckboxList')
     */

    public $modificationOfCriteriaAccordingToValuesFromFilterForm = array(
        'gender' => array(
            'type' => 'CheckboxList',
        ),
        'country.id' => array(
            'type' => 'DropDownList',
        ),
        'states.id' => array(
            'type' => 'DropDownList',
        ),
        'focus' => array(
            'type' => 'MultiSelectList',
        ),
        'race_id' => array(
            'type' => 'DropDownList',
        ),
        /*'SAT' => array(
            'type' => 'IntegerSlider',
            'config' => array(
                'defaultMinValue' => 0,
                'defaultMaxValue' => 5,
                'useAnotherModel' => 'ScoreProfile',
                'anotherModelAttribute' => array(
                    'SAT_Math',
                    'SAT_Critical_Read',
                    'SAT_Writing'
                ),
                'valueCorrelation' => array(
                    0 => '600',
                    1 => '1000',
                    2 => '1300',
                    3 => '1800',
                    4 => '2100',
                    5 => '2400',
                ),
                'mainModelAttribute' => 'user_id',
            ),
        ),*/
        'SAT' => array(
            'type' => 'IntegerSlider',
            'config' => array(
                'expression' => 'scoreProfile.SAT_Math + scoreProfile.SAT_Critical_Read + scoreProfile.SAT_Writing',
                'defaultMinValue' => 0,
                'defaultMaxValue' => 5,
                'valueCorrelation' => array(
                    0 => '600',
                    1 => '1200',                    
                    2 => '1500',
                    3 => '1800',
                    4 => '2100',
                    5 => '2400',
                ),
            ),
        ),
        'num_scores' => array(
            'type' => 'IntegerSlider',
            'config' => array(
                'defaultMinValue' => 0,
                'defaultMaxValue' => 5,
                'valueCorrelation' => array(
                    0 => '0',
                    1 => '5',
                    2 => '10',
                    3 => '15',
                    4 => '20',
                    5 => '25+',
                ),
            ),
        ),
        'num_extracurriculars' => array(
            'type' => 'IntegerSlider',
            'config' => array(
                'defaultMinValue' => 0,
                'defaultMaxValue' => 5,
                'valueCorrelation' => array(
                    0 => '0',
                    1 => '5',
                    2 => '10',
                    3 => '15',
                    4 => '20',
                    5 => '25+',
                ),
            ),
        ),
        'num_essays' => array(
            'type' => 'Checkbox',
            'config' => array(
                'operator' => '>',
                'value' => '0',
            ),
        ),
        'verified' => array(
            'type' => 'Checkbox',
        ),
        'consultValue' => array(
            'type' => 'Checkbox',
            'config' => array(
                'operator' => '>',
                'value' => '0',
            ),
        ),
        'avg_profile_rating' => array(
            'type' => 'IntegerSlider',
            'config' => array(
                'defaultMinValue' => 1,
                'defaultMaxValue' => 5,
                'allowNull' => true,
            ),
        ),
//      'education' => array(
//            'type' => 'IntegerSlider',
//            'config' => array(
//                'defaultMinValue' => 0,
//                'defaultMaxValue' => 3,
//            ),
//        ),
   //     'first_university_id' => array(
     //       'type' => 'HiddenField',
      //  ),
//        'hasPets' => array(
//            'type' => 'Checkbox',
//        ),
//        'hasChildren' => array(
//            'type' => 'Checkbox',
//        ),
//        'city' => array(
//            'type' => 'DropDownList',
//        ),
//        'date_of_birth' => array(
//            'type' => 'AgeSlider'
//        ),
    );

    /**
     *
     * @param $searchQuery
     */

    public function __construct($searchQuery)
    {
        if ($this->requestMethod == 'get') $this->requestArray = $_GET;
        if ($this->requestMethod == 'post') $this->requestArray = $_POST;
    }

    /**
     * implementation of abstract method
     * @return void
     */

    public function runSearch()
    {
        $this->modifyDatabaseCriteriaAccordingToValuesFromFilterForm();
    }

    /**
     * This method modifies search criteria according to values from filter form
     * @return void
     */

    public function modifyDatabaseCriteriaAccordingToValuesFromFilterForm()
    {
        foreach($this->modificationOfCriteriaAccordingToValuesFromFilterForm as $key => $field)
        {
            if(isset($field['config']))
            {
                $this->criteria = FilterProfileModifierFactory::init($this, $field['type'], $key)->modifyCriteria($field['config']);
            }
            else
            {
                $this->criteria = FilterProfileModifierFactory::init($this, $field['type'], $key)->modifyCriteria();
            }
        }
    }
}

?>
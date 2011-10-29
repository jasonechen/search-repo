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
        'education' => array(
            'type' => 'IntegerSlider',
            'config' => array(
                'defaultMinValue' => 0,
                'defaultMaxValue' => 3,
            ),
        ),
        'race_id' => array(
            'type' => 'CheckboxList',
        ),
        'gender' => array(
            'type' => 'RadioButton',
        ),
        'hasPets' => array(
            'type' => 'Checkbox',
        ),
        'hasChildren' => array(
            'type' => 'Checkbox',
        ),
        'city' => array(
            'type' => 'DropDownList',
        ),
        'date_of_birth' => array(
            'type' => 'AgeSlider'
        ),
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
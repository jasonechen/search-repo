<?php

/**
 * Class for profile search functionality
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

Yii::import('application.components.AbstractProfileSearch');

class ProfileSearch extends AbstractProfileSearch
{
    public $additionalSearchModifierClasses = array(
        'FilterProfileSearch'
    );

    /**
	 * This method is used in presentation layer to return CActiveDataProvider for GridView / ListView widget
     * @return CActiveDataProvider $provider;
     */
    
    public function getDataProvider()
    {
        $sort = new CSort();
        $sort->attributes = $this->sortableFields;

        $sortableCriteria = new CDbCriteria();
        $sortableCriteria->with = $this->sortableCriterias;
        $this->criteria->mergeWith($sortableCriteria);

        $this->provider = new CActiveDataProvider($this->model, array(
                    'criteria' => $this->criteria,
                    'sort' => $sort,
                    'pagination' => array(
                        'pageSize' => $this->getPageSize(),
                    ),
                ));

        return $this->provider;
    }

    /**
     * runs Search with keyword searchQuery
     * @return void
     */

    public function runSearch()
    {
        if(isset($_GET['clear-button']) || isset($_POST['clear-button']))
        {
            $this->clearSearchCriteria();
        }
        if($this->searchQuery !== ' ')
        {
            $this->modifyDatabaseCriteriaAccordingToSearchQuery();
        }
        $this->invokeAdditionalSearchModifiers();
    }

    /**
     * @return void
     */

    public function clearSearchCriteria()
    {
        $this->criteria = new CDbCriteria();
        $_SESSION['search_q'] = '';
        Yii::app()->controller->redirect(Yii::app()->controller->createUrl('search/index'));
        Yii::app()->end();
    }    
    
    /**
     * Modifies search criteria according to search Query
     * @return void
     */

    private function modifyDatabaseCriteriaAccordingToSearchQuery()
    {
        foreach($this->fieldsThatAreSearchable as $key => $value)
        {
            if($this->checkIfFieldIsSimple($value))
            {
                $this->modifyDatabaseCriteriaIfFieldIsSimple($key, $value);
            }
            elseif($this->checkIfFieldIsLinkedWithStaticProperty($value))
            {
                $this->modifyDatabaseCriteriaIfFieldIsLinkedWithStaticProperty($key, $value);
            }
            elseif($this->checkIfFieldIsRelationship($value))
            {
                $this->modifyDatabaseCriteriaIfFieldIsRelationship($key, $value);
            }
            elseif($this->checkIfFieldHasTypeOfEnum($value))
            {
                $this->modifyDatabaseCriteriaIfFieldHasTypeOfEnum($key, $value);
            }
        }
        if(empty($this->criteria->condition))
        {
            $this->criteria->condition = 'user_id = 0';
        }
    }

    /**
     * Method for modifying default order if defined
     * @param array $field
     * @return void
     */

    private function modifyOrder($field)
    {
        if(isset($field['order']))
        {
            $this->criteria->order = $field['order'];
        }
    }

    /**
     * Check if field is simple
     * @param int $field field
     * @return bool
     */

    private function checkIfFieldIsSimple($field)
    {
        return (is_array($field) && isset($field['type']) && $field['type'] == 'simple');
    }

    /**
     * Modifies criteria if field is simple
     * @param string $fieldKey field key
     * @param string $field field
     * @return void
     */

    private function modifyDatabaseCriteriaIfFieldIsSimple($fieldKey, $field)
    {
        if(sizeof($this->searchOrQueries) > 1)
        {
            $this->addSimpleCondition($this->searchOrQueries, $fieldKey, 'OR', 'OR');
        }
        if(sizeof($this->searchAndQueries) > 1)
        {
            $this->addSimpleCondition($this->searchAndQueries, $fieldKey, 'OR', 'AND');
        }
        elseif(sizeof($this->searchOrQueries) == 1 && sizeof($this->searchAndQueries) == 1)
        {
            $this->criteria->compare($fieldKey, $this->searchQuery, true, 'OR');
        }
        $this->modifyOrder($field);
    }

    /**
     * Check if field has type of enum
     * @param array $field field
     * @return bool
     */

    private function checkIfFieldHasTypeOfEnum($field)
    {
        return (is_array($field) && isset($field['type']) && $field['type'] == 'enum');
    }

    /**
     * Modifies criteria if field is simple
     * @param string $fieldKey field key
     * @param array $field field
     * @return void
     */

    private function modifyDatabaseCriteriaIfFieldHasTypeOfEnum($fieldKey, $field)
    {
        if(!isset($field['synonyms'])) return;

        $breakExternalLoop = false;

        foreach($field['synonyms'] as $synonym => $searchString)
        {
            $searchStringArray = explode(',', $searchString);

            // not good solution but at least it works
            // @TODO beatify this solution
            
            if($breakExternalLoop) break;

            if(sizeof($this->searchOrQueries) > 1)
            {
                foreach($searchStringArray as $searchStringArrayItem)
                {
                    foreach($this->searchOrQueries as $query)
                    if($searchStringArrayItem == $query)
                    {
                        $this->addEnumCondition(array($synonym), $fieldKey, 'OR', 'OR');
                    }
                }
            }
            if(sizeof($this->searchAndQueries) > 1)
            {
                foreach($searchStringArray as $searchStringArrayItem)
                {
                    foreach($this->searchAndQueries as $query)
                    if($searchStringArrayItem == $query)
                    {
                        $this->addEnumCondition(array($synonym), $fieldKey, 'OR', 'AND');
                    }
                }
            }
            elseif(sizeof($this->searchOrQueries) == 1 && sizeof($this->searchAndQueries) == 1)
            {
                foreach($searchStringArray as $searchStringArrayItem)
                {
                    // if we've found exact occurrence then just break external and internal loops
                    // this is needed in some special cases

                    if($searchStringArrayItem == $this->searchQuery)
                    {
                        $this->criteria->condition = $fieldKey . ' = "' . $synonym . '"';
                        $breakExternalLoop = true;
                        $this->modifyOrder($field);
                        break;
                    }
                    if(strpos( $this->searchQuery, $searchStringArrayItem) !== FALSE)
                    {
                        $this->criteria->condition = $fieldKey . ' = "' . $synonym . '"';
                        $this->modifyOrder($field);
                    }
                }
            }
        }
    }

    /**
     * Check if field is linked with static property of class
     * @param array $field field
     * @return bool
     */

    private function checkIfFieldIsLinkedWithStaticProperty($field)
    {
        return (is_array($field) && isset($field['type']) && $field['type'] == 'linkedStaticProperty');
    }

    /**
     * Modifies criteria if field is simple
     * @param string $fieldKey field key
     * @param array $field field
     * @return void
     */

    private function modifyDatabaseCriteriaIfFieldIsLinkedWithStaticProperty($fieldKey, $field)
    {
        if(!isset($field['linkedStaticProperty'])) return;

        $staticFieldValue = array();
        eval('$staticFieldValue = ' . $field['linkedStaticProperty'] . ';');
        foreach($staticFieldValue as $key => $value)
        {
            if(strpos(strtolower($value), $this->searchQuery) !== FALSE)
            {
                $this->criteria->compare($fieldKey, $key, true, 'OR');
                $this->modifyOrder($field);
            }
        }
    }

    /**
     * Check if field is relationship beetween one model and other model
     * @param array $field field
     * @return bool
     */

    private function checkIfFieldIsRelationship($field)
    {
        return (is_array($field) && isset($field['type']) && $field['type'] == 'relationship');
    }

    /**
     * Modifies criteria if field is relationship beetween one model and other model
     * @param string $fieldKey field key
     * @param array $field field
     * @return void
     */

    private function modifyDatabaseCriteriaIfFieldIsRelationship($fieldKey, $field)
    {
        if(!isset($field['field'])) return;

        $relationCriteria = new CDbCriteria();

		if(isset($field['throughModel']) && isset($field['throughAttribute']))
		{
			$model = call_user_func(array($field['throughModel'], 'model'));
            $idModel = $model->findByAttributes(array($field['throughAttribute'] => $this->searchQuery));

            if($idModel)
            {
                $id = $idModel->id;
                $relationCriteria->with = array(
                    $fieldKey => array(
                        'condition' => $fieldKey . '.' . $field['field'] . ' LIKE "%' . $id . '%"',
                        'together' => true,
                        'order' => (isset($field['order'])) ? $field['order'] : '',
                    )
                );
            }
		}
		else
		{
            $addedCondition = $fieldKey . '.' . $field['field'] . ' LIKE "%' . $this->searchQuery . '%"';

            if(sizeof($this->searchOrQueries) > 1)
            {
                $addedCondition = $this->addCondition($this->searchOrQueries, $fieldKey . '.' . $field['field'], 'OR', 'OR');
            }

            if(sizeof($this->searchAndQueries) > 1)
            {
                $addedCondition = $this->addCondition($this->searchAndQueries, $fieldKey . '.' . $field['field'], 'OR', 'AND');
            }
            
			$relationCriteria->with = array(
				$fieldKey => array(
					'condition' => $addedCondition,
                    'order' => (isset($field['order'])) ? $field['order'] : '',
				)
			);
		}

        $this->criteria->mergeWith($relationCriteria, false);
    }

    /**
     * Adding simple condition to our CDbCriteria
     * @param array $searchQueries - array of words added to query condition
     * @param $fieldKey - query field key
     * @param string $queryConnector - string by what pieces of queries are connected
     * @param string $conditionConnector - string by what new piece of query is connected to old query
     * @return void
     */

    private function addSimpleCondition(array $searchQueries, $fieldKey, $queryConnector, $conditionConnector)
    {
        $addedCondition = '';

        foreach($searchQueries as $searchQuery)
        {
            $addedCondition .= $fieldKey . ' LIKE "%' . $searchQuery .  '%" ' . $queryConnector . ' ';
        }

        if($queryConnector == 'OR')
        {
            $addedCondition = substr($addedCondition, 0, -3);
        }
        
        if($queryConnector == 'AND')
        {
            $addedCondition = substr($addedCondition, 0, -4);
        }

        if(!empty($this->criteria->condition))
        {
            $this->criteria->condition .= ' ' . $conditionConnector .' (' . $addedCondition .') ';
        }
        else
        {
            $this->criteria->condition .= ' (' . $addedCondition .') ';
        }
    }

    /**
     * Adding enum condition to our CDbCriteria
     * @param array $searchQueries - array of words added to query condition
     * @param $fieldKey - query field key
     * @param string $queryConnector - string by what pieces of queries are connected
     * @param string $conditionConnector - string by what new piece of query is connected to old query
     * @return void
     */

    private function addEnumCondition(array $searchQueries, $fieldKey, $queryConnector, $conditionConnector)
    {
        $addedCondition = '';

        foreach($searchQueries as $searchQuery)
        {
            $addedCondition .= $fieldKey . ' = "' . $searchQuery .  '" ' . $queryConnector . ' ';
        }

        if($queryConnector == 'OR')
        {
            $addedCondition = substr($addedCondition, 0, -3);
        }

        if($queryConnector == 'AND')
        {
            $addedCondition = substr($addedCondition, 0, -4);
        }

        if(!empty($this->criteria->condition))
        {
            $this->criteria->condition .= ' ' . $conditionConnector .' (' . $addedCondition .') ';
        }
        else
        {
            $this->criteria->condition .= ' (' . $addedCondition .') ';
        }
    }

    /**
     * Adding condition to our CDbCriteria
     * @param array $searchQueries - array of words added to query condition
     * @param $fieldKey - query field key
     * @param string $queryConnector - string by what pieces of queries are connected
     * @param string $conditionConnector - string by what new piece of query is connected to old query
     * @return string $condition new condition
     */

    private function addCondition(array $searchQueries, $fieldKey, $queryConnector, $conditionConnector)
    {
        $addedCondition = '';

        foreach($searchQueries as $searchQuery)
        {
            $addedCondition .= $fieldKey . ' LIKE "%' . $searchQuery .  '%" ' . $queryConnector . ' ';
        }

        if($queryConnector == 'OR')
        {
            $addedCondition = substr($addedCondition, 0, -3);
        }

        if($queryConnector == 'AND')
        {
            $addedCondition = substr($addedCondition, 0, -4);
        }

        if(strpos($this->criteria->condition, $addedCondition) !== FALSE)
        {
            return $addedCondition;
        }

        if(!empty($this->criteria->condition))
        {
            $addedCondition .= ' ' . $conditionConnector .' (' . $addedCondition .') ';
        }
        else
        {
            $addedCondition .= ' (' . $addedCondition .') ';
        }
        return $addedCondition;
    }
}
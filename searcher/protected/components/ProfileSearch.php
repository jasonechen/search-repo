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
        $this->provider = new CActiveDataProvider($this->model, array(
                    'criteria' => $this->criteria,
                    'pagination' => array(
                        'pageSize' => $this->getPageSize(),
                    ),
                ));
        $data = $this->provider->getData();
        if(empty($data))
        {
            foreach($this->fieldsThatAreSearchable as $key => $value)
            {
                if($this->checkIfFieldIsRelationship($value))
                {
                    $this->modifyDatabaseCriteriaIfFieldIsRelationship($key, $value);
                    $this->provider = new CActiveDataProvider($this->model, array(
                                'criteria' => $this->criteria,
                                'pagination' => array(
                                    'pageSize' => $this->getPageSize(),
                                ),
                    ));
                    $this->invokeAdditionalSearchModifiers();
                    $data = $this->provider->getData();
                    if(!empty($data)) return $this->provider;
                }
            }
        }
        else
        {
            return $this->provider;
        }
        return $this->provider;
    }

    /**
     * runs Search with keyword searchQuery
     * @return void
     */

    public function runSearch()
    {
        if($this->searchQuery !== ' ')
        {
            $this->modifyDatabaseCriteriaAccordingToSearchQuery();
        }
        $this->invokeAdditionalSearchModifiers();
    }

    /**
     * Modifies search criteria according to search Query
     * @return void
     */

    private function modifyDatabaseCriteriaAccordingToSearchQuery()
    {
        foreach($this->fieldsThatAreSearchable as $key => $value)
        {
            if($this->checkIfFieldIsSimple($key))
            {
                $this->modifyDatabaseCriteriaIfFieldIsSimple($value);
            }
            elseif($this->checkIfFieldHasTypeOfEnum($value))
            {
                $this->modifyDatabaseCriteriaIfFieldHasTypeOfEnum($key, $value);
            }
            elseif($this->checkIfFieldIsLinkedWithStaticProperty($value))
            {
                $this->modifyDatabaseCriteriaIfFieldIsLinkedWithStaticProperty($key, $value);
            }
        }
    }

    /**
     * Check if field is simple
     * @param int $fieldKey field key
     * @return bool
     */

    private function checkIfFieldIsSimple($fieldKey)
    {
        return is_numeric($fieldKey);
    }

    /**
     * Modifies criteria if field is simple
     * @param string $field field
     * @return void
     */

    private function modifyDatabaseCriteriaIfFieldIsSimple($field)
    {
        $this->criteria->compare($field, $this->searchQuery, true, 'OR');
    }

    /**
     * Check if field has type of enum
     * @param int $field field
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

        foreach($field['synonyms'] as $synonym => $searchString)
        {
            $searchStringArray = explode(',', $searchString);
            foreach($searchStringArray as $searchStringArrayItem)
            {
                if($this->searchQuery == $searchStringArrayItem)
                {
                    $this->criteria->condition = $fieldKey . ' = "' . $synonym . '"';
                }
            }
        }
    }

    /**
     * Check if field is linked with static property of class
     * @param int $field field
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
            }
        }
    }

    /**
     * Check if field is relationship beetween one model and other model
     * @param int $field field
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

        $this->criteria = new CDbCriteria();

		if(isset($field['throughModel']) && isset($field['throughAttribute']))
		{
			$model = call_user_func(array($field['throughModel'], 'model'));
			$id = $model->findByAttributes(array($field['throughAttribute'] => $this->searchQuery))->id;
			$this->criteria->with = array(
				$fieldKey => array(
					'condition' => $fieldKey . '.' . $field['field'] . ' = "' . $id . '"',
					'together' => true,
				)
			);
		}
		else
		{
			$this->criteria->with = array(
				$fieldKey => array(
					'condition' => $fieldKey . '.' . $field['field'] . ' = "' . $this->searchQuery . '"',
				)
			);
		}
    }
}
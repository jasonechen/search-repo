<?php

/**
 * Integer slider search modifier
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

class IntegerSlider extends AbstractModifier
{
    private $config;

    /**
     * redefinition of abstract method 
     * @param string $config additional config if needed
     * @return CDbCriteria $criteria
     */

    public function modifyCriteria($config = '')
    {
        $this->config = $config;

        if(!$this->checkRequestArrayForMinAndMaxValues())
        {
            return $this->object->criteria;
        }

        if(!empty($config['useAnotherModel']) && !empty($config['anotherModelAttribute'])  && empty($config['useRelation']))
        {
            $this->modifyCriteriaByAnotherModelAttribute($config);
        }
        elseif(!empty($config['useAnotherModel']) && !empty($config['useRelation']))
        {
            $this->modifyCriteriaByRelation($config);
        }
        else
        {
            $this->modifyCriteriaDirectlyByRequestedValue();
        }

        return $this->object->criteria;
    }

    /**
     * This is the most simple case
     * We adjust main criteria by using $_POST or $_GET values directly
     * without using relationships or another models
     *
     * For example, we could use with avg_profile_rating column from BasicProfile model
     * We select records which have avg_profile_rating between Min and Max values that come from slider in form
     */

    private function modifyCriteriaDirectlyByRequestedValue()
    {
        if(is_numeric($this->requestArray[$this->requestVariable][$this->key . 'Min']) && is_numeric($this->requestArray[$this->requestVariable][$this->key . 'Max']))
        {
            // adjusting search criteria of out CDbCriteria

            if(!empty($this->object->criteria->condition))
            {
                $this->object->criteria->condition .= ' AND(' . $this->getColumn() . ' BETWEEN '
                    . $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Min'], 'Min') . ' AND '
                    . $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Max'])
                    . $this->getNullQueryExpression() .
                    ') ';
            }
            else
            {
                $this->object->criteria->condition .= ' (' . $this->getColumn() . ' BETWEEN '
                    . $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Min'],  'Min') . ' AND '
                    . $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Max'])
                    . $this->getNullQueryExpression() .
                    ') ';
            }
        }
    }

    /**
     * More difficult case
     * We adjust main criteria by using the relationship defined in BasicProfile
     *
     * @param $config
     */

    private function modifyCriteriaByRelation($config)
    {
        $addedCondition = $this->createCondition($config, true);

        $this->applyCondition($addedCondition);
    }

    /**
     * More difficult case
     * We adjust main criteria by using result of query to another model connected with main model
     *
     * As an example:
     *
     * Adjusting by SAT sum - we select those BasicProfile records that have
     * specified attribute lying between values from $_POST or $_GET
     *
     * For SAT sum we select those records that have
     * (SAT_Math + SAT_Critical_Read + SAT_Writing) in table ScoreProfile between values that come
     * from $_POST variables. These $_POST variables come from form slider
     *
     * @param $config
     */

    private function modifyCriteriaByAnotherModelAttribute($config)
    {
        $addedCondition = $this->createCondition($config, false);

        $this->applyCondition($addedCondition);
    }

    /**
     * Universal function for creating condition that we add to main model condition
     *
     * If $useRelation == true we use relationship defined in Main Model (BasicProfile as an example)
     * to add additional conditional to Main Model Criteria
     *
     * If $useRelation == false we use results of querying to another model (ScoreProfile as an example)
     * to add additional conditional to Main Model Criteria
     *
     * @param $config
     * @param boolean $useRelation - whether to use or not relations
     * @return string
     */

    private function createCondition($config, $useRelation)
    {
        $addedCondition = '';

        if($useRelation)
        {
            $anotherModel = $config['useAnotherModel']::model()->findAll();

            foreach ($anotherModel as $aModel)
            {
                if ($aModel->$config['useRelation'] >= $this->getMinRequestValue() && $aModel->$config['useRelation'] <= $this->getMaxRequestValue())
                {
                    $addedCondition .= 't.' . $config['mainModelAttribute'] . ' = "' . $aModel->$config['anotherModelAttribute'] . '" OR ';
                }
            }
        }
        else
        {
            $anotherModel = $this->constructAnotherModel($config);

            // constructing criteria condition of main table model

            if (!empty($anotherModel))
            {
                foreach ($anotherModel as $aModel)
                {
                    $addedCondition .= 't.' . $config['mainModelAttribute'] . ' = "' . $aModel->$config['mainModelAttribute'] . '" OR ';
                }
            }
            else
            {
                $addedCondition = $config['mainModelAttribute'] . ' = 0';
            }
        }

        if(strpos($addedCondition, '= 0') === FALSE)
        {
            $addedCondition = substr($addedCondition, 0, -3);
        }

        return $addedCondition;
    }

    /**
     * We use this method while constructing new condition for
     * case in which we are querying another model to modify main model criteria
     *
     * It returns model instance of another model
     *
     * @param $config
     * @return CActiveRecord
     */

    private function constructAnotherModel($config)
    {
        $anotherModelCriteria  = new CDbCriteria();
        $anotherModelCondition = '';

        if (is_array($config['anotherModelAttribute']))
        {
            foreach ($config['anotherModelAttribute'] as $fields)
            {
                $anotherModelCondition .= $fields . ' + ';
            }
        }
        else
        {
            $anotherModelCondition = $config['anotherModelAttribute'] . ' ';
        }

        // constructing criteria condition of related table model

        $anotherModelCondition = substr($anotherModelCondition, 0, -2);
        $anotherModelCondition .= 'BETWEEN ' . $this->getMinRequestValue();
        $anotherModelCondition .= ' AND ' . $this->getMaxRequestValue();

        // modifying criteria of related table model

        $anotherModelCriteria->condition = $anotherModelCondition;
        $anotherModel                    = $config['useAnotherModel']::model()->findAll($anotherModelCriteria);

        return $anotherModel;
    }

    /**
     * Getting Minimal value from $_POST or $_GET request (using slider for example)
     * @return string
     */

    private function getMinRequestValue()
    {
        return $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Min']);
    }

    /**
     * Getting Maximal value from $_POST or $_GET request (using slider for example)
     * @return string
     */

    private function getMaxRequestValue()
    {
        return $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Max']);
    }

    /**
     * Applying newly created condition to Main Model Criteria (Criteria for BasicProfile for example)
     * @param string $addedCondition
     */

    private function applyCondition($addedCondition)
    {
        if (!empty($this->object->criteria->condition))
        {
            $this->object->criteria->condition .= ' AND (' . $addedCondition . $this->getNullQueryExpression(true) . ') ';
        }
        else
        {
            $this->object->criteria->condition .= ' (' . $addedCondition . $this->getNullQueryExpression(true) . ') ';
        }
    }

    /**
     * @param int $index
     * @param string $key
     * @return string $return - correlated value from config array
     */

    private function getCorrelatedValue($index, $key = 'Max')
    {
        if(isset($this->config['valueCorrelation'][$index]))
        {
            if(strpos($this->config['valueCorrelation'][$index], '+') !== FALSE && $key !== 'Min')
            {
                return $this->config['valueCorrelation'][$index] + 10000;
            }
            if(strpos($this->config['valueCorrelation'][$index], '+') !== FALSE && $key === 'Min')
            {
                return str_replace('+', '', $this->config['valueCorrelation'][$index]);
            }
            return $this->config['valueCorrelation'][$index];
        }
        return $index;
    }

    /**
     * Method that allows adding IS NULL part of query to our CDbCriteria
     * @param bool $useRelation - whether to use related model attribute or not
     * @return string
     */

    private function getNullQueryExpression($useRelation = false)
    {
        $column = ($useRelation) ? $this->config['mainModelAttribute'] : $this->key;

        // Does we allow NULL in SQL QUERY?

        if(!empty($this->config['allowNull']) && $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Min'], 'Min') == 0)
        {
            return ' OR ' . $column . ' IS NULL';
        }

        return '';
    }

    /**
     * @return mixed
     */

    private function getColumn()
    {
        if(isset($this->config['expression']))
        {
            return $this->config['expression'];
        }
        return $this->key;
    }
}
?>
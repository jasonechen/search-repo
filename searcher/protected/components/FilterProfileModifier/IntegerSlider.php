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

        // in case of empty configuration for this modifier
        
        if(empty($config))
        {
            if(is_numeric($this->requestArray[$this->requestVariable][$this->key . 'Min']) &&
               is_numeric($this->requestArray[$this->requestVariable][$this->key . 'Max']))
            {
                // adjusting search criteria of out CDbCriteria
                
                if(!empty($this->object->criteria->condition))
                {
                    $this->object->criteria->condition .= ' AND(' . $this->key . ' BETWEEN '
                                                                 . $this->requestArray[$this->requestVariable][$this->key . 'Min'] . ' AND '
                                                                 . $this->requestArray[$this->requestVariable][$this->key . 'Max'] .') ';
                }
                else
                {
                    $this->object->criteria->condition .= ' (' . $this->key . ' BETWEEN '
                                                                 . $this->requestArray[$this->requestVariable][$this->key . 'Min'] . ' AND '
                                                                 . $this->requestArray[$this->requestVariable][$this->key . 'Max'] .') ';
                }
            }
        }
        else
        {
            // in case of not-empty configuration for this modifier

            if(!empty($config['useAnotherModel']) && !empty($config['anotherModelAttribute'])  && empty($config['useRelation']))
            {
                $anotherModelCriteria = new CDbCriteria();
                $anotherModelCondition = '';

                if(is_array($config['anotherModelAttribute']))
                {
                    foreach($config['anotherModelAttribute'] as $fields)
                    {
                        $anotherModelCondition .= $fields . ' + ';
                    }

                    // constructing criteria condition of related table model

                    $anotherModelCondition = substr($anotherModelCondition, 0, -2);
                    $anotherModelCondition .= 'BETWEEN ' . $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Min']);
                    $anotherModelCondition .= ' AND ' . $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Max']);

                    // modifying criteria of related table model

                    $anotherModelCriteria->condition = $anotherModelCondition;
                    $anotherModel = $config['useAnotherModel']::model()->findAll($anotherModelCriteria);

                    // constructing criteria condition of main table model

                    if(!empty($anotherModel))
                    {
                        $addedCondition = '';
                        foreach($anotherModel as $aModel)
                        {
                            $addedCondition .= $config['mainModelAttribute'] . ' = "' . $aModel->$config['mainModelAttribute'] .  '" OR ';
                        }
                        $addedCondition = substr($addedCondition, 0, -3);
                    }
                    else
                    {
                        $addedCondition = $config['mainModelAttribute'] . ' = 0';
                    }

                    // modifying criteria of main table model

                    if(!empty($this->object->criteria->condition))
                    {
                        $this->object->criteria->condition .= ' AND (' . $addedCondition .') ';
                    }
                    else
                    {
                            $this->object->criteria->condition .= ' (' . $addedCondition .') ';
                    }
                }
            }
            elseif(!empty($config['useAnotherModel']) && !empty($config['useRelation']))
            {
                $anotherModel = $config['useAnotherModel']::model()->findAll();

                $min = $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Min']);
                $max = $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Max']);

                $addedCondition = '';

                foreach($anotherModel as $aModel)
                {
                    if($aModel->$config['useRelation'] >= $min && $aModel->$config['useRelation'] <= $max)
                    {
                        $addedCondition .= $config['mainModelAttribute'] . ' = "' . $aModel->$config['anotherModelAttribute'] .  '" OR ';
                    }
                }

                $addedCondition = substr($addedCondition, 0, -3);

                // modifying criteria of main table model

                if(!empty($this->object->criteria->condition))
                {
                    $this->object->criteria->condition .= ' AND (' . $addedCondition .') ';
                }
                else
                {
                    $this->object->criteria->condition .= ' (' . $addedCondition .') ';
                }
            }
            else
            {
                if(is_numeric($this->requestArray[$this->requestVariable][$this->key . 'Min']) &&
                   is_numeric($this->requestArray[$this->requestVariable][$this->key . 'Max']))
                {
                    // adjusting search criteria of out CDbCriteria

                    if(!empty($this->object->criteria->condition))
                    {
                        $this->object->criteria->condition .= ' AND(' . $this->key . ' BETWEEN '
                                                                     . $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Min'], 'Min') . ' AND '
                                                                     . $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Max']) .') ';
                    }
                    else
                    {
                        $this->object->criteria->condition .= ' (' . $this->key . ' BETWEEN '
                                                                     . $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Min'],  'Min') . ' AND '
                                                                     . $this->getCorrelatedValue($this->requestArray[$this->requestVariable][$this->key . 'Max']) .') ';
                    }
                }
            }
        }
        return $this->object->criteria;
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
}

?>
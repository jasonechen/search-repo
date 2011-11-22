<?php

/**
 * Checkbox search modifier
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

class Checkbox extends AbstractModifier
{
    /**
     * redefinition of abstract method
     * @param string $config additional config if needed
     * @return CDbCriteria $criteria
     */

    public function modifyCriteria($config = '')
    {
        if(empty($config))
        {
            if(isset($this->requestArray[$this->requestVariable][$this->key]) && $this->requestArray[$this->requestVariable][$this->key])
            {
                if(!empty($this->object->criteria->condition))
                {
                    $this->object->criteria->condition .= ' AND (' . $this->key . ' = "Y") ';
                }
                else
                {
                    $this->object->criteria->condition .= ' (' . $this->key . ' = "Y") ';
                }
            }
        }
        else
        {
            if(isset($this->requestArray[$this->requestVariable][$this->key]) && $this->requestArray[$this->requestVariable][$this->key])
            {
                if(!empty($this->object->criteria->condition))
                {
                    $this->object->criteria->condition .= ' AND (' . $this->key . ' ' . $config['operator'] . ' ' . $config['value'] . ') ';
                }
                else
                {
                    $this->object->criteria->condition .= ' (' . $this->key . ' ' . $config['operator'] . ' ' . $config['value'] . ') ';
                }
            }
        }

        return $this->object->criteria;
    }
}

?>
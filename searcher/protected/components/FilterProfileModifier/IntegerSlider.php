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

    /**
     * redefinition of abstract method 
     * @param string $config additional config if needed
     * @return CDbCriteria $criteria
     */

    public function modifyCriteria($config = '')
    {
        if(!$this->checkRequestArrayForMinAndMaxValues())
        {
            return $this->object->criteria;
        }
        
        if(is_numeric($this->requestArray[$this->requestVariable][$this->key . 'Min']) &&
           is_numeric($this->requestArray[$this->requestVariable][$this->key . 'Max']))
        {
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
        return $this->object->criteria;
    }
}

?>
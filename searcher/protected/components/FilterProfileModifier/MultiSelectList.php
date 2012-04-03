<?php

/**
 * Checkbox list search modifier
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

class MultiSelectList extends AbstractModifier
{
    /**
     * redefinition of abstract method
     * @param string $config additional config if needed
     * @return CDbCriteria $criteria
     */


    public function modifyCriteria($config = '')
    {
        if(!empty($this->requestArray[$this->requestVariable][$this->key]))
        {
            $addedCondition = '';

            foreach($this->requestArray[$this->requestVariable][$this->key] as $var)
            {
                $addedCondition .= $this->key . '_' . $var . ' = 1 AND ';
            }

            $addedCondition = substr($addedCondition, 0, -4);

            if(!empty($this->object->criteria->condition))
            {
                $this->object->criteria->condition .= ' AND (' . $addedCondition .') ';
            }
            else
            {
                $this->object->criteria->condition .= ' (' . $addedCondition .') ';
            }
        }

        return $this->object->criteria;
    }
}

?>
<?php

/**
 * Radiobutton search modifier
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

class RadioButton extends AbstractModifier
{

    /**
     * redefinition of abstract method
     * @return \CDbCriteria criteria
     */

    public function modifyCriteria()
    {
        if(!empty($this->requestArray[$this->requestVariable][$this->key]))
        {
            if(!empty($this->object->criteria->condition))
            {
                $this->object->criteria->condition .= ' AND (' . $this->key . ' = "' . $this->requestArray[$this->requestVariable][$this->key]  .'") ';
            }
            else
            {
                $this->object->criteria->condition .= ' (' . $this->key . ' = "' . $this->requestArray[$this->requestVariable][$this->key]  .'") ';
            }
        }

        return $this->object->criteria;
    }
}

?>
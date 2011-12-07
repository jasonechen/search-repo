<?php

/**
 * DropDownList search modifier
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

class DropDownList extends AbstractModifier
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
            if(empty($config))
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
            else
            {
                if(!empty($config['useAnotherModel']) && !empty($config['anotherModelAttribute']))
                {
                    $model = call_user_func(array($config['useAnotherModel'], 'model'));
                    $anotherModel = $model->findAllByAttributes(
                        array(
                             $config['anotherModelAttribute'] => $this->requestArray[$this->requestVariable][$this->key],
                        )
                    );
                    if($anotherModel !== NULL && !empty($anotherModel))
                    {
                        $addedCondition = '';
                        foreach($anotherModel as $aModel)
                        {
                            $addedCondition .= 't.' . $config['mainModelAttribute'] . ' = "' . $aModel->$config['mainModelAttribute'] .  '" OR ';
                        }
                        $addedCondition = substr($addedCondition, 0, -3);
                    }
                    else
                    {
                        $addedCondition = 't.' . $config['mainModelAttribute'] . ' = 0';
                    }
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
        }

        return $this->object->criteria;
    }
}

?>
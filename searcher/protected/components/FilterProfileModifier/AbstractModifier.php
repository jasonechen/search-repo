<?php

/**
 * Abstract search modifier
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

abstract class AbstractModifier
{
    /**
     * @var /AbstractProfileSearch $object instance of profile search object
     */

    public $object;
    public $key;
    public $requestArray;
    public $requestVariable;

    /**
     * @abstract function for criteria modification
     * @param string $config additional config if needed
     * @return void
     */
    
    abstract public function modifyCriteria($config = '');

    /**
     * default constructor
     * @param $object
     * @param $key
     */

    public function __construct($object, $key)
    {
        $this->object = $object;
        $this->key = $key;
        $this->requestArray = $this->object->requestArray;
        $this->requestVariable = $this->object->requestVariable;
    }

    /**
     * @param $criteria
     * @return void
     */

    public function setCriteria($criteria)
    {
        $this->object->criteria = $criteria;
    }

    /**
     * @return CDbCriteria
     */

    public function getCriteria()
    {
        return $this->object->criteria;
    }

    /**
     * @return bool
     */

    protected function checkRequestArrayForMinAndMaxValues()
    {
        if(!isset($this->requestArray[$this->requestVariable][$this->key . 'Min']) || (!isset($this->requestArray[$this->requestVariable][$this->key . 'Max'])))
        {
            return false;
        }
        return true;
    }
}

?>
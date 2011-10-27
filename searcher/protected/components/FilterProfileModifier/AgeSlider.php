<?php

/**
 * Age slider search modifier
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

class AgeSlider extends AbstractModifier
{
    /**
     * @var array $ages age ranges
     */
    
    private $ages = array(
        '0' => '0-21',
        '1' => '21-25',
        '2' => '26-30',
        '3' => '31-35',
        '4' => '36-40',
        '5' => '41-50',
        '6' => '51-60',
        '7' => '61-100',
    );

    /**
     * redefinition of abstract method
     * @return \CDbCriteria criteria
     */

    public function modifyCriteria()
    {
        if(is_numeric($this->requestArray[$this->requestVariable][$this->key . 'Min']) &&
           is_numeric($this->requestArray[$this->requestVariable][$this->key . 'Max']))
        {
            if(!empty($this->object->criteria->condition))
            {
                if($this->requestArray[$this->requestVariable][$this->key . 'Max'] == $this->requestArray[$this->requestVariable][$this->key . 'Min'])
                {
                    $this->object->criteria->condition .= ' AND(' . $this->key . ' BETWEEN "'
                                                             . $this->returnMaxDateForAgeRange($this->requestArray[$this->requestVariable][$this->key . 'Min']) . '" AND "'
                                                             . $this->returnMinDateForAgeRange($this->requestArray[$this->requestVariable][$this->key . 'Min']) .'") ';
                }
                else
                {
                    $this->object->criteria->condition .= ' AND(' . $this->key . ' BETWEEN "'
                                                             . $this->returnMaxDateForAgeRange($this->requestArray[$this->requestVariable][$this->key . 'Max']) . '" AND "'
                                                             . $this->returnMinDateForAgeRange($this->requestArray[$this->requestVariable][$this->key . 'Min']) .'") ';
                }
            }
            else
            {
                if($this->requestArray[$this->requestVariable][$this->key . 'Max'] == $this->requestArray[$this->requestVariable][$this->key . 'Min'])
                {
                    $this->object->criteria->condition .= ' (' . $this->key . ' BETWEEN "'
                                                             . $this->returnMaxDateForAgeRange($this->requestArray[$this->requestVariable][$this->key . 'Min']) . '" AND "'
                                                             . $this->returnMinDateForAgeRange($this->requestArray[$this->requestVariable][$this->key . 'Min']) .'") ';
                }
                else
                {
                    $this->object->criteria->condition .= ' (' . $this->key . ' BETWEEN "'
                                                             . $this->returnMaxDateForAgeRange($this->requestArray[$this->requestVariable][$this->key . 'Max']) . '" AND "'
                                                             . $this->returnMinDateForAgeRange($this->requestArray[$this->requestVariable][$this->key . 'Min']) .'") ';
                }
            }
        }
        return $this->object->criteria;
    }

    /**
     * @param $from
     * @return string
     */

    private function returnMaxDateForAgeRange($from)
    {
        $fromArray = explode('-', $this->ages[$from]);
        $result = (date("Y") - $fromArray[1]) . '-' . date("m") . '-' . date("d");
        return $result;
    }

    /**
     * @param $to
     * @return string
     */

    private function returnMinDateForAgeRange($to)
    {
        $toArray = explode('-', $this->ages[$to]);
        $result = (date("Y") - $toArray[0]) . '-' . date("m") . '-' . date("d");
        return $result;
    }
}

?>
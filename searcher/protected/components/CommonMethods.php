<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonMethods
 *
 * @author JKP
 */

class CommonMethods extends CController
{

    /**
     * Returns list of months
     *
     * @static
     * @return array
     */

    public static function getMonth()
    {
        $months = array(
            '01' => 'January',
            '02' => 'February',
            '03' =>'March',
            '04' => 'April',
            '05'=>'May',
            '06'=>'June',
            '07'=>'July',
            '08'=>'August',
            '09'=>'September',
            '10'=>'October',
            '11'=>'November',
            '12'=>'December',
        );

        return $months;
    }

    /**
     * @static
     * @return array
     */
    
    public static function getYear()
    {
        $year = array();
        $syear = (int)date('Y');

        for($i = 0; $i <= 100; $i++)
        {
            $value = $syear+$i;
            $year[$value] = $value;
        }
        
        return $year;
    }

    /**
     * @static
     * @param $id
     * @return mixed
     */

    public static function getPaymentType($id)
    {
        // return $id;
        $paymenttype = array(1 => 'Credit Card ', 2 => 'Paypal', 3 => 'Google Checkout');
        return $paymenttype[$id];
    }

    /**
     * @static
     * @param $date
     * @return string
     */
    
    public static function DateFormateUiToMysql($date)
    {
        $rtnValue = '';

        if(!empty($date))
        {
            $temp_date = explode("/", $date);
            $rtnValue = $temp_date[2] . "-" . $temp_date[0] . "-" . $temp_date[1];
        }

        return $rtnValue;
    }

    /**
     * @static
     * @param $date
     * @return string
     */

    public static function DateFormateMySqlToUi($date)
    {
        $rtnValue = '';

        if(!empty ($date))
        {
            $temp_date = explode("-", $date);
            $rtnValue = $temp_date[1] . "/" . $temp_date[2] . "/" . $temp_date[0];
        }

         return $rtnValue;
    }

    /**
     * Returns states array
     *
     * @static
     * @return array
     */
    
    public static function getStates()
    {
        return CHtml::listData(States::model()->findAll(), 'abbr', 'name');
    }

    /**
     * Returns countries array
     *
     * @static
     * @return array
     */
    
    public static function getCountry()
    {
        return CHtml::listData(CitizenType::model()->findAll(), 'name', 'name');
    }

    /**
     * Returns all countries list that could be used for <select> tag
     *
     * @static
     * @return array
     */

    public static function getAllCountriesList()
    {
        return CHtml::listData(CitizenType::model()->findAll(), 'id', 'name');
    }
}

?>

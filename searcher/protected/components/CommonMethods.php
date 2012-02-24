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

class CommonMethods extends CController {
    //put your code here
    public static function getMonth()
    {
       $months = array(
               '01'=> 'January',
               '02'=> 'February',
                '03'=>'March',
                '04'=>'April',
                '05'=>'May',
                '06'=>'June',
                '07'=>'July ',
                '08'=>'August',
                '09'=>'September',
               '10'=>'October',
               '11'=>'November',
               '12'=>'December',
            );

        return $months;
    }
    
    public static function getYear()
    {
        $year=array();
        $syear= (int)date('Y');
        
        
        for($i=0;$i<=100;$i++)
        {
            $value = $syear+$i;
            $year[$value]= $value;
            
        }
        
        return $year;
    }
    public static function getPaymentType($id)
    {
       // return $id;
        $paymenttype =array(1=>'Credit Card ',2=>'Paypal',3=>'Google Checkout');
        return $paymenttype[$id];
    }
    
        public static function DateFormateUiToMysql($date)
    {
        $rtnValue='';
        if(!empty ($date))
        {
            $temp_date = explode("/",$date);
            $rtnValue = $temp_date[2]."-".$temp_date[0]."-".$temp_date[1];
        }
        return $rtnValue;
    }
    public static function DateFormateMySqlToUi($date)
    {
        $rtnValue='';
        if(!empty ($date))
        {
            $temp_date = explode("-",$date);
            $rtnValue = $temp_date[1]."/".$temp_date[2]."/".$temp_date[0];
        }
         return $rtnValue;
    }
    
    public static function getStates()
    {
        return CHtml::listData(States::model()->findAll(), 'abbr', 'name');
    }
    
    public static function getCountry()
    {
        return CHtml::listData(CitizenType::model()->findAll(), 'name', 'name');
    }
    
}

?>

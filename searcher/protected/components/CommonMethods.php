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
    
    public static function getStates($isId=false)
    {
        $key = $isId?'id':'abbr';
        return CHtml::listData(States::model()->findAll(), $key, 'name');
    }

    /**
     * Returns countries array
     *
     * @static
     * @return array
     */
    
    public static function getCountry($isId=false)
    {
         $key = $isId?'id':'name';
        return CHtml::listData(CitizenType::model()->findAll(), $key, 'name');
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

    public static function getAllowMailPattern($utype='')
    {
        $supportFrmt = '';
        switch ($utype)
        {
            case 'B':
               $supportFrmt=Yii::app()->params['buyerEmailPattern'];
               break;
           case 'S':
               $supportFrmt=Yii::app()->params['sellerEmailPattern'];
               break;
           default :
               $supportFrmt=Yii::app()->params['emailPattern'];
               break;
                
        }
        return $supportFrmt;
        
    }
    public static function getAllowdExtP_Verification()
    {
        return Yii::app()->params['upload_file_formate'] ;
    }
    public static function getMaxSizeofAllow()
    {
        return Yii::app()->params['upload_max_file'];
    }
    public static function getNotSupportPattern($utype='')
    {
        $supportFrmt = '';
        switch ($utype)
        {
            case 'B':
               $supportFrmt=Yii::app()->params['nt_buyerDomain'];
               break;
           case 'S':
               $supportFrmt=Yii::app()->params['nt_sellerDomain'];
               break;
         
                
        }
        return $supportFrmt;
        
    }
    
       /**
     * @static
     * @param $userid,$activestatus,$byStatus
     * @example $bySts is all the Referral user list  
     * @return count
     */
    public static function getCount($id,$sts=1,$bySts=FALSE)
    {
        
        $whr = 'user_id='.$id;
        $whr = $bySts? $whr: $whr.' and active = '.$sts;
        $count = ReferFriend::model()->count($whr);
        return $count;
    }
    
    /**
     * 
     * Get user status
     * 
     * @param integer $status
     * @return string
     */
    public static function getUserStatus($status)
    {
    	$list = array(
    		1 => 'Active',
    		0=> 'Inactive',
    		-1 => 'Blocked'
    	);
    	
    	return (isset($list[$status])) ? $list[$status] : 'Inactive';
    }
    
}

?>

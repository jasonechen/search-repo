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
     *          params $id, $activestatus, $byStatus
     *
     * @param $id
     * @param $sts
     * @param $bySts
     *
     * @example $bySts is all the Referral user list
     * @return int $count
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

    /**
     * Method used for filtering incoming search query from bad characters
     *
     * @static
     * @param $str
     * @return mixed|string
     */

    public static function weakFiltering($str)
    {
        $str = strip_tags($str);
        $str = preg_replace("/[^a-zA-Z0-9\s]/", "", $str);

        return $str;
    }

    /**
     * Returning synonyms of schools for purposes of searching for keywords like 'mit' => 'massachusettsinstituteoft'
     *
     * @static
     * @return array
     */

    public static function returnSchoolSynonyms()
    {
        return array(
            'bsc'          => 'birminghamsoutherncollege',
            'bju'          => 'bobjonesuniversity',
            'byu'          => 'brighamyounguniversity',
            'caltech'      => 'californiainstituteoftechnology',
            'ccsu'         => 'centralconnecticutstateuniversity',
            'cmsu'         => 'centralmissouristateuniversity',
            'cnu'          => 'christophernewportuniversity',
            'cmc'          => 'claremontmckennacollege',
            'ccu'          => 'coastalcarolinauniversity',
            'dpu'          => 'depauluniversity',
            'ecu'          => 'eastcarolinauniversity',
            'etsu'         => 'easttennesseestateuniversity',
            'emu'          => 'easternmichiganuniversity',
            'enc'          => 'easternnazarenecollege',
            'ewu'          => 'easternwashingtonuniversity',
            'fdu'          => 'fairleighdickinsonuniversity',
            'famu'         => 'floridaa&muniversity',
            'fgcu'         => 'floridagulfcoastuniversity',
            'fiu'          => 'floridainternationaluniversity',
            'fsu'          => 'floridastateuniversity',
            'gmu'          => 'georgemasonuniversity',
            'georgiatech'  => 'georgiainstituteoftechnology',
            'gvsu'         => 'grandvalleystateuniversity',
            'hiu'          => 'hamptonuniversity',
            'iit'          => 'illinoisinstituteoftechnology',
            'iup'          => 'indianauniversityofpennsylvania',
            'jmu'          => 'jamesmadisonuniversity',
            'jhu'          => 'johnshopkinsuniversity',
            'jwu'          => 'johnsonandwalesuniversity',
            'lssu'         => 'lakesuperiorstateuniversity',
            'liu'          => 'longislanduniversity',
            'lsu'          => 'louisianastateuniversity',
            'latech'       => 'louisianatechuniversity',
            'luc'          => 'loyolauniversitychicago',
            'lsc'          => 'lyndonstatecollege',
            'mcla'         => 'massachusettscollegeofliberalarts',
            'mit'          => 'massachusettsinstituteoftechnology',
            'mtsu'         => 'middletennesseestateuniversity',
            'muw'          => 'mississippiuniversityforwomen',
            'mvsu'         => 'mississippivalleystateuniversity',
            'nmsu'         => 'newmexicostateuniversity',
            'nymc'         => 'newyorkmedicalcollege',
            'nyu'          => 'newyorkuniversity',
            'nccu'         => 'northcarolinacentraluniversity',
            'ndsu'         => 'northdakotastateuniversity',
            'nau'          => 'northernarizonauniversity',
            'niu'          => 'northernillinoisuniversity',
            'nmu'          => 'northernmichiganuniversity',
            'oxy'          => 'occidentalcollege',
            'onu'          => 'ohionorthernuniversity',
            'ocu'          => 'oklahomacityuniversity',
            'oru'          => 'oralrobertsuniversity',
            'plnu'         => 'pointlomanazareneuniversity',
            'pvamu'        => 'prairieviewa&muniversity',
            'rmwc'         => 'randolphmaconwoman\'scollege',
            'rpi'          => 'rensselaerpolytechnicinstitute',
            'risd'         => 'rhodeislandschoolofdesign',
            'rwu'          => 'rogerwilliamsuniversity',
            'sjfc'         => 'saintjohnfishercollege',
            'sfsu'         => 'sanfranciscostateuniversity',
            'sjsu'         => 'sanjos?stateuniversity',
            'spu'          => 'seattlepacificuniversity',
            'sru'          => 'slipperyrockuniversityofpennsylvania',
            'sosu'         => 'southeasternoklahomastateuniversity',
            'siue'         => 'southernillinoisuniversityedwardsville',
            'smu'          => 'southernmethodistuniversity',
            'suu'          => 'southernutahuniversity',
            'shc'          => 'springhillcollege',
            'tcu'          => 'texaschristianuniversity',
            'ttu'          => 'texastechuniversity',
            'tcnj'         => 'thecollegeofnewjersey',
            'w&m'          => 'thecollegeofwilliam&mary',
            'uncg'         => 'theuniversityofnorthcarolinaatgreensboro',
            'navy'         => 'u.s.navalacademy',
            'usafa'        => 'unitedstatesairforceacademy',
            'westpoint'    => 'unitedstatesmilitaryacademy',
            'uab'          => 'universityofalabamaatbirmingham',
            'uah'          => 'universityofalabamaathuntsville',
            'uaa'          => 'universityofalaskaanchorage',
            'ualr'         => 'universityofarkansasatlittlerock',
            'uam'          => 'universityofarkansasatmonticello',
            'uapb'         => 'universityofarkansasatpinebluff',
            'uci'          => 'universityofcalifornia,irvine',
            'ucla'         => 'universityofcalifornia,losangeles',
            'ucr'          => 'universityofcalifornia,riverside',
            'ucsd'         => 'universityofcalifornia,sandiego',
            'ucsf'         => 'universityofcalifornia,sanfrancisco',
            'ucsb'         => 'universityofcalifornia,santabarbara',
            'uco'          => 'universityofcentraloklahoma',
            'ucd'          => 'universityofcoloradodenver',
            'uconn'        => 'universityofconnecticut',
            'udm'          => 'universityofdetroitmercy',
            'olemiss'      => 'universityofmississippi',
            'mizzou'       => 'universityofmissouri',
            'unlv'         => 'universityofnevada,lasvegas',
            'unm'          => 'universityofnewmexico',
            'uncw'         => 'universityofnorthcarolinaatwilmington',
            'unf'          => 'universityofnorthflorida',
            'usd'          => 'universityofsandiego',
            'usfca'        => 'universityofsanfrancisco',
            'usao'         => 'universityofscienceandartsofoklahoma',
            'utd'          => 'universityoftexasatdallas',
            'utep'         => 'universityoftexasatelpaso',
            'utsa'         => 'universityoftexasatsanantonio',
            'utpb'         => 'universityoftexasofthepermianbasin',
            'udc'          => 'universityofthedistrictofcolumbia',
            'uvm'          => 'universityofvermont',
            'uva'          => 'universityofvirginia',
            'udub'         => 'universityofwashington',
            'uwf'          => 'universityofwestflorida',
            'uvu'          => 'utahvalleyuniversity',
            'vcu'          => 'virginiacommonwealthuniversity',
            'vmi'          => 'virginiamilitaryinstitute',
            'virginiatech' => 'virginiapolytechnicinstituteandstateuniversity',
            'wfu'          => 'wakeforestuniversity',
            'wazzu'        => 'washingtonstateuniversity',
            'washu'        => 'washingtonuniversityinst.louis',
            'wvu'          => 'westvirginiauniversity',
            'wpi'          => 'worcesterpolytechnicinstitute',
            'ysu'          => 'youngstownstateuniversity',
            'pennstate'    => 'pennsylvaniastateuniversity',
            'ucf'          => 'universityofcentralflorida',
            'umkc'         => 'universityofmissouri–kansascity',
        );
    }
}

?>

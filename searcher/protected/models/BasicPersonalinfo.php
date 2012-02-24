<?php


	class BasicPersonalinfo  extends ProfileActiveRecord
	{
		
		
		 public static $ProfileTypeArray
          = array(''=>'Select',
                 1=>'Average Joe',
                 2=>'Nerd',
                 3=>'Brain',
                 4=>'Jock',
                 5=>'Student Leader',
                 6=>'Musician',
                 7=>'Artist',
                 8=>'Well-rounded',
                 9=>'Rebel',
                 10=>'Class Clown',
                 11=>'Loner',
                 12=>'Mean Girl',
                 13=>'Cool Kid',
                 14=>'Skater',
                 15=>'Goth/Punk',
                 16=>'Gym Rat',
                 17=>'Rich Kid', 
               );
	
	
		 public static $SATRangeArray 
          = array("NA","2310 to 2400","2210 to 2300","2110 to 2200",
              "2010 to 2100","1910 to 2000","1810 to 1900",
              "1710 to 1800","1610 to 1700","1510 to 1600",
              "1410 to 1500","1310 to 1400","1210 to 1300",
              "1110 to 1200","1010 to 1100","910 to 1000",
              "810 to 900","710 to 800","600 to 700");    
			  
	public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }		  
			  
	 public function tableName()
    {
        return 'tbl_basic_profile';
    }		  
	
	public function rules()
	{ 
		return array(
        array('nickname,highSchoolType,profile_type', 'required'),
       
      );
	}
		
	
	public function attributeLabels()
		{
			return array(
				'nickname'=>'Nickname (will be displayed) ',
			);
		}
		
	
	}

?>
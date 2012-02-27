<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class GenerateForm extends CFormModel
{
	public $number;

        public static $HSTypeArray 
          = array('PUB',
                    'PRN',
                    'PRR',
                    'HOM',
                    'CHR',
                    'OTH');  
               
        public static $SubjectTypeArray  
        = array(
          array('id'=>1,'name'=>'Algebra I'),
          array('id'=>2,'name'=>'Algebra II'),
          array('id'=>3,'name'=>'Anatomy'),
          array('id'=>4,'name'=>'Art History'),
          array('id'=>5,'name'=>'Astronomy'),
          array('id'=>6,'name'=>'Automotive'),
          array('id'=>7,'name'=>'Biology'),
          array('id'=>8,'name'=>'Business'),
          array('id'=>9,'name'=>'Calculus 2'),
          array('id'=>10,'name'=>'Calculus I'),
          array('id'=>11,'name'=>'Chemistry'),
          array('id'=>12,'name'=>'Civics'),
          array('id'=>13,'name'=>'Computer Science'),
          array('id'=>14,'name'=>'Cooking'),
          array('id'=>15,'name'=>'Drawing'),
          array('id'=>16,'name'=>'Earth Science'),
          array('id'=>17,'name'=>'Economics'),
          array('id'=>18,'name'=>'English'),
          array('id'=>19,'name'=>'Environmental Science'),
          array('id'=>20,'name'=>'Ethnic Studies'),
          array('id'=>21,'name'=>'Film Art'),
          array('id'=>22,'name'=>'Food Science'),
          array('id'=>23,'name'=>'French'),
          array('id'=>24,'name'=>'General Art'),
          array('id'=>25,'name'=>'General Science'),
          array('id'=>26,'name'=>'Geography'),
          array('id'=>27,'name'=>'Geometry'),
          array('id'=>28,'name'=>'German'),
          array('id'=>29,'name'=>'Grammar'),
          array('id'=>30,'name'=>'Health'),
          array('id'=>31,'name'=>'Home Economics'),
          array('id'=>32,'name'=>'Italian'),
          array('id'=>33,'name'=>'Japanese'),
          array('id'=>34,'name'=>'Latin'),
          array('id'=>35,'name'=>'Life Science'),
          array('id'=>36,'name'=>'Literature'),
          array('id'=>37,'name'=>'Mandarin'),
          array('id'=>38,'name'=>'Music'),
          array('id'=>39,'name'=>'Photography'),
          array('id'=>40,'name'=>'Physical Science'),
          array('id'=>41,'name'=>'Physics'),
          array('id'=>42,'name'=>'Pre-Algebra'),
          array('id'=>43,'name'=>'Psychology'),
          array('id'=>44,'name'=>'Russian'),
          array('id'=>45,'name'=>'Social Studies'),
          array('id'=>46,'name'=>'Sociology'),
          array('id'=>47,'name'=>'Space Science'),
          array('id'=>48,'name'=>'Spanish'),
          array('id'=>49,'name'=>'Trigonometry'),
          array('id'=>50,'name'=>'US Government'),
          array('id'=>51,'name'=>'US History'),
          array('id'=>52,'name'=>'Vocabulary'),
          array('id'=>53,'name'=>'World History'),
          array('id'=>54,'name'=>'Writing')
        );

        public static $LanguageTypeArray = array(
          array('id'=>'A0','name'=>''),
          array('id'=>'A1','name'=>'Albanian'),
          array('id'=>'A2','name'=>'Amharic'),
          array('id'=>'A3','name'=>'Arabic'),
          array('id'=>'A4','name'=>'Armenian'),
          array('id'=>'A5','name'=>'Assamese'),
          array('id'=>'A6','name'=>'Azerbaijani'),
          array('id'=>'A7','name'=>'Belarusian'),
          array('id'=>'A8','name'=>'Bengali'),
          array('id'=>'A9','name'=>'Bhojpuri'),
          array('id'=>'AA','name'=>'Bulgarian'),
          array('id'=>'AB','name'=>'Burmese'),
          array('id'=>'AC','name'=>'Cantonese'),
          array('id'=>'AD','name'=>'Cebuano'),
          array('id'=>'AE','name'=>'Chhattisgarhi'),
          array('id'=>'AF','name'=>'Czech'),
          array('id'=>'AG','name'=>'Danish'),
          array('id'=>'AH','name'=>'Dutch'),
          array('id'=>'AI','name'=>'Finnish'),
          array('id'=>'AJ','name'=>'French'),
          array('id'=>'AK','name'=>'Gan'),
          array('id'=>'AL','name'=>'German'),
          array('id'=>'AM','name'=>'Greek'),
          array('id'=>'AN','name'=>'Gujarati'),
          array('id'=>'AO','name'=>'Haitian'),
          array('id'=>'AP','name'=>'Hausa'),
          array('id'=>'AQ','name'=>'Herbrew'),
          array('id'=>'AR','name'=>'Hindi-Urdu'),
          array('id'=>'AS','name'=>'Hunanese'),
          array('id'=>'AT','name'=>'Hungarian'),
          array('id'=>'AU','name'=>'Igbo'),
          array('id'=>'AV','name'=>'Italian'),
          array('id'=>'AW','name'=>'Japanese'),
          array('id'=>'AX','name'=>'Javanese'),
          array('id'=>'AY','name'=>'Kannada'),
          array('id'=>'AZ','name'=>'Kazakh'),
          array('id'=>'BA','name'=>'Khmer'),
          array('id'=>'BB','name'=>'Korean'),
          array('id'=>'BC','name'=>'Kurdish'),
          array('id'=>'BD','name'=>'Lao-Isan'),
          array('id'=>'BE','name'=>'Latin'),
          array('id'=>'BF','name'=>'Maithili'),
          array('id'=>'BG','name'=>'Malagasy'),
          array('id'=>'BH','name'=>'Malay'),
          array('id'=>'BI','name'=>'Mandarin'),
          array('id'=>'BJ','name'=>'Marathi'),
          array('id'=>'BK','name'=>'Marwari'),
          array('id'=>'BL','name'=>'Northern Berber'),
          array('id'=>'BM','name'=>'Oriya'),
          array('id'=>'BN','name'=>'Oromo'),
          array('id'=>'BO','name'=>'Pashto'),
          array('id'=>'BP','name'=>'Persian'),
          array('id'=>'BQ','name'=>'Polish'),
          array('id'=>'BR','name'=>'Portugese'),
          array('id'=>'BS','name'=>'Punjabi'),
          array('id'=>'BT','name'=>'Rajasthani'),
          array('id'=>'BU','name'=>'Rangpuri'),
          array('id'=>'BV','name'=>'Romanian'),
          array('id'=>'BW','name'=>'Russian'),
          array('id'=>'BX','name'=>'Serbo-Croatian'),
          array('id'=>'BY','name'=>'Shanghainese'),
          array('id'=>'BZ','name'=>'Sindhi'),
          array('id'=>'CA','name'=>'Sinhalese'),
          array('id'=>'CB','name'=>'Spanish'),
          array('id'=>'CD','name'=>'Sudanese'),
          array('id'=>'CE','name'=>'Swedish'),
          array('id'=>'CF','name'=>'Tagalog'),
          array('id'=>'CG','name'=>'Taiwanese'),
          array('id'=>'CH','name'=>'Tamil'),
          array('id'=>'CI','name'=>'Thai'),
          array('id'=>'CJ','name'=>'Turkish'),
          array('id'=>'CK','name'=>'Ukranian'),
          array('id'=>'CL','name'=>'Uzbek'),
          array('id'=>'CM','name'=>'Vietnamese'),
          array('id'=>'CN','name'=>'Yoruba'),
          array('id'=>'CO','name'=>'Zhuang')
        );

        public static $SportTypeArray = array(
          array('id'=>'ARC','name'=>'Archery'),
          array('id'=>'BAD','name'=>'Badminton'),
          array('id'=>'BAS','name'=>'Baseball'),
          array('id'=>'BOW','name'=>'Bowling'),
          array('id'=>'BOX','name'=>'Boxing'),
          array('id'=>'BSK','name'=>'Basketball'),
          array('id'=>'CHE','name'=>'Cheerleading'),
          array('id'=>'DIV','name'=>'Diving'),
          array('id'=>'FBL','name'=>'Football'),
          array('id'=>'FEN','name'=>'Fencing'),
          array('id'=>'FHC','name'=>'Field Hockey'),
          array('id'=>'GLF','name'=>'Golf'),
          array('id'=>'GYM','name'=>'Gymnastics'),
          array('id'=>'HOR','name'=>'Horseback Riding'),
          array('id'=>'IHC','name'=>'Ice Hockey'),
          array('id'=>'LAX','name'=>'Lacrosse'),
          array('id'=>'MAR','name'=>'Martial Arts'),
          array('id'=>'OTH','name'=>'Other'),
          array('id'=>'RAC','name'=>'Racquetball'),
          array('id'=>'RIF','name'=>'Riflery'),
          array('id'=>'ROD','name'=>'Rodeo'),
          array('id'=>'ROW','name'=>'Rowing (crew)'),
          array('id'=>'RUG','name'=>'Rugby'),
          array('id'=>'SAI','name'=>'Sailing'),
          array('id'=>'SBL','name'=>'Softball'),
          array('id'=>'SKI','name'=>'Skiing'),
          array('id'=>'SOC','name'=>'Soccer'),
          array('id'=>'SQH','name'=>'Squash'),
          array('id'=>'SWM','name'=>'Swimming'),
          array('id'=>'TEN','name'=>'Tennis'),
          array('id'=>'TNF','name'=>'Track and Field'),
          array('id'=>'TTN','name'=>'Table Tennis'),
          array('id'=>'VBL','name'=>'Volleyball'),
          array('id'=>'WPL','name'=>'Water Polo'),
          array('id'=>'WRE','name'=>'Wrestling'),
          array('id'=>'XCO','name'=>'Cross-Country')
        );

        
        public static $SAT2TypeArray = array(
              array('id'=>'CH','subject'=>'Chemistry'),
              array('id'=>'CL','subject'=>'Chinese with Listening'),
              array('id'=>'EB','subject'=>'Ecological Biology'),
              array('id'=>'FL','subject'=>'French with Listening'),
              array('id'=>'FR','subject'=>'French'),
              array('id'=>'GL','subject'=>'German with Listening'),
              array('id'=>'GM','subject'=>'German'),
              array('id'=>'IT','subject'=>'Italian'),
              array('id'=>'JL','subject'=>'Japanese with Listening'),
              array('id'=>'KL','subject'=>'Korean with Listening'),
              array('id'=>'LR','subject'=>'Literature'),
              array('id'=>'LT','subject'=>'Latin'),
              array('id'=>'M1','subject'=>'Mathematics Level 1'),
              array('id'=>'M2','subject'=>'Mathematics Level 2'),
              array('id'=>'MB','subject'=>'Molecular Biology'),
              array('id'=>'MH','subject'=>'Modern Hebrew'),
              array('id'=>'PH','subject'=>'Physics'),
              array('id'=>'SL','subject'=>'Spanish with Listening'),
              array('id'=>'SP','subject'=>'Spanish'),
              array('id'=>'UH','subject'=>'U.S. History'),
              array('id'=>'WH','subject'=>'World History')
            );
        
        public static $APTypeArray = array(
              array('id'=>'AB','name'=>'Calculus AB'),
              array('id'=>'AH','name'=>'Art History'),
              array('id'=>'BC','name'=>'Calculus BC'),
              array('id'=>'BI','name'=>'Biology'),
              array('id'=>'CG','name'=>'Comp Government and Politics'),
              array('id'=>'CH','name'=>'Chemistry'),
              array('id'=>'CL','name'=>'Chinese Language and Culture'),
              array('id'=>'CS','name'=>'Computer Science A'),
              array('id'=>'EH','name'=>'European History'),
              array('id'=>'EL','name'=>'English Literature'),
              array('id'=>'EN','name'=>'English Language'),
              array('id'=>'ES','name'=>'Environmental Science'),
              array('id'=>'FL','name'=>'French Language and Culture'),
              array('id'=>'GL','name'=>'German'),
              array('id'=>'HG','name'=>'Human Geography'),
              array('id'=>'JL','name'=>'Japanese Language and Culture'),
              array('id'=>'LV','name'=>'Latin: Vergil'),
              array('id'=>'MA','name'=>'Macroeconomics'),
              array('id'=>'MI','name'=>'Microeconomics'),
              array('id'=>'MT','name'=>'Music Theory'),
              array('id'=>'PB','name'=>'Physics B'),
              array('id'=>'PC','name'=>'Physics C'),
              array('id'=>'PS','name'=>'Psychology'),
              array('id'=>'SA','name'=>'Studio Art'),
              array('id'=>'SL','name'=>'Spanish Literature'),
              array('id'=>'SP','name'=>'Spanish Language'),
              array('id'=>'ST','name'=>'Statistics'),
              array('id'=>'UG','name'=>'U.S. Government and Politics'),
              array('id'=>'UH','name'=>'U.S. History'),
              array('id'=>'WH','name'=>'World History')
            );

        public static $ReverseMap
          = array(
                  "0"=>"0",
                  "1"=>"1",
                  "2"=>"2",
                  "3"=>"3",
                  "4"=>"4",
                  "5"=>"5",
                  "6"=>"6",
                  "7"=>"7",
                  "8"=>"8",
                  "9"=>"9",
                  "A"=>"10",
                  "B"=>"11",
                  "C"=>"12",
                  "D"=>"13",
                  "E"=>"14",
                  "F"=>"15",
                  "G"=>"16",
                  "H"=>"17",
                  "I"=>"18",
                  "J"=>"19",
                  "K"=>"20",
                  "L"=>"21",
                  "M"=>"22",
                  "N"=>"23",
                  "O"=>"24",
                  "P"=>"25",
                  "Q"=>"26",
                  "R"=>"27",
                  "S"=>"28",
                  "T"=>"29",
                  "U"=>"30",
                  "V"=>"31",
                  "W"=>"32",
                  "X"=>"33",
                  "Y"=>"34",
                  "Z"=>"35",
              
                );
        
        public static $CityArray
          = array("New York",
                  "Los Angeles",
                  "San Francisco",
                  "Moscow",
                  "London",
                  "Paris",
               );
        
         public static $NationalMeritArray = array('','N','S','M','F');
 
         
        /* Note that we can only have 36 different activities due to the nature of the generator */ 
        public static $ActivityArray
          = array("Quiz Bowl",
                  "Model UN",
                  "Glee Club",
                  "Christian Club",
                  "Investment Club",
                  "French Exchange CLub",
                  "Debate Club",
                  "Recycling Club",
                  "French Club",
                  "Science Club",
                  "TV Studio",
                  "Honor Society",
                  "Italian Club",
              
               );
        
        public static $ActivityTypeArray
          = array("AK",
                  "AL",
                  "AV",
                  "AR",
                  "AC",
                  "AI",
                  "AF",
                  "AH",
                  "AJ",
                  "AS",
                  "AP",
                  "AA",
                  "AG",
               );
        
        public static $AwardArray
          = array("Future Leaders of America",
                  "USAToday AllUSA Academic Team",
                  "Book Award",
                  "Community Service Award",
                    "A Award",
                    "B Award",
                    "C Award",
                    "D Award",
                    "E Award",
                    "F Award",
                    "G Award",
                    "H Award",
               );
        
        public static $CompetitionArray
          = array(  "A Competition",
                    "B Competition",
                    "C Competition",
                    "D Competition",
                    "E Competition",
                    "F Competition",
                    "G Competition",
                    "H Competition",
               );
        
         public static $CompetitionPlaceArray
          = array(  "1st Place",
                    "2nd Place",
                    "3rd Place",
                    "4th Place",
                    "5th Place",
               );
        
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('number', 'required'),
			array('number', 'numerical', 'integerOnly'=>true),
                        array('number', 'numerical', 'min'=>1),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'number'=>'number of random profile to generate',
		);
	}
        
        public function weightedRand($min, $max, $gamma) { 
            $offset= $max-$min+1; 
            return floor($min+pow(lcg_value(), $gamma)*$offset); 
        }         
        
        public function generateFlatNull($inNullPct,$inMin,$inMax){
            if (lcg_value() < $inNullPct){
                return null;
            }
            else{
                return mt_rand($inMin,$inMax);
            }            
        }
        
        public function generateUser($inUserID)
        {
            $myUser = new User;
            
            $myUser->id = $inUserID;
            $myUser->usertype = 0;
            $myUser->transType = 'S';
            $myUser->schoolType= 'C';           
            $myUser->usertype = 0;
            $myUser->active = 1;
            $myUser->hs_profile_status = 'A';
            $myUser->password_unhash = "Testrandom";
            $myUser->password = $myUser->encrypt($myUser->password_unhash);
            
            $firstName = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));
            $lastName = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));
//            echo $inUserID.' '.$firstName.' '.$lastName."\r\n";
            $emailTemp = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,5));
            $username = $firstName.'.'.$lastName;
            $email = $firstName.'.'.$lastName.'@'.$emailTemp.'.COM';
            
            $myUser->email = $email;
            $myUser->FirstName = $firstName;
            $myUser->LastName = $lastName;
            $myUser->username = $username;
            
            $myUser->save(false);
        }
        
        public function generateAcademic($inUserID)
        {
            $myAcademicProfile = new AcademicProfile;
            $myAcademicProfile->user_id = $inUserID;
            $tempNumber = $this->weightedRand(0,4,1.5);
            if ($tempNumber == 0){
                $myAcademicProfile->national_Merit = null;
            } 
            else{
                $myAcademicProfile->national_Merit = GenerateForm::$NationalMeritArray[$tempNumber];
            }
            
            $myAcademicProfile->class_size = $this->generateFlatNull(0.10,100,2000);
            if ($myAcademicProfile->class_size == null){
                $myAcademicProfile->class_rank_num = null;
            }
            else{
                $myAcademicProfile->class_rank_num = mt_rand(1,$myAcademicProfile->class_size);
            }
            $myAcademicProfile->class_rank_percent = $this->generateFlatNull(0.10,1,8);
            $myAcademicProfile->GPA_unweight = lcg_value()*4;
            $myAcademicProfile->GPA_weight = $myAcademicProfile->GPA_unweight * (0.90 + (lcg_value()*0.2));
            $myAcademicProfile->save(false);
        }
        
        public function generateActivity($inUserID)
        {
            
            $theNumber = mt_rand(0,5);
            if ($theNumber > 0){
                $theCount = 0;
                $theIndex = 0;
                $theTempString = str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');
                
                while ($theCount < $theNumber){
                    $theSelect = substr($theTempString,$theIndex,1);
                    if (GenerateForm::$ReverseMap["$theSelect"] < count(GenerateForm::$ActivityArray)){
                    
                        $myActivityProfile = new ActivityProfile;
                        $myActivityProfile->user_id = $inUserID;
                        $myActivityProfile->name = GenerateForm::$ActivityArray[GenerateForm::$ReverseMap["$theSelect"]];
                        $myActivityProfile->activity_type_id = GenerateForm::$ActivityTypeArray[GenerateForm::$ReverseMap["$theSelect"]];
                        $myActivityProfile->leadership = $this->generateFlatNull(0.30,1,13);
                        $myActivityProfile->hours_per_week = $this->generateFlatNull(0.05,1,5);
                        $myActivityProfile->year_participate_begin = $this->generateFlatNull(0.05,1,7);
                        if ($myActivityProfile->year_participate_begin !==null){
                            $myActivityProfile->year_participate_end = mt_rand($myActivityProfile->year_participate_begin,7);
                        }
                        else{
                            $myActivityProfile->year_participate_end = null;
                        }
                        $myActivityProfile->save(false);
                        $theCount++;
                    }
                    $theIndex++;
                }
            }
        }
        
        public function generateAP($inUserID)
        {
            $theNumber = mt_rand(0,5);
            if ($theNumber > 0){
                $theCount = 0;
                $theTempArray = GenerateForm::$APTypeArray;
                shuffle($theTempArray);
  
                while ($theCount < $theNumber){
                    $theArrayElement = $theTempArray[$theCount];
                    
                    $myApProfile = new ApProfile;
                    $myApProfile->user_id = $inUserID;
                    $myApProfile->ap_id = $theArrayElement['id'];
                    $myApProfile->score = mt_rand(1,5);
                    $myApProfile->save(false);
                    $theCount++;

                }
            }
        }

        public function generateAward($inUserID)
        {
            $theNumber = mt_rand(0,5);
            if ($theNumber > 0){
                $theCount = 0;
                $theIndex = 0;
                $theTempString = str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');
                
                while ($theCount < $theNumber){
                    $theSelect = substr($theTempString,$theIndex,1);
                    if (GenerateForm::$ReverseMap["$theSelect"] < count(GenerateForm::$AwardArray)){                      
                        $myAwardProfile = new AwardProfile;
                        $myAwardProfile->award_name = GenerateForm::$AwardArray[GenerateForm::$ReverseMap["$theSelect"]];
                        $myAwardProfile->user_id = $inUserID;
                        $myAwardProfile->year = mt_rand(1,7);
                        $myAwardProfile->region = mt_rand(1,8);
                        $myAwardProfile->save(false);
                        $theCount++;
                    }
                    $theIndex++;
                }
            }
        }
        
        public function generateBasic($inUserID)
        {
            $myBasicProfile = new BasicProfile;
            $myBasicProfile->user_id = $inUserID;
            $myBasicProfile->curr_university_id = mt_rand(1,2551);
            if (lcg_value() < 0.05){
                $myBasicProfile->isTransfer = "Y";
                $myBasicProfile->first_university_id = mt_rand(1,2551);
                
            }
            else{
                $myBasicProfile->isTransfer = "N";
                $myBasicProfile->first_university_id = $myBasicProfile->curr_university_id;
            }
            $myBasicProfile->nickname = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,10);
            $myBasicProfile->gender = substr(str_shuffle(str_repeat('MF',100)),0,1);
            $myBasicProfile->highschool_id = mt_rand(1,26421);
            /* Unfortunately - not coordination between the high school and the high school type */
            $myBasicProfile->highSchoolType = GenerateForm::$HSTypeArray[$this->weightedRand(0,5,1.5)];
            $myBasicProfile->race_id = substr(str_shuffle(str_repeat('ABCDEFGHI',100)),0,1);
            if ($myBasicProfile->race_id == "G"){
                $myBasicProfile->race_id = null;
            }
            $myBasicProfile->avg_profile_rating = null;
            $myBasicProfile->l1ForSale = 1;
            $myBasicProfile->l2ForSale = 1;
            $myBasicProfile->l3ForSale = 1;
            $myBasicProfile->verified = substr(str_shuffle(str_repeat('YN',100)),0,1);
            $myBasicProfile->profile_type = mt_rand(1,17);
            $myBasicProfile->save(false);
            return $myBasicProfile;
        }
        
        public function generateExclusive($inUserID)
        {
            $myExclusive = new Exclusive;
            $myExclusive->user_id = $inUserID;
            $myExclusive->exclusiveValue = mt_rand(0,1);
            $myExclusive->save(false);
        }
        public function generatePersonal($inUserID)
        {
            $myPersonalProfile = new PersonalProfile;
            $myPersonalProfile->user_id = $inUserID;
            
            $tempValue =  lcg_value();
            if ($tempValue < 0.1){
                $myPersonalProfile->citizenship = null;
            }
            else if ($tempValue < 0.8){
                $myPersonalProfile->citizenship = 1;
            }
            else{
                $myPersonalProfile->citizenship = mt_rand(2,180);
            }
            $myPersonalProfile->ethnic_origin = $this->generateFlatNull(0.2,1,122);
            
            $tempValue =  lcg_value();
            if ($tempValue < 0.1){
                $myPersonalProfile->legacy_direct = substr(str_shuffle(str_repeat('NMFB',100)),0,1);
            }
            else if ($tempValue < 0.8){
                $myPersonalProfile->legacy_direct = '';
            }
            else{
                $myPersonalProfile->legacy_direct = null;
            }
            $tempValue =  lcg_value();
            if ($tempValue < 0.1){
                $myPersonalProfile->legacy_indirect = substr(str_shuffle(str_repeat('NSOB',100)),0,1);
            }
            else if ($tempValue < 0.8){
                $myPersonalProfile->legacy_indirect = '';
            }
            else{
                $myPersonalProfile->legacy_indirect = null;
            }
            $tempValue =  lcg_value();
            if ($tempValue < 0.7){
                $myPersonalProfile->income_bracket = substr(str_shuffle(str_repeat('ABCDEFGH',100)),0,1);
            }
            else if ($tempValue < 0.8){
                $myPersonalProfile->income_bracket = '';
            }
            else{
                $myPersonalProfile->income_bracket = null;
            }
            $tempValue =  lcg_value();
            if ($tempValue < 0.7){
                $myPersonalProfile->parental_status = substr(str_shuffle(str_repeat('MDNCWS',100)),0,1);
            }
            else if ($tempValue < 0.8){
                $myPersonalProfile->parental_status = '';
            }
            else{
                $myPersonalProfile->parental_status = null;
            }
            $tempValue =  lcg_value();
            if ($tempValue < 0.7){
                $myPersonalProfile->religion_id = 'A'.substr(str_shuffle('123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),0,1);
            }
            else if ($tempValue < 0.8){
                $myPersonalProfile->religion_id = 'B'.substr(str_shuffle('ABCD'),0,1);
            }
            else{
                $myPersonalProfile->religion_id = null;
            }
            $myPersonalProfile->state = $this->generateFlatNull(0.2,1,54);
            $tempValue =  lcg_value();
            if ($tempValue < 0.8){
                $myPersonalProfile->hs_grad_year = 2000+mt_rand(5,11);
            }
            else{
                $myPersonalProfile->hs_grad_year = null;
            }
            $myPersonalProfile->current_major = $this->generateFlatNull(0.2,1,178);
            $myPersonalProfile->save(false);
        }
        
        public function generateScore($inUserID)
        {
            $myScoreProfile = new ScoreProfile;
            $myScoreProfile->user_id = $inUserID;        
            $tempValue =  lcg_value();
            if ($tempValue < 0.9){
                $myScoreProfile->SAT_Math = 10*mt_rand(20,80);
                $myScoreProfile->SAT_Critical_Read = 10*mt_rand(20,80);
                $myScoreProfile->SAT_Writing = 10*mt_rand(20,80);
                $myScoreProfile->SAT_Essay = mt_rand(2,12);
            }
            $tempValue =  lcg_value();
            if ($tempValue < 0.3){
                $myScoreProfile->PSAT_Math = mt_rand(20,80);
                $myScoreProfile->PSAT_Verbal = mt_rand(20,80);
                $myScoreProfile->PSAT_Writing = mt_rand(20,80);
              
            }
            $tempValue =  lcg_value();
            if ($tempValue < 0.2){
                $myScoreProfile->ACT_English = mt_rand(1,36);
                $myScoreProfile->ACT_Math = mt_rand(1,36);
                $myScoreProfile->ACT_Reading = mt_rand(1,36);
                $myScoreProfile->ACT_Science = mt_rand(1,36);
                $myScoreProfile->ACT_Writing = mt_rand(1,36);
                $myScoreProfile->ACT_Composite = round(($myScoreProfile->ACT_English + 
                        $myScoreProfile->ACT_Math + 
                        $myScoreProfile->ACT_Reading + 
                        $myScoreProfile->ACT_Science)/4.0);
                
            }
           $tempValue =  lcg_value();
            if ($tempValue < 0.05){
                $myScoreProfile->toefl = mt_rand(0,120);
              
            }
            $tempValue =  lcg_value();
            if ($tempValue < 0.05){
                $myScoreProfile->ielts = mt_rand(0,18);
              
            }
            $myScoreProfile->save(false);

        }
        
        public function generateSAT2($inUserID)
        {
            $theNumber = mt_rand(0,5);
            if ($theNumber > 0){
                $theCount = 0;
                $theTempArray = GenerateForm::$SAT2TypeArray;
                shuffle($theTempArray);
  
                while ($theCount < $theNumber){
                    $theArrayElement = $theTempArray[$theCount];
                    
                    $myApProfile = new Sat2Profile;
                    $myApProfile->user_id = $inUserID;
                    $myApProfile->sat2_id = $theArrayElement['id'];
                    $myApProfile->score = 10*mt_rand(20,80);
                    $myApProfile->save(false);
                    $theCount++;

                }
            }
        }

        
        public function generateCompetition($inUserID)
        {
            $theNumber = mt_rand(0,5);
            if ($theNumber > 0){
                $theCount = 0;
                $theIndex = 0;
                $theTempString = str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');
                
                while ($theCount < $theNumber){
                    $theSelect = substr($theTempString,$theIndex,1);
                    if (GenerateForm::$ReverseMap["$theSelect"] < count(GenerateForm::$CompetitionArray)){
                        
                        $myCompetitionProfile = new CompetitionProfile;    
                        $myCompetitionProfile->user_id = $inUserID;
                        $myCompetitionProfile->name_of_competition = GenerateForm::$CompetitionArray[GenerateForm::$ReverseMap["$theSelect"]];                       
                        $tempNumber = $this->generateFlatNull(0.2,0,count(GenerateForm::$CompetitionPlaceArray)-1);
                        if ($tempNumber == null){
                            $myCompetitionProfile->rank_or_score = null;
                        } 
                        else{
                            $myCompetitionProfile->rank_or_score = GenerateForm::$CompetitionPlaceArray[$tempNumber];
                        }
                        $myCompetitionProfile->year = mt_rand(1,7);
                        $myCompetitionProfile->region = mt_rand(1,8);
                        $myCompetitionProfile->num_competitors = $this->generateFlatNull(0.2,20,500);
                        $myCompetitionProfile->save(false);
                        $theCount++;
                    }
                    $theIndex++;
                }
            }
        }
 
        

        
        
        public function generateSport($inUserID)
        {
            $theNumber = mt_rand(0,3);
            if ($theNumber > 0){
                $theCount = 0;
                $theTempArray = GenerateForm::$SportTypeArray;
                shuffle($theTempArray);

                while ($theCount < $theNumber){
                    $theArrayElement = $theTempArray[$theCount];

                    $mySportProfile = new SportProfile;
                    $mySportProfile->user_id = $inUserID;
                    $mySportProfile->sport_id = $theArrayElement['id'];
                    
                    $mySportProfile->year_begin = $this->generateFlatNull(0.05,1,14);
                    if ($mySportProfile->year_begin !==null){
                        $mySportProfile->year_end = mt_rand($mySportProfile->year_begin,14);
                    }
                    else{
                        $mySportProfile->year_end = null;
                    }
                    $mySportProfile->leadership = $this->generateFlatNull(0.2,1,5);
                    $mySportProfile->level = $this->generateFlatNull(0.2,1,3);
                    $mySportProfile->indiv_rank = $this->generateFlatNull(0.2,1,18);
                    $mySportProfile->team_rank = $this->generateFlatNull(0.2,1,15);
                    $mySportProfile->other_recog = $this->generateFlatNull(0.2,1,21);
                    $mySportProfile->save(false);
                    $theCount++;

                }
            }
        }
        
        public function generateMusic($inUserID)
        {
            $theNumber = mt_rand(0,2);
            if ($theNumber > 0){
                $theCount = 0;
                $randomArray = range(1,42);
                shuffle($randomArray);
 
                while ($theCount < $theNumber){

                    $myMusicProfile = new MusicProfile;
                    $myMusicProfile->user_id = $inUserID;
                    $myMusicProfile->music = $randomArray[$theCount];
                    
                    $myMusicProfile->year_begin = $this->generateFlatNull(0.05,1,14);
                    if ($myMusicProfile->year_begin !==null){
                        $myMusicProfile->year_end = mt_rand($myMusicProfile->year_begin,14);
                    }
                    else{
                        $myMusicProfile->year_end = null;
                    }
                    
                    $myMusicProfile->level = $this->generateFlatNull(0.2,1,4);
                    $myMusicProfile->school_orchband = $this->generateFlatNull(0.2,1,4);
                    $myMusicProfile->school_leader = $this->generateFlatNull(0.2,1,8);
                    $myMusicProfile->ext_orchband = $this->generateFlatNull(0.2,1,7);
                    $myMusicProfile->ext_leader = $this->generateFlatNull(0.2,1,8);                
                    $myMusicProfile->save(false);
                    $theCount++;

                }
            }
        }
        
        
        public function generateLanguage($inUserID)
        {
            $theNumber = mt_rand(0,4);
            if ($theNumber > 0){
                $theCount = 0;
                $theTempArray = GenerateForm::$LanguageTypeArray;
                shuffle($theTempArray);

                while ($theCount < $theNumber){
                    $theArrayElement = $theTempArray[$theCount];

                    $myLanguageProfile = new LanguageProfile;
                    $myLanguageProfile->user_id = $inUserID;
                    $myLanguageProfile->language_id = $theArrayElement['id'];                    
                    $myLanguageProfile->fluency = $this->generateFlatNull(0.2,1,5);
                    $myLanguageProfile->save(false);
                    $theCount++;

                }
            }
        }
        
        public function generateSubject($inUserID)
        {
            $theNumber = mt_rand(0,4);
            if ($theNumber > 0){
                $theCount = 0;
                $theTempArray = GenerateForm::$SubjectTypeArray;
                shuffle($theTempArray);

                while ($theCount < $theNumber){
                    $theArrayElement = $theTempArray[$theCount];

                    $mySubjectProfile = new SubjectProfile;
                    $mySubjectProfile->user_id = $inUserID;
                    $mySubjectProfile->subject_id = $theArrayElement['id'];                    
                    $mySubjectProfile->year_taken = $this->generateFlatNull(0.2,1,4);
                    $mySubjectProfile->honors_or_AP = $this->generateFlatNull(0.5,1,3);
                    $mySubjectProfile->num_months = $this->generateFlatNull(0.2,1,9);
                    $mySubjectProfile->save(false);
                    $theCount++;

                }
            }
        }
        
        public function generateWork($inUserID)
        {
            $theNumber = mt_rand(0,5);
            if ($theNumber > 0){
                $theCount = 0;
                $randomArray = range(1,24);
                shuffle($randomArray);
 
                while ($theCount < $theNumber){

                    $myWorkProfile = new WorkProfile;
                    $myWorkProfile->user_id = $inUserID;
                    $myWorkProfile->name = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));
                            
                    $myWorkProfile->work_type = $randomArray[$theCount];
                    
                    $myWorkProfile->year_begin = $this->generateFlatNull(0.05,1,7);
                    if ($myWorkProfile->year_begin !==null){
                        $myWorkProfile->year_end = mt_rand($myWorkProfile->year_begin,7);
                    }
                    else{
                        $myWorkProfile->year_end = null;
                    }
                    
                    $myWorkProfile->title = $this->generateFlatNull(0.2,1,8);
                    $myWorkProfile->hours = $this->generateFlatNull(0.2,1,5);
                    $myWorkProfile->save(false);
                    $theCount++;

                }
            }
        }
        
        public function generateOther($inUserID)
        {
            $theNumber = mt_rand(0,2);
            if ($theNumber > 0){
                $theCount = 0;

                while ($theCount < $theNumber){

                    $myOtherProfile = new OtherProfile;
                    $myOtherProfile->user_id = $inUserID;
                    $myOtherProfile->name = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));                  
                    $myOtherProfile->year_begin = $this->generateFlatNull(0.05,1,7);
                    if ($myOtherProfile->year_begin !==null){
                        $myOtherProfile->year_end = mt_rand($myOtherProfile->year_begin,7);
                    }
                    else{
                        $myOtherProfile->year_end = null;
                    }
                    $myOtherProfile->save(false);
                    $theCount++;

                }
            }
        }
        
        public function generateVolunteer($inUserID)
        {
            $theNumber = mt_rand(0,5);
            if ($theNumber > 0){
                $theCount = 0;
                $randomArray = range(1,21);
                shuffle($randomArray);
 
                while ($theCount < $theNumber){

                    $myVolunteerProfile = new VolunteerProfile;
                    $myVolunteerProfile->user_id = $inUserID;
                    $myVolunteerProfile->name = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));
                            
                    $myVolunteerProfile->volunteertype_id = $randomArray[$theCount];
                    
                    $myVolunteerProfile->year_begin = $this->generateFlatNull(0.05,1,14);
                    if ($myVolunteerProfile->year_begin !==null){
                        $myVolunteerProfile->year_end = mt_rand($myVolunteerProfile->year_begin,14);
                    }
                    else{
                        $myVolunteerProfile->year_end = null;
                    }
                    
                    $myVolunteerProfile->leadership = $this->generateFlatNull(0.2,1,8);
                    $myVolunteerProfile->hours = $this->generateFlatNull(0.2,1,5);
                    $myVolunteerProfile->save(false);
                    $theCount++;

                }
            }
        }
        
        public function generateSummer($inUserID)
        {
            $theNumber = mt_rand(0,6);
            if ($theNumber > 0){
                $theCount = 0;
                $randomArray = range(1,6);
                shuffle($randomArray);
 
                while ($theCount < $theNumber){

                    $mySummerProfile = new SummerProfile;
                    $mySummerProfile->user_id = $inUserID;
                    $mySummerProfile->name = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));
                            
                    $mySummerProfile->summer_date = $randomArray[$theCount];                   
                    $mySummerProfile->summer_id = $this->generateFlatNull(0.2,1,13);
                    $mySummerProfile->save(false);
                    $theCount++;

                }
            }
        }
        
        public function generateResearch($inUserID)
        {
            $theNumber = mt_rand(0,3);
            if ($theNumber > 0){
                $theCount = 0;
                $theTempArray = GenerateForm::$SubjectTypeArray;
                shuffle($theTempArray);
 
                while ($theCount < $theNumber){
                    
                    $theArrayElement = $theTempArray[$theCount];
                    $myResearchProfile = new ResearchProfile;
                    $myResearchProfile->user_id = $inUserID;
                    $myResearchProfile->subject = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));
                            
                    $myResearchProfile->field = $theArrayElement['id'];
                    
                    $myResearchProfile->year_begin = $this->generateFlatNull(0.05,1,7);
                    if ($myResearchProfile->year_begin !==null){
                        $myResearchProfile->year_end = mt_rand($myResearchProfile->year_begin,7);
                    }
                    else{
                        $myResearchProfile->year_end = null;
                    }
                    
                    $myResearchProfile->hours = $this->generateFlatNull(0.2,1,5);
                    $myResearchProfile->save(false);
                    $theCount++;

                }
            }
        }
        
        public function generateSingle($inUserID)
        {
            $this->generateUser($inUserID);
            $basicProfile = $this->generateBasic($inUserID);
            $this->generatePersonal($inUserID);
            $this->generateAcademic($inUserID);
            $this->generateActivity($inUserID);
            $this->generateAP($inUserID);
            $this->generateAward($inUserID);
            $this->generateSAT2($inUserID);
            $this->generateScore($inUserID);
            $this->generateCompetition($inUserID);
            $this->generateSport($inUserID);
            $this->generateMusic($inUserID);
            $this->generateLanguage($inUserID);
            $this->generateSubject($inUserID);
            $this->generateWork($inUserID);
            $this->generateOther($inUserID);
            $this->generateVolunteer($inUserID);
            $this->generateSummer($inUserID);
            $this->generateResearch($inUserID); 
            $this->generateExclusive($inUserID);
            
            $subjectProfileArray=SubjectProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_subjects = count($subjectProfileArray);

            $competitionProfileArray=CompetitionProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_competitions = count($competitionProfileArray);

            $awardProfileArray=AwardProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_awards = count($awardProfileArray);

            $num_academics = $num_subjects + $num_competitions + $num_awards;

            $basicProfile->num_subjects = $num_subjects;
            $basicProfile->num_competitions = $num_competitions;
            $basicProfile->num_awards = $num_awards;
            $basicProfile->num_academics = $num_academics;
            
            $activityProfileArray=ActivityProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_activities = count($activityProfileArray);

            $sportProfileArray=SportProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_sports = count($sportProfileArray);

            $musicProfileArray=MusicProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_music = count($musicProfileArray);

            $volunteerProfileArray=VolunteerProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_volunteer = count($volunteerProfileArray);

            $workProfileArray=WorkProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_work = count($workProfileArray);

            $researchProfileArray=ResearchProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_research = count($researchProfileArray);

            $summerProfileArray=SummerProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_summer = count($summerProfileArray);

            $otherProfileArray=OtherProfile::model()->findAllByAttributes(array('user_id'=>$inUserID));
            $num_other = count($otherProfileArray);

            $num_extracurriculars = $num_activities + $num_sports + $num_music + $num_volunteer
                + $num_work + $num_research + $num_summer + $num_other;

            $basicProfile->num_activities = $num_activities;
            $basicProfile->num_sports = $num_sports;
            $basicProfile->num_music = $num_music;
            $basicProfile->num_volunteer = $num_volunteer;
            $basicProfile->num_work = $num_work;
            $basicProfile->num_research = $num_research;
            $basicProfile->num_summer = $num_summer;
            $basicProfile->num_other = $num_other;
            $basicProfile->num_extracurriculars = $num_extracurriculars;
            
            $basicProfile->save(false); 
            
            User::updateRoyalty($inUserID);
            /*
            
            $this->generateEssay($inUserID);
            
            
            $this->generateOtherSchoolAdmit($inUserID);
            
                  
 
        */
        }
        
        public function generateAll($inNumber)
        {
            $connection = Yii::app()->db;
            $sql = "SELECT max(user_id) as theMax FROM tbl_basic_profile";
            $command = $connection->createCommand($sql);
            $theReader = $command->query();
            $theResult = $theReader->read();
//            $theReader->bindColumn('theCount',$numProfiles[0]);
            $largestID = $theResult['theMax'];
 //           echo $largestID;
            
            if ($largestID >= 10000000){
                $useFirstID = $largestID + 1;
            }
            else{
                $useFirstID = 10000000;
            }
            $theMax = $useFirstID + $inNumber;
            for ($i = $useFirstID; $i < $theMax; $i++) {
               $this->generateSingle($i);
            }
       
        }
}

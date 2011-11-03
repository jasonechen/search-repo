<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class GenerateForm extends CFormModel
{
	public $number;

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
        
        public function generate()
        {
            echo "";
        }
        
        public function generateAll()
        {
            echo "done";
            $CityArray
          = array("New York",
                  "Los Angeles",
                  "San Francisco",
                  "Moscow",
                  "London",
                  "Paris",
               );
        // Loop from 1 to 1000
//        for ($i = 1; $i <= 339; $i++) {
//        for ($i = 340; $i <= 641; $i++) {
//        for ($i = 642; $i <= 800; $i++) {
        for ($i = 1; $i <= $number; $i++) {
            $firstName = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));
            $lastName = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));
            echo $i.' '.$firstName.' '.$lastName."\r\n";
            $emailTemp = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,5));
            $username = $firstName.'.'.$lastName;
            $email = $firstName.'.'.$lastName.'@'.$emailTemp.'.COM';
            $race_id = substr(str_shuffle(str_repeat('ABCDEFGH',10)),0,1);
            $religion_id = 'A'.substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRST',10)),0,1);
            $gender = substr(str_shuffle(str_repeat('MF',100)),0,1);
            $hasPets = substr(str_shuffle(str_repeat('YN',100)),0,1);
            $hasChildren = substr(str_shuffle(str_repeat('YN',100)),0,1);
            $gender = substr(str_shuffle(str_repeat('MF',100)),0,1);
            $photo_id = rand(1,8);
            $income_bracket= rand(0,7);
            $photo_id = rand(1,8);
            $education = rand(0,3);
            $city = $CityArray[rand(0,5)];
            $num_hobbies = rand(0,4);
            $birthMonth = rand(1,12);
            $birthDay = rand(1,27);
            if ($birthDay < 10){
                $birthDayString = "0".$birthDay;
            }
            else{
                $birthDayString = $birthDay;
            }
            if ($birthMonth < 10){
                $birthMonthString = "0".$birthMonth;
            }
            else{
                $birthMonthString = $birthMonth;
            }
            $birthYear = 1950+rand(0,40);
            $birthDate = $birthYear."-".$birthMonthString."-".$birthDayString;
            echo ' Email: '.$email."\r\n";
            echo ' Race: '.$race_id."\r\n";
            echo ' Religion: '.$religion_id."\r\n";
            echo ' Gender: '.$gender."\r\n";
            echo ' Has Pets: '.$hasPets."\r\n";
            echo ' Has Children: '.$hasChildren."\r\n";
            echo ' City: '.$city."\r\n";
            echo ' Photo #: '.$photo_id."\r\n";
            echo ' Birthday: '.$birthDate."\r\n";
            
            $myProfile = new Profile;
            $myProfile->id = $i;
            $myProfile->email = $email;
            $myProfile->username = $username;
            $myProfile->FirstName = $firstName;
            $myProfile->LastName = $lastName;
            $myProfile->race_id = $race_id;
            $myProfile->religion_id = $religion_id;
            $myProfile->gender = $gender;
            $myProfile->hasPets = $hasPets;
            $myProfile->hasChildren = $hasChildren;
            $myProfile->education = $education;
            $myProfile->income_bracket = $income_bracket;
            $myProfile->city = $city;
            $myProfile->photo_id = $photo_id;
            $myProfile->num_hobbies = $num_hobbies;
            $myProfile->date_of_birth = $birthDate;
            $myProfile->save(false);         
            $hobbylist = substr(str_shuffle(str_repeat('ABCDEFGH',10)),0,4);
            for ($j = 0; $j < $num_hobbies; $j++) {
                $myHobby = new Hobby;
                $myHobby->user_id = $i;
                $myHobby->hobby_id = "A".substr($hobbylist,$j,1);
                $myHobby->save(false);
            }
 
        }
    
            
	}
       

}

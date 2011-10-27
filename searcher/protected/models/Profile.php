<?php

/**
 * This is the model class for table "tbl_profile".
 *
 * The followings are the available columns in table 'tbl_profile':
 * @property string $id
 * @property string $email
 * @property string $username
 * @property string $FirstName
 * @property string $LastName
 * @property string $race_id
 * @property string $religion_id
 * @property string $gender
 * @property string $hasPets
 * @property string $hasChildren
 * @property integer $education
 * @property integer $income_bracket
 * @property string $city
 * @property string $photo_id
 * @property string $date_of_birth
 *
 * The followings are the available model relations:
 * @property Hobby[] $hobbys
 * @property RaceType $race
 * @property ReligionType $religion
 */
class Profile extends CActiveRecord
{

        public static $EducationArray 
          = array("High School Unfinished",
                   "High School Graduate",
                   "College Graduate",
                   "Graduate Degree Completed",
              );  
        
        public static $IncomeRangeArray 
          = array("$20,000 or less",
                   "$20,000 to $40,000",
                   "$40,000 to $60,000",
                   "$60,000 to $80,000",
                   "$80,000 to $100,000",
                   "$100,000 to $200,000",
                   "$200,000 to $300,000",
                   "$300,000 and above",
              );      
        
        public static $CityArray
          = array("New York",
                  "Los Angeles",
                  "San Francisco",
                  "Moscow",
                  "London",
                  "Paris",
               );
        public static $AgeArray
          = array("Younger than 21",
                  "21 to 25",
                  "26-30",
                  "31-35",
                  "36-40",
                  "40-50",
                  "50-60",
                  "60+",
               );
        
	/**
	 * Returns the static model of the specified AR class.
	 * @return Profile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required'),
			array('education, income_bracket', 'numerical', 'integerOnly'=>true),
			array('email, username', 'length', 'max'=>256),
			array('FirstName, LastName, city', 'length', 'max'=>50),
			array('race_id, gender, hasPets, hasChildren', 'length', 'max'=>1),
			array('religion_id', 'length', 'max'=>2),
			array('photo_id', 'length', 'max'=>10),
			array('date_of_birth', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, username, FirstName, LastName, race_id, religion_id, gender, hasPets, hasChildren, education, income_bracket, city, photo_id, date_of_birth', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'hobbys' => array(self::HAS_MANY, 'Hobby', 'user_id'),
			'race' => array(self::BELONGS_TO, 'RaceType', 'race_id'),
			'religion' => array(self::BELONGS_TO, 'ReligionType', 'religion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'username' => 'Username',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
			'race_id' => 'Race',
			'religion_id' => 'Religion',
			'gender' => 'Gender',
			'hasPets' => 'Has Pets',
			'hasChildren' => 'Has Children',
			'education' => 'Education',
			'income_bracket' => 'Income Bracket',
			'city' => 'City',
			'photo_id' => 'Photo',
			'date_of_birth' => 'Date Of Birth',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('race_id',$this->race_id,true);
		$criteria->compare('religion_id',$this->religion_id,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('hasPets',$this->hasPets,true);
		$criteria->compare('hasChildren',$this->hasChildren,true);
		$criteria->compare('education',$this->education);
		$criteria->compare('income_bracket',$this->income_bracket);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('photo_id',$this->photo_id,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function returnCities()
    {
        $arr = array();
        foreach(self::$CityArray as $value)
        {
            $arr[$value] = $value;
        }
        return $arr;
    }

    public static function returnAge($BirthDate)
    {
        list($BirthYear, $BirthMonth, $BirthDay) = explode("-", $BirthDate);
        $YearDiff = date("Y") - $BirthYear;
        $MonthDiff = date("m") - $BirthMonth;
        $DayDiff = date("d") - $BirthDay;

        if ($DayDiff < 0 || $MonthDiff < 0)
            $YearDiff--;
        return $YearDiff;
    }
}
<?php

/**
 * This is the model class for table "tbl_volunteer_profile".
 *
 * The followings are the available columns in table 'tbl_volunteer_profile':
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property integer $volunteertype_id
 * @property integer $year_begin
 * @property integer $year_end
 * @property integer $leadership
 * @property integer $hours
 * @property string $comments
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class VolunteerProfile extends ProfileActiveRecord
{
       public static $VolunteerTypeArray
         = array(
             1=>'Animal Rights',
            2=>'Arts/Entertainment',
            3=>'Battered Women',
            4=>'Big Brother/Sister',
            5=>'Clothing/Food Drive',
            6=>'Disaster Relief',
            7=>'Elderly',
            8=>'Ethnic / Immigrant',
            9=>'Fundraising',
            10=>'Habitat for Humanity',
            11=>'Homeless Shelter',
            12=>'Hospital',
            13=>'Human Rights',
            14=>'Legal/Justice',
            15=>'Red Cross',
            16=>'Religious',
            17=>'School Makeover',
            18=>'Soup Kitchen',
            19=>'Teaching/Tutoring',
            20=>'Trash/Recycling',
            21=>'Other',

    );

       public static $LeadershipArray
          = array(
                 1=>'Volunteer/Member',
                 2=>'President',
                 3=>'Vice President',
                 4=>'Treasurer',
                 5=>'Secretary',
                 6=>'Committee Head',
                 7=>'Captain',
                 8=>'Other',
               );   
       
        public static $HoursArray
          = array(
                  1=>'0-5',
                 2=>'6-10',
                 3=>'11-15',
                 4=>'16-20',
                 5=>'20+',
               );
        
        public static $YearParticipateArray
          = array(
                  1=>'Pre-K',
                    2=>'K',
                    3=>'1st Grade',
                    4=>'2nd Grade',
                    5=>'3rd Grade',
                    6=>'4th Grade',
                    7=>'5th Grade',
                    8=>'6th Grade',
                    9=>'7th Grade',
                    10=>'8th Grade',
                    11=>'9th Grade',
                    12=>'10th Grade',
                    13=>'11th Grade',
                    14=>'12th Grade',

               );
    
        public static function convertLeader($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=8) && ($inCode >0)) {
                $myReturnValue = VolunteerProfile::$LeadershipArray[$inCode];
            }
            return $myReturnValue;
        }    
        public static function convertHours($inHours)
        {
            $myReturnValue = "";
            if (($inHours !=="") && ($inHours !==NULL) && ($inHours <=5) && ($inHours >0)) {
                $myReturnValue = VolunteerProfile::$HoursArray[$inHours];
            }
            return $myReturnValue;
        }
        
        public static function convertYears($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=14) && ($inCode >0)) {
                $myReturnValue = VolunteerProfile::$YearParticipateArray[$inCode];
            }
            return $myReturnValue;
        }
        public static function convertVolunteer($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=45) && ($inCode >0)) {
                $myReturnValue = VolunteerProfile::$VolunteerTypeArray[$inCode];
            }
            return $myReturnValue;
        }     
    
    
        /**
	 * Returns the static model of the specified AR class.
	 * @return VolunteerProfile the static model class
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
		return 'tbl_volunteer_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('volunteertype_id, year_begin, year_end, hours,  create_time, create_user_id, update_time, update_user_id', 'required'),
			array('volunteertype_id, year_begin, year_end, leadership, hours, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, name, volunteertype_id, year_begin, year_end, leadership, hours, comments, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'name' => 'Name',
			'volunteertype_id' => 'Volunteertype',
			'year_begin' => 'From',
			'year_end' => 'To',
			'leadership' => 'Leadership/Participation',
			'hours' => 'Hours/Week',
			'comments' => 'Comments',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Updated User',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('volunteertype_id',$this->volunteertype_id);
		$criteria->compare('year_begin',$this->year_begin);
		$criteria->compare('year_end',$this->year_end);
		$criteria->compare('leadership',$this->leadership);
		$criteria->compare('hours',$this->hours);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
 	 public static function getVolunteerByUser() 
        { 
			$myID = Yii::app()->user->id;	
			$testArr = VolunteerProfile::model()->findAll('user_id =:id', array(':id'=>$myID));
			return $testArr;
        }
        protected function afterSave()
        {

            $this->updateExtracurricularTotals();

            return parent::afterSave();
        //return true;
        }
        
        protected function afterDelete()
        {

            $this->updateExtracurricularTotals();

            return parent::afterDelete();
        //return true;
        }
}
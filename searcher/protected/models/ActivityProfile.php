<?php

/**
 * This is the model class for table "tbl_activity_profile".
 *
 * The followings are the available columns in table 'tbl_activity_profile':
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property string $activity_type_id
 * @property string $leadership
 * @property integer $hours_per_week
 * @property integer $year_participate_begin
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model reCActiveRecordlations:
 * @property User $user
 * @property ActivityType $activityType
 */
class ActivityProfile extends ProfileActiveRecord
{
    
        public static $HoursArray
          = array(
                  1=>'0-5',
                 2=>'6-10',
                 3=>'11-15',
                 4=>'16-20',
                 5=>'20+',
               );
        
       public static $LeadershipArray
          = array(
                  1=>'Member',
                 2=>'President',
                 3=>'Vice President',
                 4=>'Secretary',
                 5=>'Treasurer',
                 6=>'Captain',
                 7=>'Manager',
                 8=>'Committee Head',
                 9=>'Editor-in-Chief',
                 10=>'Editor',
                 11=>'Reporter',
                 12=>'Liason',   
                 13=>'Other',
               );
       
        public static $YearParticipateArray
          = array(
           
                    1=>'6th Grade',
                    2=>'7th Grade',
                    3=>'8th Grade',
                    4=>'9th Grade',
                    5=>'10th Grade',
                    6=>'11th Grade',
                    7=>'12th Grade',

               );
		public static function convertHours($inHours)
        {
            $myReturnValue = "";
            if (($inHours !=="") && ($inHours !==NULL) && ($inHours <=5) && ($inHours >=0)) {
                $myReturnValue = ActivityProfile::$HoursArray[$inHours];
            }
            return $myReturnValue;
        }
        
        public static function convertLeadership($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=9) && ($inCode >=0)) {
                $myReturnValue = ActivityProfile::$LeadershipArray[$inCode];
            }
            return $myReturnValue;
        }

           public static function convertYears($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=7) && ($inCode >0)) {
                $myReturnValue = ActivityProfile::$YearParticipateArray[$inCode];
            }
            return $myReturnValue;
        }
        
	/**
	 * Returns the static model of the specified AR class.
	 * @return ActivityProfile the static model class
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
		return 'tbl_activity_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, name', 'required'),
			array('hours_per_week, leadership, year_participate_begin, year_participate_end', 'numerical', 'integerOnly'=>true),
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>40),
			array('activity_type_id', 'length', 'max'=>2),
			array('leadership', 'length', 'max'=>5),
                        array('comments', 'length', 'max'=>50),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, comments, user_id, name, activity_type_id, leadership, hours_per_week, year_participate_begin,year_participate_end, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'activityType' => array(self::BELONGS_TO, 'ActivityType', 'activity_type_id'),
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
			'activity_type_id' => 'Activity Type',
			'leadership' => 'Leadership',
                        'comments' => 'Comments',
			'hours_per_week' => 'Hours Per Week',
			'year_participate_begin' => 'From',
                    	'year_participate_end' => 'To',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
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
		$criteria->compare('activity_type_id',$this->activity_type_id,true);
		$criteria->compare('leadership',$this->leadership,true);
		$criteria->compare('hours_per_week',$this->hours_per_week);
		$criteria->compare('year_participate_begin',$this->year_participate_begin);
                $criteria->compare('year_participate_end',$this->year_participate_end);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
       public function getActivityTypeOptions() 
        { 
             $activityArray = CHtml::listData(ActivityType::model()->findAll(), 'id', 'name');
             return $activityArray;


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

      return parent::afterSave();
        //return true;
        }
 public static function getActivityByUser() 
        { 
			$myID = Yii::app()->user->id;	
			$ActivityArr = ActivityProfile::model()->findAll('user_id =:id', array(':id'=>$myID));
			return $ActivityArr;
        }
}
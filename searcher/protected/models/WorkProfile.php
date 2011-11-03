<?php

/**
 * This is the model class for table "tbl_work_profile".
 *
 * The followings are the available columns in table 'tbl_work_profile':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property integer $work_type
 * @property integer $year_begin
 * @property integer $year_end
 * @property integer $title
 * @property integer $hours
 * @property integer $comments
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class WorkProfile extends ProfileActiveRecord
{

public static $WorkTypeArray
         = array(
            1=>'Amusement Park',
            2=>'Athletics ',
            3=>'Auto related',
            4=>'Babysitting/childcare',
            5=>'Camp counselor',
            6=>'Computers / IT',
            7=>'Construction',
            8=>'Data Entry',
            9=>'Fast Food/Restaurant',
            10=>'Family Business',
            11=>'Financial Services',
            12=>'Hospitality - Hotel/Resort ',
            13=>'Household chores/cleaning',
            14=>'Lawn and yard work',
            15=>'Lifeguard',
            16=>'Mover',
            17=>'Music',
            18=>'Office Assistant',
            19=>'Pet sitting/dog walking',
            20=>'Research',
            21=>'Retail',
            22=>'Tutoring',
            23=>'Warehouse',
            24=>'Other',


    );

       public static $TitleArray
          = array(
                 1=>'Employee',
                 2=>'Founder',
                 3=>'Research Assistant',
                 4=>'Manager',
                 5=>'Salesperson',
                 6=>'Customer Service Representative',
                 7=>'Associate',
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
                    1=>'6th Grade',
                    2=>'7th Grade',
                    3=>'8th Grade',
                    4=>'9th Grade',
                    5=>'10th Grade',
                    6=>'11th Grade',
                    7=>'12th Grade',

               );
    
           public static function convertTitle($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=8) && ($inCode >0)) {
                $myReturnValue = WorkProfile::$TitleArray[$inCode];
            }
            return $myReturnValue;
        }    
          public static function convertHours($inHours)
        {
            $myReturnValue = "";
            if (($inHours !=="") && ($inHours !==NULL) && ($inHours <=5) && ($inHours >0)) {
                $myReturnValue = WorkProfile::$HoursArray[$inHours];
            }
            return $myReturnValue;
        }
        
                  public static function convertYears($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=20) && ($inCode >0)) {
                $myReturnValue = WorkProfile::$YearParticipateArray[$inCode];
            }
            return $myReturnValue;
        }
            public static function convertWork($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=45) && ($inCode >0)) {
                $myReturnValue = WorkProfile::$WorkTypeArray[$inCode];
            }
            return $myReturnValue;
        }         
    
    
        /**
	 * Returns the static model of the specified AR class.
	 * @return WorkProfile the static model class
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
		return 'tbl_work_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, work_type, year_begin, year_end, hours, create_time, create_user_id, update_time, update_user_id', 'required'),
			array('user_id, work_type, year_begin, year_end, title, hours, comments, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('name, user_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, name, work_type, year_begin, year_end, title, hours, comments, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'work_type' => 'Work Type',
			'year_begin' => 'Year Begin',
			'year_end' => 'Year End',
			'title' => 'Title',
			'hours' => 'Hours',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('work_type',$this->work_type);
		$criteria->compare('year_begin',$this->year_begin);
		$criteria->compare('year_end',$this->year_end);
		$criteria->compare('title',$this->title);
		$criteria->compare('hours',$this->hours);
		$criteria->compare('comments',$this->comments);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
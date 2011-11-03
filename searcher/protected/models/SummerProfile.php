<?php

/**
 * This is the model class for table "tbl_summer_profile".
 *
 * The followings are the available columns in table 'tbl_summer_profile':
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property integer $summer_id
 * @property integer $summer_date
 * @property string $comments
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 */
class SummerProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SummerProfile the static model class
	 */

public static $SummerTypeArray
         = array(
            1=>'Arts/Media',
            2=>'Classes',
            3=>'Day Camp',
            4=>'Internship',
            5=>'Job',
            6=>'Outdoor ',
            7=>'Religious Program',
            8=>'Research',
            9=>'Sports Lessons/League',
            10=>'Travel',
            11=>'Volunteer',
            12=>'Writing',
            13=>'Other',
    );

       
        public static $SummerDateArray
          = array(
                    1=>'Between 6th-7th Grade',
                    2=>'Between 7th-8th Grade',
                    3=>'Between 8th-9th Grade',
                    4=>'Between 9th-10th Grade',
                    5=>'Between 10th-11th Grade',
                    6=>'Between 11th-12th Grade',
                    
               );
    


                  public static function convertSummerDate($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=20) && ($inCode >0)) {
                $myReturnValue = SummerProfile::$SummerDateArray[$inCode];
            }
            return $myReturnValue;
        }
            public static function convertSummer($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=45) && ($inCode >0)) {
                $myReturnValue = SummerProfile::$SummerTypeArray[$inCode];
            }
            return $myReturnValue;
        }           
    
    
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_summer_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('summer_id, summer_date, user_id, create_time, create_user_id, update_time, update_user_id', 'required'),
			array('summer_id, summer_date', 'numerical', 'integerOnly'=>true),
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('name, comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, name, summer_id, summer_date, comments, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'summer_id' => 'Summer',
			'summer_date' => 'Summer Date',
			'comments' => 'Comments',
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
		$criteria->compare('summer_id',$this->summer_id);
		$criteria->compare('summer_date',$this->summer_date);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
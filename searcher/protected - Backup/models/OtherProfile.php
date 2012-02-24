<?php

/**
 * This is the model class for table "tbl_other_profile".
 *
 * The followings are the available columns in table 'tbl_other_profile':
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property integer $year_begin
 * @property integer $year_end
 * @property string $comments
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class OtherProfile extends ProfileActiveRecord
{


        
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
    

        
       public static function convertYears($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=20) && ($inCode >0)) {
                $myReturnValue = WorkProfile::$YearParticipateArray[$inCode];
            }
            return $myReturnValue;
        }
                
    
    
    
    
        /**
	 * Returns the static model of the specified AR class.
	 * @return OtherProfile the static model class
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
		return 'tbl_other_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, year_begin, year_end, user_id, create_time, create_user_id, update_time, update_user_id', 'required'),
			array('year_begin, year_end, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>30),
                        array('comments', 'length', 'max'=>100),
			array('comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, name, year_begin, year_end, comments, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'year_begin' => 'Year Begin',
			'year_end' => 'Year End',
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
		$criteria->compare('year_begin',$this->year_begin);
		$criteria->compare('year_end',$this->year_end);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
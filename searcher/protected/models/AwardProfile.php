<?php

/**
 * This is the model class for table "tbl_award_profile".
 *
 * The followings are the available columns in table 'tbl_award_profile':
 * @property string $id
 * @property string $user_id
 * @property integer $year
 * @property string $award_name
 * @property string $comments
 * @property string $region
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 */
class AwardProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AwardProfile the static model class
	 */
        public static $AwardDateArray
          = array(
  
                    1=>'6th Grade',
                    2=>'7th Grade',
                    3=>'8th Grade',
                    4=>'9th Grade',
                    5=>'10th Grade',
                    6=>'11th Grade',
                    7=>'12th Grade',

               );
    
       public static $RegionArray
          = array(
                  1=>'Town/City',
                 2=>'County',
                 3=>'District',
                 4=>'Region',
                 5=>'State',
              6=>'Multi-State',
              7=>'National',
              8=>'International'
               );   
       
        public static function convertDate($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=20) && ($inCode >0)) {
                $myReturnValue = AwardProfile::$AwardDateArray[$inCode];
            }
            return $myReturnValue;
        }   
        public static function convertRegion($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=20) && ($inCode >0)) {
                $myReturnValue = AwardProfile::$RegionArray[$inCode];
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
		return 'tbl_award_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, award_name, year, region', 'required'),
			array('year', 'numerical', 'integerOnly'=>true),
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('award_name', 'length', 'max'=>30),
			array('comments', 'length', 'max'=>50),
			array('region', 'length', 'max'=>1),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, year, award_name, comments, region, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'year' => 'Year',
			'award_name' => 'Award Name',
			'comments' => 'Comments',
			'region' => 'Region',
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
		$criteria->compare('year',$this->year);
		$criteria->compare('award_name',$this->award_name,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getAwardByUser(){
	
			$myID = Yii::app()->user->id;	
			$AwardArr = AwardProfile::model()->findAll('user_id =:id', array(':id'=>$myID));
			return $AwardArr;
	}
	        
        protected function afterSave()
        {

            $this->updateAcademicTotals();

            return parent::afterSave();
        //return true;
        }

        
        protected function afterDelete()
        {

            $this->updateAcademicTotals();

            return parent::afterDelete();
        //return true;
        }
}
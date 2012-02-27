<?php

/**
 * This is the model class for table "tbl_subject_profile".
 *
 * The followings are the available columns in table 'tbl_subject_profile':
 * @property string $id
 * @property string $user_id
 * @property integer $year_taken
 * @property string $subject
 * @property integer $honors_or_AP
 * @property integer $num_months
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class SubjectProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SubjectProfile the static model class
	 */
        public static $YearArray
          = array(1=>'Freshman',
                  2=>'Sophomore',
                 3=>'Junior',
                 4=>'Senior',
                 
               );

        public static $HonorsArray
          = array(
                  1=>'Honors',
                  2=>'AP',
                  3=>'College'
               );
        
        public static function convertYear($inYear)
        {
            $myReturnValue = "";
            if (($inYear !=="") && ($inYear !==NULL) && ($inYear <=4) && ($inYear >=1)) {
                $myReturnValue = SubjectProfile::$YearArray[$inYear];
            }
            return $myReturnValue;
        }
        
 
        public static function convertHonors($inHonors)
        {
            $myReturnValue = "";
            if (($inHonors !=="") && ($inHonors !==NULL) && ($inHonors <=3) && ($inHonors >=1)) {
                $myReturnValue = SubjectProfile::$HonorsArray[$inHonors];
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
		return 'tbl_subject_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, subject_id', 'required'),
			array('year_taken, honors_or_AP, num_months, subject_id', 'numerical', 'integerOnly'=>true),
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
						array('create_time, update_time, honors_or_AP, num_months', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, year_taken, subject_id, honors_or_AP, num_months, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
                    	'subject' => array(self::BELONGS_TO, 'SubjectType', 'subject_id'),
			
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
			'year_taken' => 'Year Taken',
			'subject_id' => 'Subject',
			'honors_or_AP' => 'Honors Or Ap',
			'num_months' => 'Num Months',
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
		$criteria->compare('year_taken',$this->year_taken);
		$criteria->compare('subject_id',$this->subject_id,true);
		$criteria->compare('honors_or_AP',$this->honors_or_AP);
		$criteria->compare('num_months',$this->num_months);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
        
        public function getSubject() 
        { 
             $subjectArray = CHtml::listData(SubjectType::model()->findAll(), 'id', 'name');
             return $subjectArray;
        }
        
        public static function getSubjectById() 
        { 
			$myID = Yii::app()->user->id;	
			$SubjectArr = SubjectProfile::model()->findAll('user_id =:id', array(':id'=>$myID));
			return $SubjectArr;
        }
			
        
}
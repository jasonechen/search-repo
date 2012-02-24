<?php

/**
 * This is the model class for table "tbl_personal_profile".
 *
 * The followings are the available columns in table 'tbl_personal_profile':
 * @property string $user_id
 * @property string $date_of_birth
 * @property string $citizenship
 * @property string $legacy_direct
 * @property string $legacy_indirect
 * @property string $hometown_zipcode
 * @property string $income_bracket
 * @property string $parental_status
 * @property string $other_schools_admitted
 * @property string $religion_id
 * @property string $foreign_languages_spoken
 * @property string $current_major
 * @property integer $hs_grad_year
 * @property string $is_sibling_attending
 * @property string $skills
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property ReligionType $religion
 * @property User $user
 */
class PersonalProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PersonalProfile the static model class
	 */
    
        public $alumni_connections;
        public $alumni_connections_flag;
        public $foreign_lang_spoken;
         
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_personal_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, hs_grad_year, state, hometown_zipcode', 'required'),
			array('hs_grad_year', 'numerical', 'integerOnly'=>true),
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('citizenship', 'length', 'max'=>3),
			array('legacy_direct, legacy_indirect, income_bracket, parental_status', 'length', 'max'=>1),
			array('hometown_zipcode', 'length', 'max'=>5),
			array('other_schools_admitted, current_major', 'length', 'max'=>50),
			array('religion_id', 'length', 'max'=>2),
			array('foreign_languages_spoken', 'length', 'max'=>30),
			array('skills', 'length', 'max'=>100),
                        array('ethnic_origin, date_of_birth, create_time, update_time, alumni_connections_flag, state', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, date_of_birth, citizenship, alumni_connections, legacy_direct, legacy_indirect, hometown_zipcode, income_bracket, parental_status, other_schools_admitted, religion_id, foreign_languages_spoken, current_major, hs_grad_year, is_sibling_attending, skills, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'religion' => array(self::BELONGS_TO, 'ReligionType', 'religion_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'lang' => array(self::BELONGS_TO, 'LanguageType', 'foreign_languages_spoken'),
            'citizenship' => array(self::BELONGS_TO, 'CitizenType', 'citizenship'),
            'ethnicity' => array(self::BELONGS_TO, 'EthnicType', 'ethnic_origin'),
            'states' => array(self::BELONGS_TO, 'State', 'state'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'date_of_birth' => 'Date Of Birth (yyyy-mm-dd)',
			'citizenship' => 'Citizenship',
			'alumni_connections' => 'Alumni Connections',
                        'ethnic_origin' => 'Ethnicity',
			'legacy_direct' => 'Legacy Direct',
			'legacy_indirect' => 'Legacy Indirect',
			'hometown_zipcode' => 'Hometown Zipcode',
			'income_bracket' => 'Income Bracket',
			'parental_status' => 'Parental Status',
			'other_schools_admitted' => 'Other Schools Admitted',
			'religion_id' => 'Religion',
			'foreign_languages_spoken' => 'Foreign Languages Spoken',
			'current_major' => 'Current Major',
			'hs_grad_year' => 'Hs Grad Year',
			'is_sibling_attending' => 'Is Sibling Attending',
			'skills' => 'Skills',
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

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('citizenship',$this->citizenship,true);
		$criteria->compare('legacy_direct',$this->legacy_direct,true);
                $criteria->compare('ethnic_origin',$this->ethnic_origin,true);
		$criteria->compare('legacy_indirect',$this->legacy_indirect,true);
		$criteria->compare('hometown_zipcode',$this->hometown_zipcode,true);
		$criteria->compare('income_bracket',$this->income_bracket,true);
		$criteria->compare('parental_status',$this->parental_status,true);
		$criteria->compare('other_schools_admitted',$this->other_schools_admitted,true);
		$criteria->compare('religion_id',$this->religion_id,true);
		$criteria->compare('foreign_languages_spoken',$this->foreign_languages_spoken,true);
		$criteria->compare('current_major',$this->current_major,true);
		$criteria->compare('hs_grad_year',$this->hs_grad_year);
		$criteria->compare('is_sibling_attending',$this->is_sibling_attending,true);
		$criteria->compare('skills',$this->skills,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        function getReligionOptions() 
        { 
             $religionArray = CHtml::listData(ReligionType::model()->findAll(), 'id', 'name');
             return $religionArray;
        }

        function getCitizenshipOptions() 
        { 
             $citizenshipArray = CHtml::listData(CitizenType::model()->findAll(), 'id', 'name');
             return $citizenshipArray;
        }

 
        function getMajorOptions() 
        { 
             $majorArray = CHtml::listData(MajorType::model()->findAll(), 'id', 'name');
             return $majorArray;
        }       
        
        function getEthnicOptions() 
        { 
             $ethnicArray = CHtml::listData(EthnicType::model()->findAll(), 'id', 'name');
             return $ethnicArray;
        }
        
           function getState() 
        { 
             $stateArray = CHtml::listData(States::model()->findAll(), 'id', 'name');
             return $stateArray;
        }
}
<?php

/**
 * This is the model class for table "tbl_language_profile".
 *
 * The followings are the available columns in table 'tbl_language_profile':
 * @property integer $id
 * @property integer $user_id
 * @property string $language_id
 * @property integer $fluency
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class LanguageProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LanguageProfile the static model class
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
		return 'tbl_language_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, language_id, fluency', 'required'),
			array('user_id, fluency, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('user_id, language_id', 'length', 'max'=>10),
                        array('language_id, fluency, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, language_id, fluency, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
                'lang' => array(self::BELONGS_TO, 'LanguageType', 'language_id'),
                'fluenc' => array(self::BELONGS_TO, 'LanguageType', 'fluency'),      
                    
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
			'language_id' => 'Language',
			'fluency' => 'Fluency',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('language_id',$this->language_id,true);
		$criteria->compare('fluency',$this->fluency);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getLangTypeOptions() 
        { 
             $testArray = CHtml::listData(LanguageType::model()->findAll(), 'id', 'name');
             return $testArray;


        }
        
        public static $FluencyArray
          = array(0=>'',
                '1'=>'Full Fluency',
                '2'=>'Moderate Speaking and Reading Fluency',
                '3'=>'Speaking Only Fluency',
                '4'=>'Elementary Fluency',
                '5'=>'Reading Fluency Only');
        
        public static function convertFluency($inFluency)
        {
            $myReturnValue = "";
            if (($inFluency !=="") && ($inFluency !==NULL) && ($inFluency <=6) && ($inFluency >=0)) {
                $myReturnValue = LanguageProfile::$FluencyArray[$inFluency];
            }
            return $myReturnValue;
        }
        
        
        protected function updateLangTotals()
        {

                $myID = Yii::app()->user->id;
                $basicProfile=BasicProfile::model()->findByPk($myID);
                $languageProfile=LanguageProfile::model()->findByPk($myID);
                /*$numLanguages = 0;
                
                if($basicProfile===null)
                {                
                        $basicProfile=new BasicProfile;
                        $basicProfile->user_id = $myID;
                        $basicProfile->first_university_id = 1;
                        $basicProfile->curr_university_id = 1;
                        $basicProfile->num_academics = 0;
                        $basicProfile->num_extracurriculars = 0;
                        $basicProfile->num_sports = 0;
                        $basicProfile->num_competitions = 0;
                        $basicProfile->num_essays = 0;
                        $basicProfile->profile_type = 0;
                        $basicProfile->l1ForSale = 0;
                        $basicProfile->l2ForSale = 0;
                        $basicProfile->l3ForSale = 0;
                }
           
                $numAps = ApProfile::model()->countByAttributes(array('user_id'=>$myID));
                $numLanguages = $this->countByAttributes(array('user_id'=>$myID));
                $basicProfile->num_sat2s = $numSat2s;
                $basicProfile->num_aps = $numAps;
                $basicProfile->num_scores = $numScores + $numAps + $numSat2s;
                $basicProfile->save(true);

                return true;*/
        }
        
        protected function afterSave()
        {

                $this->updateLangTotals();

                return parent::afterSave();
        //return true;
        }
        
        protected function afterDelete()
        {

                $this->updateLangTotals();

                return parent::afterDelete();
        //return true;
        }    
 	
}
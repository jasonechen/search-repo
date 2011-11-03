<?php

/**
 * This is the model class for table "tbl_ap_profile".
 *
 * The followings are the available columns in table 'tbl_ap_profile':
 * @property string $id
 * @property string $user_id
 * @property string $ap_id
 * @property string $score
 * @property string $date_taken
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property ApType $ap
 * @property User $user
 */
class ApProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ApProfile the static model class
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
		return 'tbl_ap_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, ap_id, score', 'required'),
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('ap_id', 'length', 'max'=>2),
			array('score', 'length', 'max'=>1),
                        array('score', 'in', 'range'=>range(1,5,1),'message'=>'Score is not valid!'),
			array('date_taken, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, ap_id, score, date_taken, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'ap' => array(self::BELONGS_TO, 'ApType', 'ap_id'),
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
			'ap_id' => 'Ap',
			'score' => 'Score',
			'date_taken' => 'Date Taken',
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
		$criteria->compare('ap_id',$this->ap_id,true);
		$criteria->compare('score',$this->score,true);
		$criteria->compare('date_taken',$this->date_taken,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        

        
       public function getTestTypeOptions() 
        { 
             $apTestArray = CHtml::listData(ApType::model()->findAll(), 'id', 'name');
             return $apTestArray;
        }

        
        protected function updateScoreTotals()
        {
                $myID = Yii::app()->user->id;
                $basicProfile=BasicProfile::model()->findByPk($myID);
                $scoreProfile=ScoreProfile::model()->findByPk($myID);
                $numScores = 0;
                if ($scoreProfile !==null)
                {    
                    if (($scoreProfile->SAT_Math!==NULL) && ($scoreProfile->SAT_Math!=="")) ++$numScores;
                    if (($scoreProfile->SAT_Critical_Read!==NULL) && ($scoreProfile->SAT_Critical_Read!=="")) ++$numScores;
                    if (($scoreProfile->SAT_Writing!==NULL) && ($scoreProfile->SAT_Writing!=="")) ++$numScores;
                    if (($scoreProfile->SAT_Essay!==NULL) && ($scoreProfile->SAT_Essay!=="")) ++$numScores;
                    if (($scoreProfile->PSAT_Math!==NULL) && ($scoreProfile->PSAT_Math!=="")) ++$numScores;
                    if (($scoreProfile->PSAT_Verbal!==NULL) && ($scoreProfile->PSAT_Verbal!=="")) ++$numScores;
                    if (($scoreProfile->PSAT_Writing!==NULL) && ($scoreProfile->PSAT_Writing!=="")) ++$numScores;
                    if (($scoreProfile->ACT_English!==NULL) && ($scoreProfile->ACT_English!=="")) ++$numScores;
                    if (($scoreProfile->ACT_Math!==NULL) && ($scoreProfile->ACT_Math!=="")) ++$numScores;
                    if (($scoreProfile->ACT_Reading!==NULL) && ($scoreProfile->ACT_Reading!=="")) ++$numScores;
                    if (($scoreProfile->ACT_Science!==NULL) && ($scoreProfile->ACT_Science!=="")) ++$numScores;
                    if (($scoreProfile->ACT_Writing!==NULL) && ($scoreProfile->ACT_Writing!=="")) ++$numScores;
                    if (($scoreProfile->ACT_Composite!==NULL) && ($scoreProfile->ACT_Composite!=="")) ++$numScores;
                }
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
           
                $numAps = $this->countByAttributes(array('user_id'=>$myID));
                $numSat2s = Sat2Profile::model()->countByAttributes(array('user_id'=>$myID));
                $basicProfile->num_sat2s = $numSat2s;
                $basicProfile->num_aps = $numAps;
                $basicProfile->num_scores = $numScores + $numAps + $numSat2s;
                $basicProfile->save(true);       
                return true;
        }
        
        protected function afterSave()
        {

                $this->updateScoreTotals();

                return parent::afterSave();
        //return true;
        }

        
        protected function afterDelete()
        {

                $this->updateScoreTotals();

                return parent::afterDelete();
        //return true;
        }
}



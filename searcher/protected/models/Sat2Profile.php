<?php

/**
 * This is the model class for table "tbl_sat2_profile".
 *
 * The followings are the available columns in table 'tbl_sat2_profile':
 * @property string $id
 * @property string $user_id
 * @property string $sat2_id
 * @property integer $score
 * @property string $date_taken
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Sat2Type $sat2
 */
class Sat2Profile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Sat2Profile the static model class
	 */
	
    
        public static $Sat2ScoreArray
          = array(
    
800=>'800',
790=>'790',
780=>'780',
770=>'770',
760=>'760',
750=>'750',
740=>'740',
730=>'730',
720=>'720',
710=>'710',
700=>'700',
690=>'690',
680=>'680',
670=>'670',
660=>'660',
650=>'650',
640=>'640',
630=>'630',
620=>'620',
610=>'610',
600=>'600',
590=>'590',
580=>'580',
570=>'570',
560=>'560',
550=>'550',
540=>'540',
530=>'530',
520=>'520',
510=>'510',
500=>'500',
490=>'490',
480=>'480',
470=>'470',
460=>'460',
450=>'450',
440=>'440',
430=>'430',
420=>'420',
410=>'410',
400=>'400',
390=>'390',
380=>'380',
370=>'370',
360=>'360',
350=>'350',
340=>'340',
330=>'330',
320=>'320',
310=>'310',
300=>'300',
290=>'290',
280=>'280',
270=>'270',
260=>'260',
250=>'250',
240=>'240',
230=>'230',
220=>'220',
210=>'210',
200=>'200'


               );    
    
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_sat2_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, sat2_id, score', 'required'),
			array('score', 'numerical', 'integerOnly'=>true),
                    	array('score', 'in', 'range'=>range(200,800,10),'message'=>'Score is not valid!'),
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('sat2_id', 'length', 'max'=>2),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, sat2_id, score, date_taken, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'sat2' => array(self::BELONGS_TO, 'Sat2Type', 'sat2_id'),
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
			'sat2_id' => 'Sat2',
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
		$criteria->compare('sat2_id',$this->sat2_id,true);
		$criteria->compare('score',$this->score);
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
             $testArray = CHtml::listData(Sat2Type::model()->findAll(), 'id', 'subject');
             return $testArray;


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
                        $basicProfile->initialize($myID);
                }
           
                $numAps = ApProfile::model()->countByAttributes(array('user_id'=>$myID));
                $numSat2s = $this->countByAttributes(array('user_id'=>$myID));
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
		
	public static function getSat2ByUser(){
	
            $myID = Yii::app()->user->id;	
            $Sat2Arr = Sat2Profile::model()->findAll('user_id =:id', array(':id'=>$myID));
            return $Sat2Arr;
	}
}
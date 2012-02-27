<?php

/**
 * This is the model class for table "tbl_sport_profile".
 *
 * The followings are the available columns in table 'tbl_sport_profile':
 * @property string $id
 * @property string $user_id
 * @property string $sport_id
 * @property string $year
 * @property string $level
 * @property string $leadership
 * @property string $ranking
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property SportType $sport
 * @property User $user
 */
class SportProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SportProfile the static model class
	 */
    
       public static $LeadershipArray
          = array(
                  1=>'None',
                 2=>'Captain',
                 3=>'Manager',
                 4=>'Fundraiser',
                 5=>'Other',
               );
           
      public static $LevelArray
          = array(
                  1=>'Frosh',
                 2=>'Junior Varsity (JV)',
                 3=>'Varsity',
                 
               );
      
      public static $IndivRankArray
          = array(
                 1=>'None',
                 2=>'Playoffs',
                 3=>'League Runner Up',
                 4=>'League Champion',
                 5=>'County Runner Up',
                 6=>'County Champion',
                 7=>'District Runner Up',
                 8=>'District Champion',
                 9=>'Regional Runner Up',
                 10=>'Regional Champion',
                 11=>'State Runner Up',
                 12=>'State Champion',
                 13=>'National Runner Up',
                 14=>'National Champion',
                 15=>'Tournament Runner Up',
                 16=>'Tournament Champion',
                 17=>'Multiple Tournament Champion',
                 18=>'Other',
               );
           
      public static $TeamRankArray
          = array(
                 1=>'None',
                 2=>'Playoffs',
                 3=>'League Runner Up',
                 4=>'League Champion',
                 5=>'County Runner Up',
                 6=>'County Champion',
                 7=>'District Runner Up',
                 8=>'District Champion',
                 9=>'Regional Runner Up',
                 10=>'Regional Champion',
                 11=>'State Runner Up',
                 12=>'State Champion',
                 13=>'National Runner Up',
                 14=>'National Champion',
                 15=>'Other',
               );
      
            public static $OtherRecogArray
          = array(
                 1=>'None',
                 2=>'All County - 1st Team',
                 3=>'All County - 2nd Team',
                 4=>'All County - Honorable Mention',
                 5=>'All District- 1st Team',
                 6=>'All District- 2nd Team',
                 7=>'All District- Honorable Mention',
                 8=>'All District- 1st Team',
                 9=>'All District- 2nd Team',
                 10=>'All District- Honorable Mention',                       
                 11=>'All State- 1st Team',
                 12=>'All State- 2nd Team',
                 13=>'All State- Honorable Mention',
                 14=>'All America- 1st Team',
                 15=>'All America- 2nd Team',
                 16=>'All America- Honorable Mention',
                 17=>'Season MVP',
                 18=>'Tournament MVP',
                 19=>'Tournament Champion',
                 20=>'Multiple Tournament Champion',
                 21=>'Other',
               );
      
        public static $YearParticipateArray
          = array(
                  1=>'Pre-K',
                    2=>'K',
                    3=>'1st Grade',
                    4=>'2nd Grade',
                    5=>'3rd Grade',
                    6=>'4th Grade',
                    7=>'5th Grade',
                    8=>'6th Grade',
                    9=>'7th Grade',
                    10=>'8th Grade',
                    11=>'9th Grade',
                    12=>'10th Grade',
                    13=>'11th Grade',
                    14=>'12th Grade',

               );
       
        public static function convertLeader($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=5) && ($inCode >0)) {
                $myReturnValue = SportProfile::$LeadershipArray[$inCode];
            }
            return $myReturnValue;
        }   
    
        public static function convertLevel($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=3) && ($inCode >0)) {
                $myReturnValue = SportProfile::$LevelArray[$inCode];
            }
            return $myReturnValue;
        }
        
        public static function convertIndivRank($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=18) && ($inCode >0)) {
                $myReturnValue = SportProfile::$IndivRankArray[$inCode];
            }
            return $myReturnValue;
        }
        
        public static function convertTeamRank($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=15) && ($inCode >0)) {
                $myReturnValue = SportProfile::$TeamRankArray[$inCode];
            }
            return $myReturnValue;
        }
        
        public static function convertOtherRecog($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=21) && ($inCode >0)) {
                $myReturnValue = SportProfile::$OtherRecogArray[$inCode];
            }
            return $myReturnValue;
        }
        
        public static function convertYears($inCode)
        {
            $myReturnValue = "";
            if (($inCode !=="") && ($inCode !==NULL) && ($inCode <=14) && ($inCode >0)) {
                $myReturnValue = SportProfile::$YearParticipateArray[$inCode];
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
		return 'tbl_sport_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, sport_id, year_begin, year_end', 'required'),
			array('user_id, leadership, create_user_id, update_user_id', 'length', 'max'=>10),
                        array('level, indiv_rank, team_rank, other_recog','safe'),
			array('sport_id', 'length', 'max'=>3),
			array('comments', 'length', 'max'=>70),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, sport_id, year_begin, year_end, level, comments, leadership, team_rank, indiv_rank, other_recog, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'sport' => array(self::BELONGS_TO, 'SportType', 'sport_id'),
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
			'sport_id' => 'Sport',
			'year_begin' => 'From',
                    	'year_end' => 'To',
			'level' => 'Level',
			'leadership' => 'Leadership',
                        'indiv_rank' => 'Individual Ranking',
			'team_rank' => 'Team Ranking',
                        'other_recog' => 'Other Recognition',
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
		$criteria->compare('sport_id',$this->sport_id,true);
		$criteria->compare('year_begin',$this->year_begin);
                $criteria->compare('year_end',$this->year_end);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('leadership',$this->leadership,true);
		$criteria->compare('indiv_rank',$this->indiv_rank,true);
                $criteria->compare('team_rank',$this->team_rank,true);
                $criteria->compare('other_recog',$this->other_recog,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
       public function getSportTypeOptions() 
        { 
             $sportArray = CHtml::listData(SportType::model()->findAll(), 'id', 'name');
             return $sportArray;


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

            return parent::afterDelete();
        //return true;
        }
		
	 public static function getSportsByUser() 
        { 
			$myID = Yii::app()->user->id;	
			$SportsArr = SportProfile::model()->findAll('user_id =:id', array(':id'=>$myID));
			return $SportsArr;
        }
}


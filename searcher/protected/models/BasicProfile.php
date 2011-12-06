<?php

/**
 * This is the model class for table "tbl_basic_profile".
 *
 * The followings are the available columns in table 'tbl_basic_profile':
 * @property string $user_id
 * @property string $nickname
 * @property integer $first_university_id
 * @property integer $curr_university_id
 * @property string $isTransfer
 * @property string $gender
 * @property string $highSchoolType
 * @property string $race_id
 * @property integer $sat_I_score_range
 * @property integer $num_scores
 * @property integer $num_aps
 * @property integer $num_sat2s
 * @property integer $num_competitions
 * @property integer $num_sports
 * @property integer $num_academics
 * @property integer $num_extracurriculars
 * @property integer $num_essays
 * @property integer $avg_profile_rating
 * @property integer $l1ForSale
 * @property integer $l2ForSale
 * @property integer $l3ForSale
 * @property string $musical_instrument_id
 * @property integer $profile_type
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property RaceType $race
 * @property User $user
 * @property UniversityName $firstUniversity
 * @property UniversityName $currUniversity
 */
class BasicProfile extends ProfileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BasicProfile the static model class
	 */
         public $first_university_name;
         public $curr_university_name;
         public $other_university_name;
         public $high_school_name;
         public $stateName;
         
        public static $SATRangeArray 
          = array("NA","2310 to 2400","2210 to 2300","2110 to 2200",
              "2010 to 2100","1910 to 2000","1810 to 1900",
              "1710 to 1800","1610 to 1700","1510 to 1600",
              "1410 to 1500","1310 to 1400","1210 to 1300",
              "1110 to 1200","1010 to 1100","910 to 1000",
              "810 to 900","710 to 800","600 to 700");      
        
        public static $ProfileTypeArray
          = array(
                 1=>'Average Joe',
                 2=>'Nerd',
                 3=>'Brain',
                 4=>'Jock',
                 5=>'Student Leader',
                 6=>'Musician',
                 7=>'Artist',
                 8=>'Well-rounded',
                 9=>'Rebel',
                 10=>'Class Clown',
                 11=>'Loner',
                 12=>'Mean Girl',
                 13=>'Cool Kid',
                 14=>'Skater',
                 15=>'Goth/Punk',
                 16=>'Gym Rat',
                 17=>'Rich Kid', 
               );

        public static $GenderArray
          = array(
                 'M'=>'Male',
                 'F'=>'Female',
              );
        
        public static function getGender($indexVal)
	{
   
            return BasicProfile::$GenderArray[$indexVal];
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
		return 'tbl_basic_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('highSchoolType nickname, user_id, curr_university_id, num_scores, num_aps, num_sat2s, num_competitions, num_sports, num_academics, num_extracurriculars, num_essays, profile_type', 'required'),
			array('first_university_id, curr_university_id, highschool_id, sat_I_score_range, num_scores, num_aps, num_sat2s, num_competitions, num_sports, num_academics, num_extracurriculars, num_essays, avg_profile_rating, l1ForSale, l2ForSale, l3ForSale, profile_type', 'numerical', 'integerOnly'=>true),
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('isTransfer, gender, race_id', 'length', 'max'=>1),
			array('highSchoolType', 'length', 'max'=>3),
			array('musical_instrument_id', 'length', 'max'=>2),
			array('nickname, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('race,firstUniversity,hsName, highschool_id, user_id, first_university_id, curr_university_id, isTransfer, gender, highSchoolType, race_id, sat_I_score_range, num_scores, num_aps, num_sat2s, num_competitions, num_sports, num_academics, num_extracurriculars, num_essays, avg_profile_rating, l1ForSale, l2ForSale, l3ForSale, musical_instrument_id, profile_type, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),

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
			'race' => array(self::BELONGS_TO, 'RaceType', 'race_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'firstUniversity' => array(self::BELONGS_TO, 'UniversityName', 'first_university_id'),
			'currUniversity' => array(self::BELONGS_TO, 'UniversityName', 'curr_university_id'),
            'hsName' => array(self::BELONGS_TO, 'HighschoolName', 'highschool_id'),
            'purchasedProfile' => array(self::HAS_MANY, 'MapProfileStudent', '',
//                                    'params'=>array(":userID"=>Yii::app()->user->id),
//                                    'params'=>array(":userID"=>"$userID"),
                                    'joinType'=>'INNER JOIN',
                                    'on'=>'t.user_id=purchased_profile_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'first_university_id' => 'First University',
			'curr_university_id' => 'Curr University',
			'isTransfer' => 'Is Transfer',
			'gender' => 'Sex',
                        'highschool_id' => 'High School',
			'highSchoolType' => 'High School Type',
			'race_id' => 'Race',
			'sat_I_score_range' => 'Sat I Score Range',
			'num_scores' => 'Num Scores',
			'num_aps' => 'Num Aps',
			'num_sat2s' => 'Num Sat2s',
			'num_competitions' => 'Num Competitions',
			'num_sports' => 'Num Sports',
			'num_academics' => 'Num Academics',
			'num_extracurriculars' => 'Num Extracurriculars',
			'num_essays' => 'Num Essays',
			'avg_profile_rating' => 'Avg Profile Rating',
			'l1ForSale' => 'L1 For Sale',
			'l2ForSale' => 'L2 For Sale',
			'l3ForSale' => 'L3 For Sale',
			'musical_instrument_id' => 'Musical Instrument',
			'profile_type' => 'Profile Type',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
            'stateName' => 'State',
		);
	}

        public function getProfileData()
        {
                $criteria=new CDbCriteria;
        	return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
                $tempUserID = -999;
                if (!Yii::app()->user->getIsGuest()){
                    $tempUserID = Yii::app()->user->id;
                }
               $criteria->params = array(":userID"=>$tempUserID);
//		$criteria->compare('user_id',$this->user_id,true);
//                $criteria->compare('update_user_id',$this->update_user_id,true);
//		$criteria->compare('first_university_id',$this->first_university_id);
//                $criteria->compare('name',$this->firstUniversity,true);
//		$criteria->compare('curr_university_id',$this->curr_university_id);
//		$criteria->compare('isTransfer',$this->isTransfer,true);
//		$criteria->compare('gender',$this->gender,true);
//		$criteria->compare('highSchoolType',$this->highSchoolType,true);
//		$criteria->compare('race_id',$this->race_id,true);
//		$criteria->compare('sat_I_score_range',$this->sat_I_score_range);
//		$criteria->compare('num_scores',$this->num_scores);
//		$criteria->compare('num_aps',$this->num_aps);
//		$criteria->compare('num_sat2s',$this->num_sat2s);
//		$criteria->compare('num_competitions',$this->num_competitions);
//		$criteria->compare('num_sports',$this->num_sports);
//		$criteria->compare('num_academics',$this->num_academics);
//		$criteria->compare('num_extracurriculars',$this->num_extracurriculars);
//		$criteria->compare('num_essays',$this->num_essays);
//		$criteria->compare('profile_type',$this->profile_type);
//	        $criteria->with = array('firstUniversity');
//	        
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('sat_I_score_range',$this->sat_I_score_range);
		$criteria->compare('num_scores',$this->num_scores);
		$criteria->compare('num_academics',$this->num_academics);
		$criteria->compare('num_extracurriculars',$this->num_extracurriculars);
		$criteria->compare('num_essays',$this->num_essays);
		$criteria->compare('avg_profile_rating',$this->avg_profile_rating);
		$criteria->compare('l1ForSale',$this->l1ForSale);
		$criteria->compare('l2ForSale',$this->l2ForSale);
		$criteria->compare('l3ForSale',$this->l3ForSale);
		$criteria->compare('musical_instrument_id',$this->musical_instrument_id,true);
		$criteria->compare('profile_type',$this->profile_type);
                $criteria->compare('name',$this->firstUniversity,true);
                $criteria->compare('name',$this->hsName,true);
		$criteria->compare('name',$this->race,true);
	        $criteria->with = array('firstUniversity');
                $criteria->with = array('hsName');
 	        $criteria->with = array('race');               
               	$criteria->compare('gender',$this->gender,true);
                $criteria->condition = "(l1ForSale = 1 or l2ForSale=1 or l3ForSale=1) and (user_id!=:userID)";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
	public function searchMine()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
//                $userID = Yii::app()->user->id;
		$criteria=new CDbCriteria;
               $criteria->params = array(":userID"=>Yii::app()->user->id);
               $criteria->with = array('purchasedProfile');
               $criteria->together = true;
//		$criteria->compare('user_id',$this->user_id,true);
//                $criteria->compare('update_user_id',$this->update_user_id,true);
//		$criteria->compare('first_university_id',$this->first_university_id);
//                $criteria->compare('name',$this->firstUniversity,true);
//		$criteria->compare('curr_university_id',$this->curr_university_id);
//		$criteria->compare('isTransfer',$this->isTransfer,true);
//		$criteria->compare('gender',$this->gender,true);
//		$criteria->compare('highSchoolType',$this->highSchoolType,true);
//		$criteria->compare('race_id',$this->race_id,true);
//		$criteria->compare('sat_I_score_range',$this->sat_I_score_range);
//		$criteria->compare('num_scores',$this->num_scores);
//		$criteria->compare('num_aps',$this->num_aps);
//		$criteria->compare('num_sat2s',$this->num_sat2s);
//		$criteria->compare('num_competitions',$this->num_competitions);
//		$criteria->compare('num_sports',$this->num_sports);
//		$criteria->compare('num_academics',$this->num_academics);
//		$criteria->compare('num_extracurriculars',$this->num_extracurriculars);
//		$criteria->compare('num_essays',$this->num_essays);
//		$criteria->compare('profile_type',$this->profile_type);
//	        $criteria->with = array('firstUniversity');
//	        
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('sat_I_score_range',$this->sat_I_score_range);
		$criteria->compare('num_scores',$this->num_scores);
		$criteria->compare('num_academics',$this->num_academics);
		$criteria->compare('num_extracurriculars',$this->num_extracurriculars);
		$criteria->compare('num_essays',$this->num_essays);
		$criteria->compare('avg_profile_rating',$this->avg_profile_rating);
		$criteria->compare('l1ForSale',$this->l1ForSale);
		$criteria->compare('l2ForSale',$this->l2ForSale);
		$criteria->compare('l3ForSale',$this->l3ForSale);
		$criteria->compare('musical_instrument_id',$this->musical_instrument_id,true);
		$criteria->compare('profile_type',$this->profile_type);
                $criteria->compare('name',$this->firstUniversity,true);
                $criteria->compare('name',$this->hsName,true);
		$criteria->compare('name',$this->race,true);
                $criteria->compare('gender',$this->gender,true);
	        $criteria->with = array('firstUniversity');
                $criteria->with = array('hsName');
 	        $criteria->with = array('race','purchasedProfile');
                $criteria->condition = "purchasedProfile.user_id=:userID AND purchasedProfile.purchased_profile_id!=:userID";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getUniversityOptions() 
        { 
             $universityArray = CHtml::listData(UniversityName::model()->findAll(), 'id', 'name');
             return $universityArray;


        }

        public function getNameUniversityOptions()
        {
            $universityArray = CHtml::listData(UniversityName::model()->findAll(), 'name', 'name');
            return $universityArray;
        }
        
        public function getRaceOptions()
        {
             $raceArray = CHtml::listData(RaceType::model()->findAll(), 'id', 'name');
             return $raceArray;


        }

        public function getNameRaceOptions()
        {
            $raceArray = CHtml::listData(RaceType::model()->findAll(), 'name', 'name');
            return $raceArray;
        }
        
        public static function getSATIndex($scoreVal)
	{
            if ($scoreVal > 2300) {
                $value = 1;
            }
            else if ($scoreVal > 2200) {
                $value = 2;
            }
            else if ($scoreVal > 2100) {
                $value = 3;
            }
            else if ($scoreVal > 2000) {
                $value = 4;
            }
            else if ($scoreVal > 1900) {
                $value = 5;
            }
            else if ($scoreVal > 1800) {
                $value = 6;
            }
            else if ($scoreVal > 1700) {
                $value = 7;
            }
            else if ($scoreVal > 1600) {
                $value = 8;
            }
            else if ($scoreVal > 1500) {
                $value = 9;
            }
            else if ($scoreVal > 1400) {
                $value = 10;
            }
            else if ($scoreVal > 1300) {
                $value = 11;
            }
            else if ($scoreVal > 1200) {
                $value = 12;
            }
            else if ($scoreVal > 1100) {
                $value = 13;
            }
            else if ($scoreVal > 1000) {
                $value = 14;
            }
            else if ($scoreVal > 900)  {
                $value = 15;
            }
            else if ($scoreVal > 800)  {
                $value = 16;
            }
            else if ($scoreVal > 700)  {
                $value = 17;
            }
            else if ($scoreVal >= 600) {
                $value = 18;
            }
            else $value = 0;
            return $value;
	}
        
        public static function getSATRange($indexVal)
	{
            if ($indexVal === null ){
                $indexVal = 0;
            }
            return BasicProfile::$SATRangeArray[$indexVal];
	}
        
        public static function getProfileTypeName($indexVal)
	{
   
            return BasicProfile::$ProfileTypeArray[$indexVal];
	}
        public static function getStateName($data)
        {
            if(!empty($data->user->personalProfile->state))
            {
                $stateId = $data->user->personalProfile->state;
                return States::model()->findByPk($stateId)->name;
            }
            return 'N/A';
        }
        
        public function checkBuyer($buyer_id,$mpStudent){
            if ($mpStudent === null){
                $buyerStatusArray = array('l1'=>$this->l1ForSale,'l2'=>$this->l2ForSale,'l3'=>$this->l3ForSale,
                    'owner'=>0);
                // Need to make sure that seller has ownership of all of these.
            }
            else{
                $buyerStatusArray = array();
                if ($mpStudent->l1_purchased){
                    $buyerStatusArray['l1'] = 2;
                }
                else{
                    $buyerStatusArray['l1'] = $this->l1ForSale;
                }
                if ($mpStudent->l2_purchased){
                    $buyerStatusArray['l2'] = 2;
                }
                else{
                    $buyerStatusArray['l2'] = $this->l2ForSale;
                }
                if ($mpStudent->l3_purchased){
                    $buyerStatusArray['l3'] = 2;
                }
                else{
                    $buyerStatusArray['l3'] = $this->l3ForSale;
                }
                $buyerStatusArray['owner'] = $mpStudent->isOwner;
            }
            return $buyerStatusArray;
            
        }        
	public function associateUserToRole($role, $userID)
	{
		$sql = "INSERT INTO tbl_map_profile_student (user_id, purchased_profile_id, role) VALUES (:projectId, :userId, :role)";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
		$command->bindValue(":userId", $userId, PDO::PARAM_INT);
		$command->bindValue(":role", $role, PDO::PARAM_STR);
		return $command->execute();
	}
	

	public function removeUserFromRole($role, $userId)
	{
		$sql = "DELETE FROM tbl_project_user_role WHERE project_id=:projectId AND user_id=:userId AND role=:role";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
		$command->bindValue(":userId", $userId, PDO::PARAM_INT);
		$command->bindValue(":role", $role, PDO::PARAM_STR);
		return $command->execute(); 
	}
	

	public function isUserInRole($role)
	{
		$sql = "SELECT role FROM tbl_project_user_role WHERE project_id=:projectId AND user_id=:userId AND role=:role";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
		$command->bindValue(":userId", Yii::app()->user->getId(), PDO::PARAM_INT);
		$command->bindValue(":role", $role, PDO::PARAM_STR);
		return $command->execute()==1 ? true : false;		
	}
	
	

	public function associateUserToProject($user)
	{
		$sql = "INSERT INTO tbl_project_user_assignment (project_id, user_id) VALUES (:projectId, :userId)";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
		$command->bindValue(":userId", $user->id, PDO::PARAM_INT);
		return $command->execute();    
	} 
	
	public function isUserInProject($user) 
	{
		$sql = "SELECT user_id FROM tbl_project_user_assignment WHERE project_id=:projectId AND user_id=:userId";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
		$command->bindValue(":userId", $user->id, PDO::PARAM_INT);
		return $command->execute()==1 ? true : false;
	}
	     
/**
* Suggests a list of existing values matching the specified keyword.
* @param string the keyword to be matched
* @param integer maximum number of names to be returned
* @return array list of matching lastnames
*/

        
}
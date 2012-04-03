<?php

/**
 * This is the model class for table "tbl_basic_profile".
 *
 * The followings are the available columns in table 'tbl_basic_profile':
 * @property string $user_id
 * @property string $nickname
 * @property integer $first_university_id
 * @property integer $curr_university_id
 * @property integer $early_regular
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
    public $countryName;
    public $fieldName;
        
    public $focus = array();
       
    
     public static $HighSchoolTypeArray 
          = array('PUB'=>'Public',
                    'PRN'=>'Private Non-Religious',
                    'PRR'=>'Private Religious',
                    'HOM'=>'Home-schooled',
                    'CHR'=>'Charter',
                    'OTH'=>'Other');

    public static $SATRanges =
        array(
            0 => '600',
            1 => '1200',
            2 => '1500',
            3 => '1800',
            4 => '2100',
            5 => '2400',
        );

    public static $SATRangeArray
        = array(
            "NA", "2110 to 2400", "1810 to 2100", "1510 to 1800",
            "1210 to 1500", "910 to 1200", "600 to 900"
        );

    public static $ProfileTypeArray
        = array(
            1 => 'Academics',
            2 => 'Arts & Drama',
            3 => 'Club Leader',
            4 => 'Competitions',
            5 => 'Job/Work',
            6 => 'Literary/Writing',
            7 => 'Music',
            8 => 'Sports',
            9 => 'Volunteer',
            10=> 'Well Rounded',
            11=> 'Other',
        );


    public static $GenderArray
        = array(
            'M'=> 'Male',
            'F'=> 'Female',
        );

    public static $EarlyRegularArray
        = array(
            0=> 'Early Admissions',
            1=> 'Regular Admissions',
        );

    /**
     * @static
     * @param $indexVal
     * @return string
     */

    public static function getGender($indexVal)
    {
        return (array_key_exists($indexVal, BasicProfile::$GenderArray) ? BasicProfile::$GenderArray[$indexVal] : 'NA');
    }

    /**
     * @static
     * @param $indexVal
     * @return string
     */

    public static function getEarlyRegular($indexVal)
    {
        return (array_key_exists($indexVal, BasicProfile::$EarlyRegularArray) ?
            BasicProfile::$EarlyRegularArray[$indexVal] : 'NA');
    }

    /**
     * @static
     * @param string $className
     * @return CActiveRecord
     */

    public static function model($className = __CLASS__)
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
			//basic rules 
			array('highSchoolType,nickname, user_id, curr_university_id', 'required'),
			array('race_id, gender', 'required','on'=>'demogr'),
                        array('nickname', 'unique'),
			//array('race_id, gender, highSchoolType nickname, user_id, curr_university_id, num_scores, num_aps, num_sat2s, num_competitions, num_sports, num_academics, num_extracurriculars, num_essays, profile_type', 'required'),
			array('first_university_id, curr_university_id, highschool_id, sat_I_score_range, num_scores, num_aps, num_sat2s, num_competitions, num_sports, num_academics, num_extracurriculars, num_essays, avg_profile_rating, l1ForSale, l2ForSale, l3ForSale, profile_type', 'numerical', 'integerOnly'=>true),
			array('user_id, create_user_id, update_user_id', 'length', 'max'=>10),
			array('isTransfer, gender, race_id', 'length', 'max'=>1),
			array('highSchoolType', 'length', 'max'=>3),
			array('musical_instrument_id', 'length', 'max'=>2),
                        array('first_university_name, curr_university_name', 'length', 'max'=>100),
			array('early_regular, nickname, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('verified,race,firstUniversity,hsName, highschool_id, user_id, first_university_id, curr_university_id, isTransfer, gender, highSchoolType, race_id, sat_I_score_range, num_scores, num_aps, num_sat2s, num_competitions, num_sports, num_academics, num_extracurriculars, num_essays, avg_profile_rating, l1ForSale, l2ForSale, l3ForSale, musical_instrument_id, profile_type, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),

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
            'race'             => array(self::BELONGS_TO, 'RaceType', 'race_id'),
            'user'             => array(self::BELONGS_TO, 'User', 'user_id'),
            'firstUniversity'  => array(self::BELONGS_TO, 'UniversityName', 'first_university_id'),
            'currUniversity'   => array(self::BELONGS_TO, 'UniversityName', 'curr_university_id'),
            'hsName'           => array(self::BELONGS_TO, 'HighSchoolName', 'highschool_id'),
            'purchasedProfile' => array(
                self::HAS_MANY, 'MapProfileStudent', '',
                //                                    'params'=>array(":userID"=>Yii::app()->user->id),
                //                                    'params'=>array(":userID"=>"$userID"),
                'joinType'=> 'INNER JOIN',
                'on'      => 't.user_id=purchased_profile_id'
            ),
            'ratings'          => array(
                self::HAS_MANY, 'Rating', 'user_id',
                'order' => 'create_time DESC'
            ),
            'averageRating'    => array(
                self::STAT, 'Rating', 'user_id',
                'select' => 'AVG(rating)'
            ),
            'scoreProfile'     => array(self::HAS_ONE, 'ScoreProfile', 'user_id'),
            'consult'          => array(self::HAS_ONE, 'Consult', 'user_id'),
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
        return array(
            'user_id'               => 'User',
            'first_university_id'   => 'First University',
            'curr_university_id'    => 'Curr University',
            'isTransfer'            => 'Is Transfer',
            'gender'                => 'Sex',
            'highschool_id'         => 'High School',
            'highSchoolType'        => 'High School Type',
            'race_id'               => 'Race',
            'sat_I_score_range'     => 'Sat I Score Range',
            'num_scores'            => 'Num Scores',
            'num_aps'               => 'Num Aps',
            'num_sat2s'             => 'Num Sat2s',
            'num_competitions'      => 'Num Competitions',
            'num_sports'            => 'Num Sports',
            'num_academics'         => 'Num Academics',
            'num_extracurriculars'  => 'Num Extracurriculars',
            'num_essays'            => 'Num Essays',
            'avg_profile_rating'    => 'Avg Profile Rating',
            'l1ForSale'             => 'L1 For Sale',
            'l2ForSale'             => 'L2 For Sale',
            'l3ForSale'             => 'L3 For Sale',
            'musical_instrument_id' => 'Musical Instrument',
            'profile_type'          => 'Focus Areas',
            'create_time'           => 'Create Time',
            'create_user_id'        => 'Create User',
            'update_time'           => 'Update Time',
            'update_user_id'        => 'Update User',
            'stateName'             => 'Home State',
            'verified'              => 'Verified',
        );
	}

    public function initialize($inID)
    {
        $this->user_id              = $inID;
        $this->first_university_id  = 0;
        $this->curr_university_id   = 0;
        $this->highschool_id        = 0;
        $this->num_academics        = 0;
        $this->num_extracurriculars = 0;
        $this->num_sports           = 0;
        $this->num_competitions     = 0;
        $this->num_essays           = 0;
        $this->num_scores           = 0;
        $this->num_aps              = 0;
        $this->num_sat2s            = 0;
        $this->num_subjects         = 0;
        $this->num_competitions     = 0;
        $this->num_awards           = 0;
        $this->num_activities       = 0;
        $this->num_music            = 0;
        $this->num_volunteer        = 0;
        $this->num_work             = 0;
        $this->num_research         = 0;
        $this->num_summer           = 0;
        $this->num_other            = 0;
        $this->l1ForSale            = 0;
        $this->l2ForSale            = 0;
        $this->l3ForSale            = 0;
        $this->verified             = 'N';

    }

    public function getProfileData()
    {
        $criteria = new CDbCriteria;
        return new CActiveDataProvider($this, array(
                                                   'criteria'=> $criteria,
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

        $criteria   = new CDbCriteria;
        $tempUserID = -999;
        if(!Yii::app()->user->getIsGuest())
        {
            $tempUserID = Yii::app()->user->id;
        }
        $criteria->params = array(":userID"=> $tempUserID);
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
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('sat_I_score_range', $this->sat_I_score_range);
        $criteria->compare('num_scores', $this->num_scores);
        $criteria->compare('num_academics', $this->num_academics);
        $criteria->compare('num_extracurriculars', $this->num_extracurriculars);
        $criteria->compare('num_essays', $this->num_essays);
        $criteria->compare('avg_profile_rating', $this->avg_profile_rating);
        $criteria->compare('l1ForSale', $this->l1ForSale);
        $criteria->compare('l2ForSale', $this->l2ForSale);
        $criteria->compare('l3ForSale', $this->l3ForSale);
        $criteria->compare('verified', $this->verified);
        $criteria->compare('musical_instrument_id', $this->musical_instrument_id, true);
        $criteria->compare('profile_type', $this->profile_type);
        $criteria->compare('name', $this->firstUniversity, true);
        $criteria->compare('name', $this->hsName, true);
        $criteria->compare('name', $this->race, true);
        $criteria->with = array('firstUniversity');
        $criteria->with = array('hsName');
        $criteria->with = array('race');
        $criteria->compare('gender', $this->gender, true);
        $criteria->condition = "(l1ForSale = 1 or l2ForSale=1 or l3ForSale=1) and (user_id!=:userID)";
        return new CActiveDataProvider($this,
            array(
                 'criteria'=> $criteria,
            )
        );
	}
        
	public function searchMine()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
//                $userID = Yii::app()->user->id;
        $criteria           = new CDbCriteria;
        $criteria->params   = array(":userID" => Yii::app()->user->id);
        $criteria->together = true;
        //
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('sat_I_score_range', $this->sat_I_score_range);
        $criteria->compare('num_scores', $this->num_scores);
        $criteria->compare('num_academics', $this->num_academics);
        $criteria->compare('num_extracurriculars', $this->num_extracurriculars);
        $criteria->compare('num_essays', $this->num_essays);
        $criteria->compare('avg_profile_rating', $this->avg_profile_rating);
        $criteria->compare('l1ForSale', $this->l1ForSale);
        $criteria->compare('l2ForSale', $this->l2ForSale);
        $criteria->compare('l3ForSale', $this->l3ForSale);
        $criteria->compare('verified', $this->verified);
        $criteria->compare('musical_instrument_id', $this->musical_instrument_id, true);
        $criteria->compare('profile_type', $this->profile_type);
        $criteria->compare('name', $this->firstUniversity, true);
        $criteria->compare('name', $this->hsName, true);
        $criteria->compare('name', $this->race, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->condition = "purchasedProfile.user_id=:userID AND purchasedProfile.purchased_profile_id!=:userID";

        $sort             = new CSort();
        $sort->attributes =
            array(
                'firstUniversity' => array(
                    'asc'  => 'firstUniversity.name',
                    'desc' => 'firstUniversity.name DESC',
                ),
                'race'            => array(
                    'asc'  => 'race.name',
                    'desc' => 'race.name DESC',
                ),
                'stateName'       => array(
                    'asc'  => 'states.name',
                    'desc' => 'states.name DESC',
                ),
                'countryName'     => array(
                    'asc'  => 'country.name',
                    'desc' => 'country.name DESC',
                ),
                '*',
            );

        $criteria->with =
            array(
                'firstUniversity',
                'race',
                'scoreProfile',
                'purchasedProfile',
                'hsName',
                'user' => array(
                    'with' => array(
                        'personalProfile' =>
                        array(
                            'with' => array('states', 'country'),
                        )
                    ),
                ),
            );

        return new CActiveDataProvider($this,
            array(
                 'criteria'=> $criteria,
                 'sort'    => $sort,
            )
        );
    }

    /**
     * We use this method for purpose of knowing whether this profile was purchased by currently logged user or not
     * @return bool - whether it was purchased or not
     */

    public function isPurchased()
    {
        $criteria = new CDbCriteria();

        $criteria->with = array('purchasedProfile');
        $criteria->together = true;
        $criteria->params = array(":userID" => $this->user_id, ":byUserID" => Yii::app()->user->id);

        $criteria->condition = "purchasedProfile.user_id = :byUserID AND purchasedProfile.purchased_profile_id = :userID";

        if(sizeof(self::model()->find($criteria)) > 0)
        {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */

    public function getUniversityOptions()
    {
        $universityArray = CHtml::listData(UniversityName::model()->findAll(), 'id', 'name');
        return $universityArray;


    }

    /**
     * @return string
     */

    public function getFirstUniversityName()
    {
        return (empty($this->first_university_id) ? "" : $this->firstUniversity->name);
    }

    /**
     * @return string
     */

    public function getCurrUniversityName()
    {
        return (empty($this->curr_university_id) ? "" : $this->currUniversity->name);
    }

    /**
     * @return string
     */

    public function getHighSchoolName()
    {
        return (empty($this->highschool_id) ? "" : $this->hsName->name);
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
        if($scoreVal > 2100)
        {
            $value = 1;
        }
        else if($scoreVal > 1800)
        {
            $value = 2;
        }
        else if($scoreVal > 1500)
        {
            $value = 3;
        }
        else if($scoreVal > 1200)
        {
            $value = 4;
        }

        else if($scoreVal > 600)
        {
            $value = 5;
        }

        else {
            $value = 0;
        }
        return $value;
    }

    public static function getSATRange($indexVal)
    {
        if($indexVal === null)
        {
            $indexVal = 0;
        }
        return BasicProfile::$SATRangeArray[$indexVal];
    }

    public static function getProfileTypeName($indexVal)
    {
        if(isset(BasicProfile::$ProfileTypeArray[$indexVal]))
        {
            return BasicProfile::$ProfileTypeArray[$indexVal];
        }
        return 'N/A';
    }

    public static function getFocus($data)
    {
        //set type to actual values (1-11) from (0,1)
        for($i = 1; $i <= 11; $i++)
        {
            $fieldName = 'focus_' . $i;
            if($data->$fieldName == 1)
            {
                $data->focus[$i] = $i;
            }
        }
        //Return focus type names now that we have array of values
        $count = 1;
        for($i = 1; $i <= 11; $i++)
        {
            if(!empty($data->focus[$i]))
            {
                if($count < 3)
                { //first two return values have comma after
                    echo BasicProfile::getProfileTypeName($data->focus[$i]) . ", ";
                    $count++;
                }
                else
                { //last one has no comma
                    echo BasicProfile::getProfileTypeName($data->focus[$i]);
                }
                ;
            }
        }
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

    public static function getCountryName($data)
    {
        if(!empty($data->user->personalProfile->country_reside))
        {
            $countryId = $data->user->personalProfile->country_reside;
            return CitizenType::model()->findByPk($countryId)->name;
        }
        return 'N/A';
    }

    public function checkBuyer($buyer_id, $mpStudent)
    {
        if($mpStudent === null)
        {
            $buyerStatusArray = array(
                'l1'   => $this->l1ForSale,
                'l2'   => $this->l2ForSale,
                'l3'   => $this->l3ForSale,
                'l4'   => $this->l4ForSale,
                'owner'=> 0
            );
            // Need to make sure that seller has ownership of all of these.
        }
        else
        {
            $buyerStatusArray = array();
            if($mpStudent->l1_purchased)
            {
                $buyerStatusArray['l1'] = 2;
            }
            else
            {
                $buyerStatusArray['l1'] = $this->l1ForSale;
            }
            if($mpStudent->l2_purchased)
            {
                $buyerStatusArray['l2'] = 2;
            }
            else
            {
                $buyerStatusArray['l2'] = $this->l2ForSale;
            }
            if($mpStudent->l3_purchased)
            {
                $buyerStatusArray['l3'] = 2;
            }
            else
            {
                $buyerStatusArray['l3'] = $this->l3ForSale;
            }
            if($mpStudent->l4_purchased)
            {
                $buyerStatusArray['l4'] = 2;
            }
            else
            {
                $buyerStatusArray['l4'] = $this->l4ForSale;
            }

            $buyerStatusArray['owner'] = $mpStudent->isOwner;
        }
        return $buyerStatusArray;

    }
        

/**
* Suggests a list of existing values matching the specified keyword.
* @param string the keyword to be matched
* @param integer maximum number of names to be returned
* @return array list of matching lastnames
*/

        
}
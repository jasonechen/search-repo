<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $id
 * @property integer $usertype
 * @property string $transType
 * @property string $schoolType
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $FirstName
 * @property string $LastName
 * @property string $idName
 * @property string $hs_profile_status
 * @property string $last_login_time
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property AcademicProfile $academicProfile
 * @property ActivityProfile[] $activityProfiles
 * @property ApProfile[] $apProfiles
 * @property BasicProfile $basicProfile
 * @property CompetitionProfile[] $competitionProfiles
 * @property EssayProfile[] $essayProfiles
 * @property MapProfileStudent[] $mapProfileStudents
 * @property MapProfileStudent[] $mapProfileStudents1
 * @property PersonalProfile $personalProfile
 * @property Sat2Profile[] $sat2Profiles
 * @property ScoreProfile $scoreProfile
 * @property SportProfile[] $sportProfiles
 * @property SubjectProfile[] $subjectProfiles
 * @property UserCredit $userCredit
 */
class User extends MCVActiveRecord

{
        public $password_unhash_repeat;
        public $password_unhash;
        public $verifyCode;
        public $isNewPassword;
        public $termagree;

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                        array('email, username, password_unhash', 'required', 'on' => 'register'),
                        array('usertype', 'numerical', 'integerOnly'=>true),
                        array('email, username, password_unhash', 'length', 'max'=>256),
                        array('email,username', 'unique', 'on' => 'register'),
                        array('FirstName, LastName, idName', 'length', 'max'=>50),
                        array('hs_profile_status', 'length', 'max'=>1),
                        array('create_user_id, update_user_id', 'length', 'max'=>10),
                        array('transType,schoolType,verifyCode,termagree, password_unhash, password_unhash_repeat','safe'),
                        array('username','unsafe', 'on' => 'oldPassword, newPassword'),
                        // Use CCompareValidator for the password
                        array('password_unhash','compare'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usertype, transType, schoolType, email, username, FirstName, LastName, idName, hs_profile_status, last_login_time, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),	
                        array('password_unhash','ext.validators.EPasswordStrength', 'min'=>7, 'on' => 'register, newPassword'),
                        array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on' =>'register'),
                        array('termagree', 'required', 'requiredValue'=>1, 'on' => 'register'),
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
			'academicProfile' => array(self::HAS_ONE, 'AcademicProfile', 'user_id'),
			'activityProfiles' => array(self::HAS_MANY, 'ActivityProfile', 'user_id'),
			'apProfiles' => array(self::HAS_MANY, 'ApProfile', 'user_id'),
                        'awardProfiles' => array(self::HAS_MANY, 'AwardProfile', 'user_id'),
			'basicProfile' => array(self::HAS_ONE, 'BasicProfile', 'user_id'),
			'competitionProfiles' => array(self::HAS_MANY, 'CompetitionProfile', 'user_id'),
			'essayProfiles' => array(self::HAS_MANY, 'EssayProfile', 'user_id'),
			'langProfiles' => array(self::HAS_MANY, 'LanguageProfile', 'user_id'),
                        'mapProfileStudents' => array(self::HAS_MANY, 'MapProfileStudent', 'user_id'),
			'mapProfileStudents1' => array(self::HAS_MANY, 'MapProfileStudent', 'purchased_profile_id'),
			'musicProfile' => array(self::HAS_ONE, 'MusicProfile', 'user_id'),
                        'otherschooladmitProfiles' => array(self::HAS_MANY, 'OtherSchoolAdmitProfile', 'user_id'),
                        'otherProfile' => array(self::HAS_ONE, 'OtherProfile', 'user_id'),
                        'personalProfile' => array(self::HAS_ONE, 'PersonalProfile', 'user_id'),
                        'researchProfile' => array(self::HAS_ONE, 'ResearchProfile', 'user_id'),
			'sat2Profiles' => array(self::HAS_MANY, 'Sat2Profile', 'user_id'),
			'scoreProfile' => array(self::HAS_ONE, 'ScoreProfile', 'user_id'),
			'sportProfiles' => array(self::HAS_MANY, 'SportProfile', 'user_id'),
                        'volunteerProfiles' => array(self::HAS_MANY, 'VolunteerProfile', 'user_id'),
			'subjectProfiles' => array(self::HAS_MANY, 'SubjectProfile', 'user_id'),
                        'summerProfiles' => array(self::HAS_MANY, 'SummerProfile', 'user_id'),
			'userCredit' => array(self::HAS_ONE, 'UserCredit', 'user_id'),
                        'workProfiles' => array(self::HAS_ONE, 'WorkProfile', 'user_id'),
            'ratings' => array(self::HAS_MANY, 'Rating', 'user_id', 'order' => 'create_time DESC'),
            'averageRating' => array(self::STAT, 'Rating', 'user_id', 'select' => 'AVG(rating)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usertype' => 'Usertype',
			'transType' => 'Trans Type',
			'schoolType' => 'School Type',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
                          'password_unhash' => 'Password',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
			'idName' => 'Id Name',
			'hs_profile_status' => 'Hs Profile Status',
			'last_login_time' => 'Last Login Time',
			'create_time' => 'Create Time',
			'create_user_id' => 'UserID of user who created record',
			'update_time' => 'Update Time',
			'update_user_id' => 'UserID of last user updating',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
                        'verifyCode'=>'Verification Code',
                        'termagree'=>'I agree to Meceve\'s'
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
		$criteria->compare('usertype',$this->usertype);
		$criteria->compare('transType',$this->transType,true);
		$criteria->compare('schoolType',$this->schoolType,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('idName',$this->idName,true);
		$criteria->compare('hs_profile_status',$this->hs_profile_status,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        protected function afterValidate()

        {
 
            parent::afterValidate();
            if(($this->isNewRecord) || ($this->isNewPassword))
            {
                $this->password = $this->encrypt($this->password_unhash);
                $test1 = $this->isNewRecord;
                $test2 = $this->isNewPassword;
//                fb($test2);
            }
            $this->usertype = 0;
        }
        
        public function encrypt($value)
        {
            return hash("sha512",$value);
        }
}
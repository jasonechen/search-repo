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
        public $seller_earnings;
        
    /**
     * Add constant status
     * 
     * @author Thuong
     * 09/03/2012
     */    
     const STATUS_ACTIVE = 1;
     const STATUS_PENDING = 0;
     const STATUS_BLOCKED = -1;

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
                        array('FirstName, LastName, email, username, password_unhash', 'required', 'on' => 'register,buyerregister'),
                        array('FirstName, LastName, email,email_paypal,mail_zip', 'required', 'on' => 'uedit'),
                        array('usertype, mail_zip', 'numerical', 'integerOnly'=>true),
                        array('email, email_paypal, username, password_unhash', 'length', 'max'=>256),
                        array('email_paypal, email, username', 'unique', 'on' => 'register,uedit,buyerregister'),
			array('email_paypal, email','email'),
                        array('FirstName, LastName, idName', 'length', 'max'=>50),
                        array('hs_profile_status', 'length', 'max'=>1),
                        array('create_user_id, update_user_id', 'length', 'max'=>10),
                        array('mail_street1, mail_street2, mail_city, mail_zip, mail_state, mail_country,checkpay, email_paypal, transType,schoolType,verifyCode,termagree, password_unhash, password_unhash_repeat','safe'),
                        array('username','unsafe', 'on' => 'oldPassword, newPassword'),
                        // Use CCompareValidator for the password
                        array('password_unhash','compare'),
						// for resendRegistrationLink

                        array('email', 'checkEmailFormat','on' => 'buyerregister,register'),                
                        array('email','required','on' => 'registrationlink'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usertype, transType, schoolType, email, username, FirstName, LastName, idName, hs_profile_status, last_login_time, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),	
                        array('password_unhash','ext.validators.EPasswordStrength', 'min'=>7, 'on' => 'register,buyerregister, newPassword'),
                        array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on' =>'register,buyerregister'),
                        array('termagree', 'required', 'requiredValue'=>1, 'on' => 'register,buyerregister','message'=>'Please check the box to agree to the Terms and Conditions'),
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
                        'mailstate' => array(self::BELONGS_TO, 'States', 'mail_state'),
                        'mailcountry' => array(self::BELONGS_TO, 'CitizenType', 'mail_country'),
                    
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
                        'termagree'=>'I agree to CrowdPrep\'s Terms and Conditions',
                        'email_paypal' => 'Paypal Email',
                        'mail_street1' => 'Street Address',
                        'mail_street2' => 'Street Address 2',
                        'mail_city' => 'City',
                        'mail_state' => 'State',
                        'mail_zip' => 'Zip Code',
                        'mail_country' => 'Country'
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
                $criteria->compare('email_paypal',$this->email_paypal,true);
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
        
        public static function addSellerView($inPurchaseArray,$inCreditArray,$inAvgPrice,$inBuyerID,$inSellerID)
        {
            /*Get the royalty */
            $royalty=SellerCurrRoyalty::model()->findByAttributes(array('user_id' => $inSellerID));
            if ($royalty === null ){               
                $royalty = User::updateRoyalty($inSellerID);
            }
            if ($inPurchaseArray['l1Purchase']){
                $sellerCurrView = new SellerCurrView;
                $sellerCurrView->user_id = $inSellerID;
                $sellerCurrView->buyer_id = $inBuyerID;
                $sellerCurrView->trans_type = 1;
                $sellerCurrView->usedRoyalty = $royalty->L1_royalty;
                $sellerCurrView->payment = $inCreditArray['l1Credits']*$inAvgPrice * $royalty->L1_royalty;
                $sellerCurrView->purchase_date = new CDbExpression('NOW()');
                $sellerCurrView->save(false);
            }
            if ($inPurchaseArray['l2Purchase']){
                $sellerCurrView = new SellerCurrView;
                $sellerCurrView->user_id = $inSellerID;
                $sellerCurrView->buyer_id = $inBuyerID;
                $sellerCurrView->trans_type = 2;
                $sellerCurrView->usedRoyalty = $royalty->L2_inc_royalty;
                $sellerCurrView->payment = $inCreditArray['l2Credits']*$inAvgPrice * $royalty->L2_inc_royalty;
                $sellerCurrView->purchase_date = new CDbExpression('NOW()');
                $sellerCurrView->save(false);
            }
            if ($inPurchaseArray['l3Purchase']){
                $sellerCurrView = new SellerCurrView;
                $sellerCurrView->user_id = $inSellerID;
                $sellerCurrView->buyer_id = $inBuyerID;
                $sellerCurrView->trans_type = 3;
                $sellerCurrView->usedRoyalty = $royalty->L3_inc_royalty;
                $sellerCurrView->payment = $inCreditArray['l3Credits']*$inAvgPrice * $royalty->L3_inc_royalty;
                $sellerCurrView->purchase_date = new CDbExpression('NOW()');
                $sellerCurrView->save(false);
            }
            
            
        }
        public static function updateRoyalty($inID)
        {
            /* Check for current royalty */
            /* If it exists - archive it */
            /* If it doesn't exist - create a new one */
            /* Then calculate royalty */
            $currRoyalty=SellerCurrRoyalty::model()->findByAttributes(array('user_id' => $inID));
            if($currRoyalty!==null){
                $histRoyalty = new SellerHistRoyalty;
                $histRoyalty->user_id = $inID;
                $histRoyalty->L1_royalty = $currRoyalty->L1_royalty;
                $histRoyalty->L2_inc_royalty = $currRoyalty->L2_inc_royalty;
                $histRoyalty->L3_inc_royalty = $currRoyalty->L3_inc_royalty;
                $histRoyalty->date_modified = $currRoyalty->date_modified;
                $histRoyalty->date_archived = new CDbExpression('NOW()'); 
                $histRoyalty->user_archived = Yii::app()->user->id;
                
                $histRoyalty->save(false);
                
            }
            else{
                $currRoyalty = new SellerCurrRoyalty;
            }
            $currRoyalty->user_id = $inID;
            $currRoyalty->L1_royalty = 0.20;
            $currRoyalty->L2_inc_royalty = 0.275;
            $currRoyalty->L3_inc_royalty = 0.35;
            
            /* Check for exclusive */
            $exclusive=Exclusive::model()->findByAttributes(array('user_id' => $inID));
            if($exclusive !== null){
                if ($exclusive->exclusiveValue == 1){
                    $currRoyalty->L1_royalty += 0.1;
                    $currRoyalty->L2_inc_royalty += 0.1;
                    $currRoyalty->L3_inc_royalty += 0.1;
                }
            }
            /* Check for verified */
            $basicProfile=BasicProfile::model()->findByPk($inID);
            if($basicProfile!==null){
                if ($basicProfile->verified == 'Y'){
                    $currRoyalty->L1_royalty += 0.1;
                    $currRoyalty->L2_inc_royalty += 0.1;
                    $currRoyalty->L3_inc_royalty += 0.1;
                }
            }
            
            /* Check for referrals */
            $connection = Yii::app()->db;
            $sql = "SELECT count(user_id) as theCount FROM tbl_refer_friends where user_id = :userID and active = 1";
            $command = $connection->createCommand($sql);
            $command->bindParam(":userID",$inID);
            $theReader = $command->query();
            $theResult = $theReader->read();
//            $theReader->bindColumn('theCount',$numProfiles[0]);
            $numActiveReferrals = $theResult['theCount'];
            if ($numActiveReferrals > 0){
                if ($numActiveReferrals > 10) $numActiveReferrals = 10;
                    $currRoyalty->L1_royalty += (0.005*$numActiveReferrals);
                    $currRoyalty->L2_inc_royalty += (0.005*$numActiveReferrals);
                    $currRoyalty->L3_inc_royalty += (0.005*$numActiveReferrals);          
            }
            $currRoyalty->date_modified = new CDbExpression('NOW()'); 
            
            $currRoyalty->save(false);
            return $currRoyalty;      
        }        
        
//        public static function archiveSellerView($inID)
//        {      
//        }        
        
        public static function defaultAvgPrice()
        {
            return 2;
        }
        
        function getState() 
        { 
             $stateArray = CHtml::listData(States::model()->findAll(), 'id', 'name');
             return $stateArray;
        }
        
        public static function getStateName($model)
        {
            if(!empty($model->mail_state)){
                $stateId = $model->mail_state;
                return States::model()->findByPk($stateId)->name;
            }
            return 'N/A';
        }
        
        static public function getCountryOptions() 
        { 
             $citizenshipArray = CHtml::listData(CitizenType::model()->findAll(), 'id', 'name');
             return $citizenshipArray;
        }

        public static function getCountryName($model)
        {
            if(!empty($model->mail_country)){
                $countryId = $model->mail_country;
                return CitizenType::model()->findByPk($countryId)->name;
            }
            return 'N/A';
        }
        
        /*Checkig for
         * Allowed mail patter
         * Not allowed mail domain list
         * Is blocked mail id
         */
        public function checkEmailFormat($attribute)
        {
             $utype= $this->transType;
             $mailId = $this->email;
             
             //Allowed pattern
             $subPattern= CommonMethods::getAllowMailPattern($utype);
             
             
             $exp = explode('.', $mailId);
             $check = end($exp);
            
             $match = preg_match("/$subPattern/i", $check);
             
             //Not Allowed pattern
             $notSupportPat = CommonMethods::getNotSupportPattern($utype);
             $notExp = explode('@', $mailId);
             $notChk = end($notExp);
             $pos= strpos($notChk, '.');
             $notChk=substr($notChk,0,$pos);
             $notmatcho = preg_match("/$notSupportPat/i", $notChk);
            // echo $notChk;
             //Blocked Mail Ids
             $site = new SiteBlock();
             $chk= $site->checkAllowMailId($mailId);
             
             
             $msg='';
             $error=TRUE;
             if($chk)
                 $msg = 'This mail Id is Blocked form our site <br/>Please try to use another';
             elseif(!$match)
                 $msg='Email format is wrong!<br/>Should use '.str_replace('|', ' | ', $subPattern);
             elseif($notmatcho)
                 $msg = 'Not allow to Register this mail Id <br/>Please try to use another';
             else
                $error=FALSE; 
                 
                 
             if($error)
                $this->addError($attribute, $msg);
             
             
        }
}       

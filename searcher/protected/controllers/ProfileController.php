<?php

class ProfileController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
            'clearSearchPersistance',
		);
	}

    /**
     * Method for clearing of search persistance
     * Eg., we don't want to show previously typed in value on home page
     * @param CFilterChain $filterChain
     */

    public function filterClearSearchPersistance($filterChain)
    {
        Controller::clearSearchPersistance();

        $filterChain->run();
    }

	/** 
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */

 
        /**new function to work with Eautocompleteaction
        public function actions()
            {
            
            return array(
               'aclist'=>array(
                'class'=>'application.extensions.EAutoCompleteAction',
                'model'=>'UniversityName', //My model's class name
                'attribute'=>'name', //The attribute of the model i will search
                    ),
                );
            }       **/ 
        
   /**    public function actionAutocomplete() {
	    $res =array();		   
            if (isset($_GET['term'])) {
	        // http://www.yiiframework.com/doc/guide/database.dao
	        $qtxt ="SELECT name FROM tbl_university_name WHERE name LIKE :name";
	        $command =Yii::app()->db->createCommand($qtxt);
	        $command->bindValue(":name", '%'.$_GET['term'].'%', PDO::PARAM_STR);
	        $res =$command->queryColumn();
	    }
	 
	    echo CJSON::encode($res);
	    Yii::app()->end();
}*/
   
        
        public function actions()
            {
            return array(
            'suggestUniversity'=>array(
                'class'=>'ext.actions.XSuggestAction',
                'modelName'=>'UniversityName',
                'methodName'=>'suggest',
             ),
             'suggestHighschool'=>array(
                'class'=>'ext.actions.XSuggestAction',
                'modelName'=>'HighSchoolName',
                'methodName'=>'suggest',
                   ),
                
                'suggestLanguage'=>array(
                'class'=>'ext.actions.XSuggestAction',
                'modelName'=>'LanguageType',
                'methodName'=>'suggest',
                )
             );
           }
           
        public function accessRules()
	{
		return array(

			array('allow',  
				'actions'=>array('index',
                                'deleteSubject','deleteSat2','deleteSport','deleteAp','deleteExtracurricular',
                                'deleteCompetition','deleteEssay','viewEssay',
                                'modBasic','modLang','loadLang','DeleteLang', 'modScores','modSubjects','modSat2','modSports','modAp','modExtracurriculars',
                                'modCompetitions','modEssays','suggestUniversity','suggestHighschool','suggestLanguage',
                                'loadOtherSchoolAdmit','DeleteOtherSchoolAdmit', 'deleteMusic', 'deleteVolunteer','deleteWork','loadMusic','loadVolunteer','loadWork',   
                                'loadSummer','deleteSummer','loadResearch','deleteResearch','loadOther','deleteOther',
                                'modScoreTabs','modAcademicTabs', 'loadAward','deleteAward',
                                'browseMine','viewBasic', 'viewPurchProfile', 'viewScores','viewAcademics','viewExtracurriculars','viewEssays','viewAll',
                                ),

				'users'=>array('@'),
			),
                        array('allow',  // allow authenticated profiles to perform 'index' and 'view' and 'update' actions
				'actions'=>array('viewProfile','browse',
                                ),
				'users'=>array('*'),
			),
			array('deny',  // deny all profiles
				'users'=>array('*'),
			),
		);
	}

        
	public function actionViewProfile($profileID=null)
	{	
                $this->layout = 'column2-search';
                if ($profileID==null){
                 $this->redirect(array('search/index'));      
                }
                $userID = Yii::app()->user->id;
//                if($profileID == $userID) {
//                    throw new CHttpException(403,'You already own this profile!.');
//                } 
                $basicProfile = $this->loadBasic($profileID);
                
                $buyProfileForm = new BuyProfileForm;
                $buyProfileForm->basicProfile = $basicProfile;
                $buyProfileForm->profile_id = $profileID;
                $buyProfileForm->buyer_id = $userID;

                $mapProfileStudent = MapProfileStudent::model()->findByPk(array('user_id'=>"$userID",
                                                                            'purchased_profile_id'=>"$profileID",));                                
                $buyProfileForm->fillInStatus($mapProfileStudent);

                $creditModel = $this->loadCreditModel($userID);

 		if(isset($_POST['BuyProfileForm']))
		{
//                                    echo Yii::log("_POST: ".CVarDumper::dumpAsString($_POST),'error');
 
                    $valid = $buyProfileForm->validate();                  
                    if ($valid)
                    {
                        /* Compare values to previous values to see if a purchase was made*/
                        $purchaseArray = $buyProfileForm->checkIfPurchase($_POST['BuyProfileForm']);
//                       echo Yii::log("purchaseArray: ".CVarDumper::dumpAsString($purchaseArray),'error');                       
                        if ($purchaseArray['isPurchase']){
                        /* Check to see if there are enough credits */
                        /* If a purchase was made */
                            
                              $creditModel = $this->loadCreditModel($userID);
                              $curCredits = $creditModel->buy_credits;
                              $totalCreditsNeeded = 0;
                              if ($purchaseArray['l1Purchase']){
                                  $totalCreditsNeeded += ProfileController::getProfilePrice($profileID, 1);
                              }
                              if ($purchaseArray['l2Purchase']){
                                  $totalCreditsNeeded += ProfileController::getProfilePrice($profileID, 2);
                              } 
                              if ($purchaseArray['l3Purchase']){
                                  $totalCreditsNeeded += ProfileController::getProfilePrice($profileID, 3);
                              } 
                              echo Yii::log("totalCreditsNeeded: ".CVarDumper::dumpAsString($totalCreditsNeeded),'error');   
                              echo Yii::log("curCredits: ".CVarDumper::dumpAsString($curCredits),'error');   
                              if ($totalCreditsNeeded > $curCredits){
                                    $buyProfileForm->buyL1 = false;
                                    $buyProfileForm->buyL2 = false;
                                    $buyProfileForm->buyL3 = false;
                                    Yii::app()->user->setFlash('buyProfileError',"Not enough credits!" );                            
                                    $this->redirect(array('viewProfile','profileID'=>$profileID));                                  
                              }
                              else{
                                    if($mapProfileStudent===null){
                                        $mapProfileStudent = new MapProfileStudent();
                                        $mapProfileStudent->user_id = $userID;
                                        $mapProfileStudent->purchased_profile_id = $profileID;
                                        $mapProfileStudent->isOwner = 0;
                                        $mapProfileStudent->l1_purchased = 0;
                                        $mapProfileStudent->l2_purchased = 0;
                                        $mapProfileStudent->l3_purchased = 0;
                                    }
                                    if ($purchaseArray['l1Purchase']){
                                        $mapProfileStudent->l1_purchased = 1;
                                        $mapProfileStudent->l1_purchase_time=new CDbExpression('NOW()');
                                    }
                                    if ($purchaseArray['l2Purchase']){
                                        $mapProfileStudent->l2_purchased = 1;
                                        $mapProfileStudent->l2_purchase_time=new CDbExpression('NOW()');
                                    }
                                    if ($purchaseArray['l3Purchase']){
                                        $mapProfileStudent->l3_purchased = 1;
                                        $mapProfileStudent->l3_purchase_time=new CDbExpression('NOW()');
                                    }
//                                    echo Yii::log("mapProfileStudent ".CVarDumper::dumpAsString($mapProfileStudent),'error');  
//                                    $myCheck = $mapProfileStudent->save();
//                                    $myCheck2= $mapProfileStudent->getErrors();
//                                    echo Yii::log("myCheck: ".CVarDumper::dumpAsString($myCheck2),'error');  
                                    if ($mapProfileStudent->save(true)){
//
                                        $creditModel = $this->loadCreditModel($userID);
                                        $creditModel->buy_credits -= $totalCreditsNeeded;
                                        $creditModel->save();
                                        $buyProfileForm->fillInStatus($mapProfileStudent);
                                        Yii::app()->user->setFlash('buyProfileSuccess',"Purchased with credits!" );
                                        $this->redirect(array('viewAll','profileID'=>$profileID)); 
										//$this->redirect(array('viewPurchProfile','profileID'=>$profileID)); 
                                    }
                              }
                            
                        }
                        else{
                            
                            $theMessage = $purchaseArray['errorMessage'];
                     
                            Yii::app()->user->setFlash('buyProfileError',"$theMessage");                            
                            $this->redirect(array('viewProfile','profileID'=>$profileID));                      
                        }
                        
  
                    }

		}

        $searchUri = '';

        if(!empty($_SESSION['search_uri']))
        {
            $searchUri = $_SESSION['search_uri'];
        }

        $this->setRecentProfiles($profileID);
       
		$this->render('viewProfile',
            array(
                 'buyProfileForm' => $buyProfileForm,
                 'creditModel' => $creditModel,
                 'basicProfile' => $basicProfile,
                 'searchUri' => $searchUri,
            )
        );
	}

    /**
     * Method that is used for setting up array of recently viewed profiles
     * We use cookie for this purpose
     * @param $profileID
     * @param int $maxSize
     */

    private function setRecentProfiles($profileID, $maxSize = 5)
    {
        $oldProfiles = (isset(Yii::app()->request->cookies['recent_profiles'])) ? Yii::app()->request->cookies['recent_profiles']->value : array();

        /**
         * Here we are searching for value of current profile ID in already existed cookie
         * And if we found it than we swap first element and this element
         */

        if(($pos = array_search($profileID, $oldProfiles)) !== FALSE)
        {
            $newProfile = array();

            // swap 2 elements

            $tmp = $oldProfiles[0];
            $oldProfiles[0] = $profileID;
            $oldProfiles[$pos] = $tmp;
        }
        else
        {
            $newProfile = array($profileID);
        }

        /**
         * We are going to view only 5 recently viewed profiles that's why we are limiting the result
         */

        if(sizeof($oldProfiles) >= $maxSize && !empty($newProfile))
        {
            array_pop($oldProfiles);
        }

        $newArray = CMap::mergeArray($newProfile, $oldProfiles);

        /**
         * Setting up new cookie value
         */

        $cookie = new CHttpCookie('recent_profiles', $newArray);
        $cookie->expire = time() + 60 * 60 * 24 * 180;
        Yii::app()->request->cookies['recent_profiles'] = $cookie;
    }

	public function actionViewPurchProfile($profileID=null)
	{	
                $this->layout = 'column2';
                if ($profileID==null){
                 $this->redirect(array('browse'));      
                }
                $userID = Yii::app()->user->id;
//                if($profileID == $userID) {
//                    throw new CHttpException(403,'You already own this profile!.');
//                } 
                $basicProfile = $this->loadBasic($profileID);
                
                $buyProfileForm = new BuyProfileForm;
                $buyProfileForm->basicProfile = $basicProfile;
                $buyProfileForm->profile_id = $profileID;
                $buyProfileForm->buyer_id = $userID;

                $mapProfileStudent = MapProfileStudent::model()->findByPk(array('user_id'=>"$userID",
                                                                            'purchased_profile_id'=>"$profileID",));                                
              $buyProfileForm->fillInStatus($mapProfileStudent);

               $creditModel = $this->loadCreditModel($userID);

        $ratingModel = Rating::model()->findByAttributes(array('user_id' => $profileID, 'create_user_id' => Yii::app()->user->id));
        $disableRating = ($ratingModel !== null) ? true : false;

        $this->setRecentProfiles($profileID);
       
		$this->render('viewPurchProfile',array(
			'buyProfileForm'=>$buyProfileForm,
                        'creditModel'=>$creditModel,
                        'basicProfile'=>$basicProfile,
                        'disableRating' => $disableRating,
                        ));
	}        
        
        
	public function actionViewAll($profileID)
	{	
            $this->layout = 'column2-purch-prof';
            $profileAccessArray = $this->getProfileAccessArray($profileID);
            $basicProfile=BasicProfile::model()->findByPk($profileID);
            if($profileAccessArray['l1']==1) {
                $personalProfile=PersonalProfile::model()->findByPk($profileID);    
                $otherSchoolAdmitProfileArray=OtherSchoolAdmitProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $languageProfileArray=LanguageProfile::model()->findAllByAttributes(array('user_id'=>$profileID));

                $scoreProfile=ScoreProfile::model()->findByPk($profileID);
                if ($scoreProfile != NULL) $scoreProfile->calcTotalSAT();
                ($basicProfile->num_sat2s > 0) ? 
                            $sat2ProfileArray=Sat2Profile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $sat2ProfileArray = null;
                ($basicProfile->num_aps > 0) ? 
                    $apProfileArray=ApProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $apProfileArray = null;
                
                $academicProfile=AcademicProfile::model()->findByPk($profileID);
                $numberFormatter = new CNumberFormatter(Yii::app()->locale);
                ($basicProfile->num_subjects > 0) ? 
                            $subjectProfileArray=SubjectProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $subjectProfileArray = null;
                ($basicProfile->num_competitions > 0) ? 
                            $competitionProfileArray=CompetitionProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $competitionProfileArray = null;
                ($basicProfile->num_awards > 0) ? 
                            $awardProfileArray=AwardProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $awardProfileArray = null;
            }
            else{
                $personalProfile=null;    
                $otherSchoolAdmitProfileArray=null;
                $languageProfileArray=null;
                $scoreProfile = null;
                $sat2ProfileArray = null;
                $apProfileArray = null;
                $academicProfile=null;
                $numberFormatter = new CNumberFormatter(Yii::app()->locale);
                $subjectProfileArray = null;
                $competitionProfileArray = null;
                $awardProfileArray = null;
            }
            if($profileAccessArray['l2']==1) {
                ($basicProfile->num_activities > 0) ? 
                            $activityProfileArray=ActivityProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $activityProfileArray = null;
                ($basicProfile->num_sports > 0) ? 
                            $sportProfileArray=SportProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $sportProfileArray = null;
                ($basicProfile->num_music > 0) ? 
                            $musicProfileArray=MusicProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $musicProfileArray = null;
                ($basicProfile->num_volunteer > 0) ? 
                            $volunteerProfileArray=VolunteerProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $volunteerProfileArray = null;
                ($basicProfile->num_work > 0) ? 
                            $workProfileArray=WorkProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $workProfileArray = null;
                ($basicProfile->num_research > 0) ? 
                            $researchProfileArray=ResearchProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $researchProfileArray = null;
                ($basicProfile->num_summer > 0) ? 
                            $summerProfileArray=SummerProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $summerProfileArray = null;
                ($basicProfile->num_other > 0) ? 
                            $otherProfileArray=OtherProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $otherProfileArray = null;                
            }
            else{
                $activityProfileArray = null;
                $sportProfileArray = null;
                $musicProfileArray = null;
                $volunteerProfileArray = null;
                $workProfileArray = null;
                $researchProfileArray = null;
                $summerProfileArray = null;
                $otherProfileArray = null;                
            }
            if($profileAccessArray['l3']==1) {                   
                ($basicProfile->num_essays > 0) ? 
                    $essayProfileArray=EssayProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                    : $essayProfileArray = null;   
            }
            else{
                $essayProfileArray = null;   
            }
            //added this code
            $userID = Yii::app()->user->id;
            $buyProfileForm = new BuyProfileForm;
            $buyProfileForm->basicProfile = $basicProfile;
            $buyProfileForm->profile_id = $profileID;
            $buyProfileForm->buyer_id = $userID;

            $mapProfileStudent = MapProfileStudent::model()->findByPk(array('user_id'=>"$userID",
                                                                        'purchased_profile_id'=>"$profileID",));                                
            $buyProfileForm->fillInStatus($mapProfileStudent);
            $ratingModel = Rating::model()->findByAttributes(array('user_id' => $profileID, 'create_user_id' => Yii::app()->user->id));
            $disableRating = ($ratingModel !== null) ? true : false;
            // Not sure why strings do not work here */
            $profileCookieID = $profileID;
//            echo Yii::log("profileCookieID: ".CVarDumper::dumpAsString($profileCookieID),'error');
            $this->render('viewAll',array(
                                    'profileID'=>$profileID,
                                    'profileCookieID'=>$profileCookieID,
                                    'profileAccessArray'=>$profileAccessArray,
                                    'basicProfile'=>$basicProfile,
                                    'personalProfile'=>$personalProfile,
                                    'otherSchoolAdmitProfileArray'=>$otherSchoolAdmitProfileArray,
                                    'languageProfileArray' => $languageProfileArray,
                                    'scoreProfile'=>$scoreProfile,
                                    'sat2ProfileArray'=>$sat2ProfileArray,
                                    'apProfileArray'=>$apProfileArray,
                                    'academicProfile'=>$academicProfile,
                                    'subjectProfileArray'=>$subjectProfileArray,
                                    'competitionProfileArray'=>$competitionProfileArray,
                                    'awardProfileArray'=>$awardProfileArray,
                                    'numberFormatter'=>$numberFormatter,
                                    'activityProfileArray'=>$activityProfileArray,
                                    'sportProfileArray'=>$sportProfileArray,
                                    'musicProfileArray'=>$musicProfileArray,
                                    'volunteerProfileArray'=>$volunteerProfileArray,
                                    'workProfileArray'=>$workProfileArray,
                                    'researchProfileArray'=>$researchProfileArray,
                                    'summerProfileArray'=>$summerProfileArray,
                                    'otherProfileArray'=>$otherProfileArray,   
                                    'essayProfileArray'=>$essayProfileArray,
                                    'buyProfileForm'=>$buyProfileForm,
                                    'disableRating' => $disableRating,
                                    ));
                
	}
        
	public function actionViewBasic($profileID)
	{	
                if(!($this->checkProfileAccess($profileID, 1))) {
                    throw new CHttpException(403,'You have not purchased access to this!');
                }      
                $basicProfile=BasicProfile::model()->findByPk($profileID);
                $personalProfile=PersonalProfile::model()->findByPk($profileID);    
                $otherSchoolAdmitProfileArray=OtherSchoolAdmitProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $languageProfileArray=LanguageProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                
		$this->render('viewBasic',array(
                                        'profileID'=>$profileID,
                                        'basicProfile'=>$basicProfile,
                                        'personalProfile'=>$personalProfile,
                                        'otherSchoolAdmitProfileArray'=>$otherSchoolAdmitProfileArray,
                                        'languageProfileArray' => $languageProfileArray,
                                        ));
                
	}
 
 	public function actionViewScores($profileID)
	{

                if(!($this->checkProfileAccess($profileID, 1))) {
                    throw new CHttpException(403,'You have not purchased access to this!');
                }        
                $basicProfile=BasicProfile::model()->findByPk($profileID);                
                $scoreProfile=ScoreProfile::model()->findByPk($profileID);
                $scoreProfile->calcTotalSAT();
                ($basicProfile->num_sat2s > 0) ? 
                            $sat2ProfileArray=Sat2Profile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $sat2ProfileArray = null;
                ($basicProfile->num_aps > 0) ? 
                    $apProfileArray=ApProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $apProfileArray = null;
//                 echo Yii::log("Sat2ProfileArray: ".CVarDumper::dumpAsString(count($sat2ProfileArray)),'error');
		$this->render('viewScores',array(
                        'profileID'=>$profileID,
                        'scoreProfile'=>$scoreProfile,
                        'sat2ProfileArray'=>$sat2ProfileArray,
                        'apProfileArray'=>$apProfileArray,
                    ));
	}       

        public function actionViewAcademics($profileID)
	{	
                if(!($this->checkProfileAccess($profileID, 1))) {
                    throw new CHttpException(403,'You have not purchased access to this!');
                }
                
                $basicProfile=BasicProfile::model()->findByPk($profileID);
                $academicProfile=AcademicProfile::model()->findByPk($profileID);
                $numberFormatter = new CNumberFormatter(Yii::app()->locale);
                ($basicProfile->num_subjects > 0) ? 
                            $subjectProfileArray=SubjectProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $subjectProfileArray = null;
                ($basicProfile->num_competitions > 0) ? 
                            $competitionProfileArray=CompetitionProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $competitionProfileArray = null;
                ($basicProfile->num_awards > 0) ? 
                            $awardProfileArray=AwardProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $awardProfileArray = null;
                
              
		$this->render('viewAcademics',array(
                        'profileID'=>$profileID,
                        'academicProfile'=>$academicProfile,
                        'subjectProfileArray'=>$subjectProfileArray,
                        'competitionProfileArray'=>$competitionProfileArray,
                        'awardProfileArray'=>$awardProfileArray,
                        'numberFormatter'=>$numberFormatter,
                    ));
                unset($numberFormatter);
	}
        
	public function actionViewExtracurriculars($profileID)
	{	
                if(!($this->checkProfileAccess($profileID, 2))) {
                    throw new CHttpException(403,'You have not purchased access to this!');
                }        
                
                $basicProfile=BasicProfile::model()->findByPk($profileID);
                ($basicProfile->num_activities > 0) ? 
                            $activityProfileArray=ActivityProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $activityProfileArray = null;
                ($basicProfile->num_sports > 0) ? 
                            $sportProfileArray=SportProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $sportProfileArray = null;
                ($basicProfile->num_music > 0) ? 
                            $musicProfileArray=MusicProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $musicProfileArray = null;
                ($basicProfile->num_volunteer > 0) ? 
                            $volunteerProfileArray=VolunteerProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $volunteerProfileArray = null;
                ($basicProfile->num_work > 0) ? 
                            $workProfileArray=WorkProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $workProfileArray = null;
                ($basicProfile->num_research > 0) ? 
                            $researchProfileArray=ResearchProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $researchProfileArray = null;
                ($basicProfile->num_summer > 0) ? 
                            $summerProfileArray=SummerProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $summerProfileArray = null;
                ($basicProfile->num_other > 0) ? 
                            $otherProfileArray=OtherProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $otherProfileArray = null;

		$this->render('viewExtracurriculars',array(
                        'profileID'=>$profileID,
                        'activityProfileArray'=>$activityProfileArray,
                        'sportProfileArray'=>$sportProfileArray,
                        'musicProfileArray'=>$musicProfileArray,
                        'volunteerProfileArray'=>$volunteerProfileArray,
                        'workProfileArray'=>$workProfileArray,
                        'researchProfileArray'=>$researchProfileArray,
                        'summerProfileArray'=>$summerProfileArray,
                        'otherProfileArray'=>$otherProfileArray,                        
                    ));
	}
        
	public function actionViewEssays($profileID)
	{	
                if(!($this->checkProfileAccess($profileID, 3))) {
                    throw new CHttpException(403,'You have not purchased access to this!');
                }        
                $basicProfile=BasicProfile::model()->findByPk($profileID);
                ($basicProfile->num_essays > 0) ? 
                            $essayProfileArray=EssayProfile::model()->findAllByAttributes(array('user_id'=>$profileID))
                            : $essayProfileArray = null;                
                
                
		$this->render('viewEssays',array(
                        'profileID'=>$profileID,
                        'essayProfileArray'=>$essayProfileArray,
                    ));
	}
        
	public function actionModBasic()
	{
                $myID = Yii::app()->user->id;
            
                $personalProfile=PersonalProfile::model()->findByPk($myID);

		if($personalProfile===null){                
                        $personalProfile=new PersonalProfile;
                        $personalProfile->alumni_connections = array();
                        $personalProfile->alumni_connections_flag = 0;
                }
                else{
                    $personalProfile->alumni_connections_flag = 0;
                    $personalProfile->alumni_connections = array();
    
                    if (($personalProfile->legacy_direct == "N")&&($personalProfile->legacy_indirect == "N")){
                        $personalProfile->alumni_connections[] = "None";    
                    }
                    else{
                        if (($personalProfile->legacy_direct == "F") or ($personalProfile->legacy_direct == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Father";
                        }
                        if (($personalProfile->legacy_direct == "M") or ($personalProfile->legacy_direct == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Mother";
                        }
                        if (($personalProfile->legacy_indirect == "S") or ($personalProfile->legacy_indirect == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Sibling";
                        }
                        if (($personalProfile->legacy_indirect == "O") or ($personalProfile->legacy_indirect == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Other";
                        }
                    }
                }
                
                $basicProfile=BasicProfile::model()->findByPk($myID);
		if($basicProfile===null){                
                        $basicProfile=new BasicProfile;
                        $basicProfile->initialize($myID); 
                }
                else{
                        $basicProfile->curr_university_name = $basicProfile->getCurrUniversityName();
                        $basicProfile->first_university_name = $basicProfile->getFirstUniversityName();
                        $basicProfile->high_school_name = $basicProfile->getHighSchoolName();
                        
                }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PersonalProfile'],$_POST['BasicProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.

			$personalProfile->attributes=$_POST['PersonalProfile'];
                        $basicProfile->attributes=$_POST['BasicProfile'];
                        
                        if (isset($_POST['PersonalProfile']['alumni_connections_flag'])){
                            $personalProfile->alumni_connections = $_POST['PersonalProfile']['alumni_connections'];

                            $tempArray = array('None'=>0,'Father'=>0,'Mother'=>0,'Sibling'=>0,'Other'=>0);
                            if ($personalProfile->alumni_connections !== ''){
                                foreach ($personalProfile->alumni_connections as $i=>$theValue){
                                    if ($theValue == 'None') {
                                        $tempArray['None'] = 1;
                                    }    
                                    else if ($theValue == 'Father') {
                                        $tempArray['Father'] = 1;
                                    }                       
                                    else if ($theValue == 'Mother'){
                                        $tempArray['Mother'] = 1;
                                    }
                                    else if ($theValue == 'Sibling'){
                                        $tempArray['Sibling'] = 1;
                                    }
                                    else if ($theValue == 'Other'){
                                        $tempArray['Other'] = 1;
                                    }
                                }
                            }
                            if (($tempArray['Father'] + $tempArray['Mother'] + $tempArray['Sibling']+$tempArray['Other'])>0){
                                $tempArray['None'] = 0;                            
                            }
                            else{
                                $tempArray['None'] = 1;   
                            }
                            if (($tempArray['Father'] == 1) && ($tempArray['Mother']==1)){
                                $personalProfile->legacy_direct = 'B';
                            }
                            else if ($tempArray['Father']==1){
                                $personalProfile->legacy_direct = 'F';
                            }
                            else if ($tempArray['Mother']==1){
                                $personalProfile->legacy_direct = 'M';
                            }
                            else if ($tempArray['None']==1){
                                $personalProfile->legacy_direct = 'N';
                            }
                            if (($tempArray['Sibling'] == 1) && ($tempArray['Other']==1)){
                                $personalProfile->legacy_indirect = 'B';
                            }
                            else if ($tempArray['Sibling']==1){
                                $personalProfile->legacy_indirect = 'S';
                            }
                            else if ($tempArray['Other']==1){
                                $personalProfile->legacy_indirect = 'O';
                            }
                            else if ($tempArray['None']==1){
                                $personalProfile->legacy_indirect = 'N';
                            }                       
                        }
                        if ($basicProfile->race_id == ""){
                            $basicProfile->race_id = NULL;
                        }
                        if ($personalProfile->religion_id == ""){
                            $personalProfile->religion_id = NULL;
                        }
                        $valid = $personalProfile->validate();                  
                        $valid = $basicProfile->validate()  && $valid;
                        if ($valid)
                        {
                            $personalProfile->save(true);
                            $basicProfile->save(true);
                            Yii::app()->user->setFlash('basicSuccess',"Info saved!" );
                             $this->redirect(array('modBasic',));   
                        }

		}

                
                $myID = Yii::app()->user->id;	   
                
                $languageProfile=new LanguageProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LanguageProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$languageProfile->attributes=$_POST['LanguageProfile'];

                        $valid = $languageProfile->validate();                  
                        if ($valid)
                        {
                            $languageProfile->save(true);
                            unset($languageProfile);
                            $languageProfile = new LanguageProfile;
                            Yii::app()->user->setFlash('langSuccess',"Info saved!" );
                             $this->redirect(array('modBasic',));   
                        }

		}

		
	$otherschooladmitProfile=new OtherSchoolAdmitProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OtherSchoolAdmitProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$otherschooladmitProfile->attributes=$_POST['OtherSchoolAdmitProfile'];

                        $valid = $otherschooladmitProfile->validate();                  
                        if ($valid)
                        {
                            $otherschooladmitProfile->save(true);
                            unset($otherschooladmitProfile);
                            $otherschooladmitProfile = new OtherSchoolAdmitProfile;
                            Yii::app()->user->setFlash('otherschoolSuccess',"Info saved!" );
                             $this->redirect(array('modBasic',));   
                        }

		}

//$otherschooladmitProfile->other_university_name = $otherschooladmitProfile->otherschoolids->name;                
                
		$this->render('modBasic',array(
			'personalProfile'=>$personalProfile,
                        'basicProfile'=>$basicProfile,
                        'languageProfile'=>$languageProfile,
                        'otherschooladmitProfile'=>$otherschooladmitProfile,
		));
	}
        
	public function actionModScores()
	{
                $myID = Yii::app()->user->id;
                
                $scoreProfile=ScoreProfile::model()->findByPk($myID);
                $academicProfile=AcademicProfile::model()->findByPk($myID);
		if($scoreProfile===null)
                {                
                        $scoreProfile=new ScoreProfile;
                }
		if($academicProfile===null)
                {                
                        $academicProfile=new AcademicProfile;
                }                
                      
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['ScoreProfile']))||(isset($_POST['AcademicProfile'])))

		{
                        // Set the Profile model class attributes in a bulk ma  nner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$scoreProfile->attributes=$_POST['ScoreProfile'];
                        $academicProfile->attributes=$_POST['AcademicProfile'];
                        $valid = $scoreProfile->validate();          
                        $valid = $academicProfile->validate() && $valid;
                        if ($valid)
                        {
                            $scoreProfile->save(true);
                            $academicProfile->save(true);
                            Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                             $this->redirect(array('modScores',));   
                        }

		}

		$this->render('modScores',array(
			'scoreProfile'=>$scoreProfile,
                        'academicProfile'=>$academicProfile,
		));

	                
        }


	public function actionModSat2()
	{
               
                
               $myID = Yii::app()->user->id;
                
              
                $sat2Profile=new Sat2Profile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sat2Profile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$sat2Profile->attributes=$_POST['Sat2Profile'];

                        $valid = $sat2Profile->validate();                  
                        if ($valid)
                        {
                            $sat2Profile->save(true);
                            unset($sat2Profile);
                            $sat2Profile = new Sat2Profile;
                            Yii::app()->user->setFlash('sat2Success',"Info Updated and Saved!" );
                             $this->redirect(array('modSat2',));   
                        }

		}

		$this->render('modSat2',array(
			'sat2Profile'=>$sat2Profile,
		));
	}

      public function actionModLang()
	{
                $myID = Yii::app()->user->id;
                
              
                $languageProfile=new LanguageProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LanguageProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$languageProfile->attributes=$_POST['LanguageProfile'];

                        $valid = $languageProfile->validate();                  
                        if ($valid)
                        {
                            $languageProfile->save(true);
                            unset($languageProfile);
                            $languageProfile = new LanguageProfile;
                            Yii::app()->user->setFlash('langSuccess',"Info saved!" );
                             $this->redirect(array('modBasic',));   
                        }

		}

		$this->render('modBasic',array(
			'languageProfile'=>$languageProfile,
		));
	}

                public function actionDeleteOtherSchoolAdmit($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadOtherSchoolAdmit($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modBasic',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
        public function loadOtherSchoolAdmit($id)
	{
		$otherschooladmitProfile=OtherSchoolAdmitProfile::model()->findByPk($id);
		if($otherschooladmitProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $otherschooladmitProfile;
	}
        
        public function actionDeleteLang($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadLang($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modBasic',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
       public function loadLang($id)
	{
		$languageProfile=LanguageProfile::model()->findByPk($id);
		if($languageProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $languageProfile;
	}
        
	public function actionModEssays()
	{
                $myID = Yii::app()->user->id;
                
              
                $essayProfile=new EssayProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EssayProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$essayProfile->attributes=$_POST['EssayProfile'];

                        $valid = $essayProfile->validate();                  
                        if ($valid)
                        {
                            $essayProfile->save(true);
                            unset($essayProfile);
                            $essayProfile = new EssayProfile;
                            Yii::app()->user->setFlash('essaySuccess',"Info saved!" );
                             $this->redirect(array('modEssays',));   
                        }

		}

		$this->render('modEssays',array(
			'essayProfile'=>$essayProfile,
		));
	}
        
	public function actionModAp()
	{
                $myID = Yii::app()->user->id;
                
              
                $apProfile=new ApProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ApProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$apProfile->attributes=$_POST['ApProfile'];

                        $valid = $apProfile->validate();                  
                        if ($valid)
                        {
                            $apProfile->save(true);
                            unset($apProfile);
                            $apProfile = new ApProfile;
                            Yii::app()->user->setFlash('apSuccess',"Info saved!" );
                             $this->redirect(array('modAp',));   
                        }

		}

		$this->render('modAp',array(
			'apProfile'=>$apProfile,
		));
	}
        
	public function actionModSubjects()
	{
                $myID = Yii::app()->user->id;
                
              
                $subjectProfile=new SubjectProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SubjectProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$subjectProfile->attributes=$_POST['SubjectProfile'];

                        $valid = $subjectProfile->validate();                  
                        if ($valid)
                        {
                            $subjectProfile->save(true);
                            unset($subjectProfile);
                            $subjectProfile = new SubjectProfile;
                            Yii::app()->user->setFlash('subjectSuccess',"Info saved!" );
                             $this->redirect(array('modSubjects',));   
                        }

		}

		$this->render('modSubjects',array(
			'subjectProfile'=>$subjectProfile,
		));
	}
        
	public function actionModSports()
	{
                $myID = Yii::app()->user->id;
                
              
                $sportProfile=new SportProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SportProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$sportProfile->attributes=$_POST['SportProfile'];

                        $valid = $sportProfile->validate();                  
                        if ($valid)
                        {
                            $sportProfile->save(true);
                            unset($sportProfile);
                            $sportProfile = new SportProfile;
                            Yii::app()->user->setFlash('sportSuccess',"Info saved!" );
                             $this->redirect(array('modSports',));   
                        }

		}

		$this->render('modSports',array(
			'sportProfile'=>$sportProfile,
		));
	}
        
	public function actionModExtracurriculars()
	{
                $myID = Yii::app()->user->id;
                
              
                $activityProfile=new ActivityProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ActivityProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$activityProfile->attributes=$_POST['ActivityProfile'];

                        $valid = $activityProfile->validate();                  
                        if ($valid)
                        {
                            $activityProfile->save(true);
                            unset($activityProfile);
                            $activityProfile = new ActivityProfile;
                            Yii::app()->user->setFlash('activitySuccess',"Info saved!" );
                            $this->redirect(array('modExtracurriculars',));   
                        }

		}
               $sportProfile=new SportProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SportProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$sportProfile->attributes=$_POST['SportProfile'];

                        $valid = $sportProfile->validate();                  
                        if ($valid)
                        {
                            $sportProfile->save(true);
                            unset($sportProfile);
                            $sportProfile = new SportProfile;
                            Yii::app()->user->setFlash('sportSuccess',"Info saved!" );
                             $this->redirect(array('modExtracurriculars',));   
                        }

		}
                 $musicProfile=new MusicProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MusicProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$musicProfile->attributes=$_POST['MusicProfile'];

                        $valid = $musicProfile->validate();                  
                        if ($valid)
                        {
                            $musicProfile->save(true);
                            unset($musicProfile);
                            $musicProfile = new MusicProfile;
                            Yii::app()->user->setFlash('musicSuccess',"Info saved!" );
                             $this->redirect(array('modExtracurriculars',));   
                        }

		}

                 $volunteerProfile=new VolunteerProfile;              
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VolunteerProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$volunteerProfile->attributes=$_POST['VolunteerProfile'];

                        $valid = $volunteerProfile->validate();                  
                        if ($valid)
                        {
                            $volunteerProfile->save(true);
                            unset($volunteerProfile);
                            $volunteerProfile = new VolunteerProfile;
                            Yii::app()->user->setFlash('volunteerSuccess',"Info saved!" );
                             $this->redirect(array('modExtracurriculars',));   
                        }
		}
                
               $workProfile=new WorkProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WorkProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$workProfile->attributes=$_POST['WorkProfile'];

                        $valid = $workProfile->validate();                  
                        if ($valid)
                        {
                            $workProfile->save(true);
                            unset($workProfile);
                            $workProfile = new WorkProfile;
                            Yii::app()->user->setFlash('workSuccess',"Info saved!" );
                             $this->redirect(array('modExtracurriculars',));   
                        }

		}             

               $researchProfile=new ResearchProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ResearchProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$researchProfile->attributes=$_POST['ResearchProfile'];

                        $valid = $researchProfile->validate();                  
                        if ($valid)
                        {
                            $researchProfile->save(true);
                            unset($researchProfile);
                            $researchProfile = new ResearchProfile;
                            Yii::app()->user->setFlash('researchSuccess',"Info saved!" );
                             $this->redirect(array('modExtracurriculars',));   
                        }

		}                   
               $summerProfile=new SummerProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SummerProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$summerProfile->attributes=$_POST['SummerProfile'];

                        $valid = $summerProfile->validate();                  
                        if ($valid)
                        {
                            $summerProfile->save(true);
                            unset($summerProfile);
                            $summerProfile = new SummerProfile;
                            Yii::app()->user->setFlash('summerSuccess',"Info saved!" );
                             $this->redirect(array('modExtracurriculars',));   
                        }

		} 

               $otherProfile=new OtherProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OtherProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$otherProfile->attributes=$_POST['OtherProfile'];

                        $valid = $otherProfile->validate();                  
                        if ($valid)
                        {
                            $otherProfile->save(true);
                            unset($otherProfile);
                            $otherProfile = new OtherProfile;
                            Yii::app()->user->setFlash('otherSuccess',"Info saved!" );
                             $this->redirect(array('modExtracurriculars',));   
                        }

		}                 
                
		$this->render('modExtracurriculars',array(
                           'activityProfile'=>$activityProfile,
                           'sportProfile'=>$sportProfile,
                           'musicProfile'=>$musicProfile,
                           'volunteerProfile'=>$volunteerProfile,
                           'workProfile'=>$workProfile,
                           'researchProfile'=>$researchProfile,
                           'summerProfile'=>$summerProfile,
                           'otherProfile'=>$otherProfile,
		));
	}
        
	public function actionModCompetitions()
	{
                $myID = Yii::app()->user->id;
                
              
                $competitionProfile=new CompetitionProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CompetitionProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$competitionProfile->attributes=$_POST['CompetitionProfile'];

                        $valid = $competitionProfile->validate();                  
                        if ($valid)
                        {
                            $competitionProfile->save(true);
                            unset($competitionProfile);
                            $competitionProfile = new CompetitionProfile;
                            Yii::app()->user->setFlash('competitionSuccess',"Info saved!" );
                            $this->redirect(array('modCompetitions',));   
                        }

		}

		$this->render('modCompetitions',array(
			'competitionProfile'=>$competitionProfile,
		));
	}


	public function actionIndex()
	{
                $this->redirect(Yii::app()->homeUrl);
/*		$this->render('index'); */
	}
        

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
	public function actionDeleteExtracurricular($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadExtracurricular($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modExtracurriculars',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadExtracurricular($id)
	{
		$activityProfile=ActivityProfile::model()->findByPk($id);
		if($activityProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $activityProfile;
	}
               
	public function actionDeleteAp($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadAp($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modAp',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadAp($id)
	{
		$apProfile=ApProfile::model()->findByPk($id);
		if($apProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $apProfile;
	}
        
	public function actionDeleteSat2($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadSat2($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modSat2',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadSat2($id)
	{
		$sat2Profile=Sat2Profile::model()->findByPk($id);
		if($sat2Profile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $sat2Profile;
	}
        
 
	public function actionDeleteScore($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadScore($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modScores',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadScore($id)
	{
		$scoreProfile=ScoreProfile::model()->findByPk($id);
		if($scoreProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $scoreProfile;
	}
        
	public function actionDeleteSport($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadSport($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modExtracurriculars',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadSport($id)
	{
		$sportProfile=SportProfile::model()->findByPk($id);
		if($sportProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $sportProfile;
	}
    
	public function actionDeleteMusic($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadMusic($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modExtracurriculars',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadMusic($id)
	{
		$musicProfile=MusicProfile::model()->findByPk($id);
		if($musicProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $musicProfile;
	}       
        
	public function actionDeleteVolunteer($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadVolunteer($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modExtracurriculars',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadVolunteer($id)
	{
		$volunteerProfile=VolunteerProfile::model()->findByPk($id);
		if($volunteerProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $volunteerProfile;
	}               

        
	public function actionDeleteResearch($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadResearch($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modExtracurriculars',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadResearch($id)
	{
		$researchProfile=ResearchProfile::model()->findByPk($id);
		if($researchProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $researchProfile;
	}               
        
        
	public function actionDeleteWork($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadWork($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modExtracurriculars',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadWork($id)
	{
		$workProfile=WorkProfile::model()->findByPk($id);
		if($workProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $workProfile;
	}  

	public function actionDeleteSummer($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadSummer($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modExtracurriculars',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadSummer($id)
	{
		$summerProfile=SummerProfile::model()->findByPk($id);
		if($summerProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $summerProfile;
	}     

	public function actionDeleteOther($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadOther($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modExtracurriculars',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadOther($id)
	{
		$otherProfile=OtherProfile::model()->findByPk($id);
		if($otherProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $otherProfile;
	}              
        
        protected function loadBasic($id)
	{
		$basicProfile=BasicProfile::model()->findByPk($id);
		if($basicProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $basicProfile;
	}
        
	public function actionDeleteSubject($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadSubject($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modSubjects',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	protected function loadSubject($id)
	{
		$subjectProfile=SubjectProfile::model()->findByPk($id);
		if($subjectProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $subjectProfile;
	}
        
	public function actionDeleteEssay($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadEssay($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modEssays',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	public function loadEssay($id)
	{
		$essayProfile=EssayProfile::model()->findByPk($id);
		if($essayProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $essayProfile;
	}
        
	public function actionViewEssay($id)
	{
 		$this->render('viewEssay',array(
			'model'=>$this->loadEssay($id),
		));
                
	}
        
	public function actionDeleteCompetition($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadCompetition($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modAcademicTabs',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	public function loadCompetition($id)
	{
		$competitionProfile=CompetitionProfile::model()->findByPk($id);
		if($competitionProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $competitionProfile;
	}
        
	public function actionDeleteAward($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
 			$this->loadAward($id)->delete();
// 
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//                        {
                            $this->redirect(array('modAcademicTabs',));   
//                       }
//                	else
//                        	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//            }
        }
        
	public function loadAward($id)
	{
		$awardProfile=AwardProfile::model()->findByPk($id);
		if($awardProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $awardProfile;
	}
                
	public function actionBrowse()
	{
		$model=new BasicProfile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BasicProfile']))
			$model->attributes=$_GET['BasicProfile'];

		$this->render('browse',array(
			'model'=>$model,
		));
	}

	public function actionBrowseMine()
	{
		$model=new BasicProfile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BasicProfile']))
			$model->attributes=$_GET['BasicProfile'];

		$this->render('browseMine',array(
			'model'=>$model,
		));
	}        
        
        public function setEditProfileMenu()
        {
            $this->menu=array(
                array('label'=>'Personal Info', 'url'=>array('modBasic')),
                array('label'=>'Academics', 'url'=>array('modAcademicTabs')),
                array('label'=>'Test Scores', 'url'=>array('modScoreTabs')),
                array('label'=>'Extracurriculars', 'url'=>array('modExtracurriculars')),
                array('label'=>'Essays', 'url'=>array('modEssays')),

/*              array('label'=>'Basic', 'url'=>array('modBasic')),
                array('label'=>'Basic Academic/Scores', 'url'=>array('modScores')),
                array('label'=>'Subjects Studied', 'url'=>array('modSubjects')),
                array('label'=>'SAT II Scores', 'url'=>array('modSat2')),
                array('label'=>'AP Scores', 'url'=>array('modAp')),
                array('label'=>'Sports', 'url'=>array('modSports')),
                array('label'=>'Extracurriculars', 'url'=>array('modExtracurriculars')),
                array('label'=>'Non-Athletic Competitions', 'url'=>array('modCompetitions')),
                array('label'=>'Essays', 'url'=>array('modEssays')),
 */               
                
                
                );
        }
        
        public function setViewProfileMenu($id)
        {
            $this->menu=array(
                array('label'=>'Basic', 'url'=>array('viewBasic','profileID'=>$id)),
                array('label'=>'Scores', 'url'=>array('viewScores','profileID'=>$id)),
                array('label'=>'Academics', 'url'=>array('viewAcademics','profileID'=>$id)),
                array('label'=>'Extracurriculars', 'url'=>array('viewExtracurriculars','profileID'=>$id)),
                array('label'=>'Essays', 'url'=>array('viewEssays','profileID'=>$id)),
            );
        }
//        
// 	public function actionRedirect($newAction)
//	{
//           $this->redirect(array("$newAction",));   
//	}

        
        public function actionModScoreTabs()
	{
        	
                $myID = Yii::app()->user->id;
                
                $scoreProfile=ScoreProfile::model()->findByPk($myID);
                $academicProfile=AcademicProfile::model()->findByPk($myID);
                
		if($scoreProfile===null)
                {                
                        $scoreProfile=new ScoreProfile;
                }
		if($academicProfile===null)
                {                
                        $academicProfile=new AcademicProfile;
                }                
                      
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['ScoreProfile']))||(isset($_POST['AcademicProfile'])))
		{
                        // Set the Profile model class attributes in a bulk ma  nner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$scoreProfile->attributes=$_POST['ScoreProfile'];
                        if (isset($_POST['AcademicProfile'])){                               
                                $academicProfile ->attributes=$_POST['AcademicProfile'];
                                $valid = $academicProfile->validate();        
                                $valid = $scoreProfile->validate() && $valid;          
                                if ($valid)
                                {
                                    $scoreProfile->save(true);
                                    $academicProfile->save(true);
                                    Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                                     $this->redirect(array('modScoreTabs',));   
                                }
                        }
                        else{     
                                if ($scoreProfile->validate())
                                {
                                    $scoreProfile->save(true);
                                    Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                                     $this->redirect(array('modScoreTabs',));   
                                }
                        }



		}

	//	$this->render('modScores',array(
	//		'scoreProfile'=>$scoreProfile,
        //                'academicProfile'=>$academicProfile,
	//	));
                
            
  
      
                 $sat2Profile=new Sat2Profile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sat2Profile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$sat2Profile->attributes=$_POST['Sat2Profile'];

                        $valid = $sat2Profile->validate();                  
                        if ($valid)
                        {
                            $sat2Profile->save(true);
                            unset($sat2Profile);
                            $sat2Profile = new Sat2Profile;
                            Yii::app()->user->setFlash('sat2Success',"Info saved!" );
                             $this->redirect(array('modScoreTabs',));   
                        }

		}

                 $apProfile=new ApProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ApProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$apProfile->attributes=$_POST['ApProfile'];

                        $valid = $apProfile->validate();                  
                        if ($valid)
                        {
                            $apProfile->save(true);
                            unset($apProfile);
                            $apProfile = new ApProfile;
                            Yii::app()->user->setFlash('apSuccess',"Info saved!" );
                             $this->redirect(array('modScoreTabs',));   
                        }

		}  
                
                
     $this->render('modScoreTabs',array(
                        'scoreProfile'=>$scoreProfile,
                        'academicProfile'=>$academicProfile,
                        'sat2Profile'=>$sat2Profile,
                        'apProfile'=>$apProfile,
                        )
                    );
        
        }

        
   public function actionmodAcademicTabs()
	{
        	
                $myID = Yii::app()->user->id;
                
           //     $scoreProfile=ScoreProfile::model()->findByPk($myID);
                $academicProfile=AcademicProfile::model()->findByPk($myID);
                
//		if($scoreProfile===null)
  //              {                
    //                    $scoreProfile=new ScoreProfile;
      //          }
		if($academicProfile===null)
                {                
                        $academicProfile=new AcademicProfile;
                }                
                      
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(/*isset($_POST['ScoreProfile'])||(*/isset($_POST['AcademicProfile']))//)
		{
                        // Set the Profile model class attributes in a bulk ma  nner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			//$scoreProfile->attributes=$_POST['ScoreProfile'];
                        $academicProfile->attributes=$_POST['AcademicProfile'];

                        //$valid = $scoreProfile->validate();          
                        $valid = $academicProfile->validate()/* && $valid*/;
                        if ($valid)
                        {
                          //  $scoreProfile->save(true);
                            $academicProfile->save(true);
                            Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                             $this->redirect(array('modAcademicTabs',));   
                        }

		}

               
        
                 $subjectProfile=new SubjectProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SubjectProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$subjectProfile->attributes=$_POST['SubjectProfile'];

                        $valid = $subjectProfile->validate();                  
                        if ($valid)
                        {
                            $subjectProfile->save(true);
                            unset($subjectProfile);
                            $subjectProfile = new SubjectProfile;
                            Yii::app()->user->setFlash('subjectSuccess',"Info saved!" );
                             $this->redirect(array('modAcademicTabs',));   
                        }

		}
                
                $competitionProfile=new CompetitionProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CompetitionProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$competitionProfile->attributes=$_POST['CompetitionProfile'];

                        $valid = $competitionProfile->validate();                  
                        if ($valid)
                        {
                            $competitionProfile->save(true);
                            unset($competitionProfile);
                            $competitionProfile = new CompetitionProfile;
                            Yii::app()->user->setFlash('competitionSuccess',"Info saved!" );
                            $this->redirect(array('modAcademicTabs',));   
                        }

		}

                $awardProfile=new AwardProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AwardProfile']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$awardProfile->attributes=$_POST['AwardProfile'];

                        $valid = $awardProfile->validate();                  
                        if ($valid)
                        {
                            $awardProfile->save(true);
                            unset($awardProfile);
                            $awardProfile = new AwardProfile;
                            Yii::app()->user->setFlash('awardSuccess',"Info saved!" );
                            $this->redirect(array('modAcademicTabs',));   
                        }

		}
		
		
              $this->render('modAcademicTabs',array(
                //        'scoreProfile'=>$scoreProfile,
                        'academicProfile'=>$academicProfile,
                        'subjectProfile'=>$subjectProfile,
                        'competitionProfile'=>$competitionProfile,
                        'awardProfile'=>$awardProfile
                        )
                    );  
 
        }
        
	protected function loadCreditModel($id)
	{
		$model=UserCredit::model()->findByPk($id);
		if($model===null){
                    $model = new UserCredit();
                    $model->buy_credits = 0;
                    $model->sell_credits = 0;
                    $model->user_id = $id;
                    $model->save(true);
                }			
		return $model;
	}
        
        protected function checkProfileAccess($profileID, $inLevel){
            $userID = Yii::app()->user->id;
            
            $access = false;
            $mapProfileStudent=MapProfileStudent::model()->findByPk(array("user_id"=>$userID,"purchased_profile_id"=>$profileID));

            if($mapProfileStudent!==null){    
               switch ($inLevel){
                    case 1:
                          if ($mapProfileStudent->l1_purchased == 1) $access = true;
                        break;
                    case 2:
                          if ($mapProfileStudent->l2_purchased == 1) $access = true;
                        break;
                    case 3:
                          if ($mapProfileStudent->l3_purchased == 1) $access = true;                          
                        break;
                    case 1000:
                          if ($mapProfileStudent->isOwner == 1) $access = true;
                        break;
                }

            }
            
            return $access;
        }
        
        
        protected function getProfileAccessArray($profileID){
            $userID = Yii::app()->user->id;
            
            $mapProfileStudent=MapProfileStudent::model()->findByPk(array("user_id"=>$userID,"purchased_profile_id"=>$profileID));

            if($mapProfileStudent!==null){    
                $outAccessArray = $mapProfileStudent->getAccessArray();
             }
             else{
                 $outAccessArray = array('l1'=>0,
                         'l2'=>0,
                         'l3'=>0,
                         'owner'=>0,
                        );
             }
             return $outAccessArray;
        }
            
        static public function getProfilePrice($id, $inLevel){
            $outPrice = 999;
            switch ($inLevel){
                case 1:
                     $outPrice = 1;
                    break;
                case 2:
                     $outPrice = 2;
                    break;
                case 3:
                     $outPrice = 2;                       
                    break;
            }
           return $outPrice;
        }
        
}


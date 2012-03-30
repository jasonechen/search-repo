<?php

class ProfileController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2_1';

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
            array(
                'allow',
                    'actions' => array(
                    'index', 'viewEssay',
                    'modBasic', 'modLang', 'loadLang', 'modScores', 'modSubjects', 'modSat2', 'modSports', 'modAp', 'modExtracurriculars',
                    'modCompetitions', 'modEssays', 'suggestUniversity', 'suggestHighschool', 'suggestLanguage',
                    'loadOtherSchoolAdmit', 'loadMusic', 'loadVolunteer', 'loadWork',
                    'loadSummer', 'deleteSummer', 'loadResearch', 'deleteResearch', 'loadOther', 
                    'modScoreTabs', 'modAcademicTabs', 'loadAward', 
                    'browseMine', 'viewBasic', 'viewPurchProfile', 'viewScores', 'viewAcademics', 'viewExtracurriculars', 'viewEssays', 'viewAll',
                ),
                'users' => array('@'),
			),
            array(
                'allow',
				'actions' => array(
                    'viewProfile', 'LearnMoreCredits', 'browse', 'suggestUniversity',
                ),
				'users' => array('*'),
			),
			array(
                'deny',
				'users' => array('*'),
			),
		);
	}

        protected function loadBasic($id)
	{
		$basicProfile=BasicProfile::model()->findByPk($id);
		if($basicProfile===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $basicProfile;
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
                             $creditsSpentArray = array(
                                 'l1Credits'=>0,
                                 'l2Credits'=>0,
                                 'l3Credits'=>0,
                                 'l4Credits'=>0,);
                              $creditModel = $this->loadCreditModel($userID);
                              $curCredits = $creditModel->buy_credits;
                              $totalCreditsNeeded = 0;
                              if ($purchaseArray['l1Purchase']){
                                  $l1CreditPrice= ProfileController::getProfilePrice($profileID, 1);
                                  $totalCreditsNeeded += $l1CreditPrice;
                                  $creditsSpentArray['l1Credits'] = $l1CreditPrice; 
                              }
                              if ($purchaseArray['l2Purchase']){
                                  $l2CreditPrice= ProfileController::getProfilePrice($profileID, 2);
                                  $totalCreditsNeeded += $l2CreditPrice;
                                  $creditsSpentArray['l2Credits'] = $l2CreditPrice; 
                              } 
                              if ($purchaseArray['l3Purchase']){
                                  $l3CreditPrice= ProfileController::getProfilePrice($profileID, 3);
                                  $totalCreditsNeeded += $l3CreditPrice;
                                  $creditsSpentArray['l3Credits'] = $l3CreditPrice; 
                              }
                              if ($purchaseArray['l4Purchase']){
                                  $l4CreditPrice= ProfileController::getProfilePrice($profileID, 4);
                                  $totalCreditsNeeded += $l4CreditPrice;
                                  $creditsSpentArray['l4Credits'] = $l4CreditPrice; 
                              }                              
                              echo Yii::log("totalCreditsNeeded: ".CVarDumper::dumpAsString($totalCreditsNeeded),'error');   
                              echo Yii::log("curCredits: ".CVarDumper::dumpAsString($curCredits),'error');   
                              if ($totalCreditsNeeded > $curCredits){
                                    $buyProfileForm->buyL1 = false;
                                    $buyProfileForm->buyL2 = false;
                                    $buyProfileForm->buyL3 = false;
                                    $buyProfileForm->buyL4 = false;
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
                                        $mapProfileStudent->l4_purchased = 0;
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
                                    if ($purchaseArray['l4Purchase']){
                                        $mapProfileStudent->l4_purchased = 1;
                                        $mapProfileStudent->l4_purchase_time=new CDbExpression('NOW()');
                                    }                                    
//                                    echo Yii::log("mapProfileStudent ".CVarDumper::dumpAsString($mapProfileStudent),'error');  
//                                    $myCheck = $mapProfileStudent->save();
//                                    $myCheck2= $mapProfileStudent->getErrors();
//                                    echo Yii::log("myCheck: ".CVarDumper::dumpAsString($myCheck2),'error');  
                                    if ($mapProfileStudent->save(true)){
//
                                        $creditModel = $this->loadCreditModel($userID);
                                        User::addSellerView($purchaseArray,$creditsSpentArray,$creditModel->avg_price,$userID,$profileID);
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
       	
        //set return url
        Yii::app()->user->returnUrl =  Yii::app()->createAbsoluteUrl('profile/viewProfile', array('profileID' => $profileID));
        
       	//check radio button visible by essay profile       	
        $essay_profile_exist = EssayProfile::model()->exists('user_id = ?', array($profileID));
       	//check consult profile to add 4th radio
        $consult_exist = Consult::model()->exists('user_id = ?', array($profileID));
       	
		$this->render('viewProfile',
            array(
                 'buyProfileForm' => $buyProfileForm,
                 'creditModel' => $creditModel,
                 'basicProfile' => $basicProfile,
                 'searchUri' => $searchUri,
            	 'essay_profile_exist' => $essay_profile_exist,
            	'consult_exist' => $consult_exist
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
            $this->layout = 'column2_1';
            
            $userID = Yii::app()->user->id;
                        
            $mapProfileStudent = MapProfileStudent::model()->findByPk(array('user_id'=>"$userID",
                                                                        'purchased_profile_id'=>"$profileID",));
            if ($mapProfileStudent === null){
                $mapProfileStudent = new MapProfileStudent;
                $mapProfileStudent->user_id = $userID;
                $mapProfileStudent->purchased_profile_id = $profileID;
                $mapProfileStudent->l1_purchased = 0;
                $mapProfileStudent->l2_purchased = 0;
                $mapProfileStudent->l3_purchased = 0;
                $mapProfileStudent->l4_purchased = 0;
                $mapProfileStudent->isOwner = 0;
            }
            $profileAccessArray = $this->getProfileAccessArrayFromMPS($mapProfileStudent);
            
            $basicProfile=BasicProfile::model()->findByPk($profileID);
            if ($basicProfile == null){
                 throw new CHttpException(404,'The requested page does not exist.');    
            }
            if($profileAccessArray['l1']==1) {
                $personalProfile=PersonalProfile::model()->findByPk($profileID);    
                $otherSchoolAdmitProfileArray=OtherSchoolAdmitProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $languageProfileArray=LanguageProfile::model()->findAllByAttributes(array('user_id'=>$profileID),array('order'=>'language_id'));

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

            $buyProfileForm = new BuyProfileForm;
            $buyProfileForm->basicProfile = $basicProfile;
            $buyProfileForm->profile_id = $profileID;
            $buyProfileForm->buyer_id = $userID;


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
        

        
        public function actionLearnMoreCredits()
	{
            $this->layout = 'column2';
            
            $dataProvider = CreditsPackage::model()->findAll();	

             Yii::app()->user->returnUrl =  Yii::app()->createAbsoluteUrl('profile/LearnMoreCredits');
            $this->render('learnmore_credits', array('dataProvider'=>$dataProvider))
		;
                
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
   

        
	protected function loadCreditModel($id)
	{
		$model=UserCredit::model()->findByPk($id);
		if($model===null){
                    $model = new UserCredit();
                    $model->buy_credits = 0;
                    $model->sell_credits = 0;
                    $model->user_id = $id;
                    $model->avg_price = 0;
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
                    case 4:
                          if ($mapProfileStudent->l4_purchased == 1) $access = true;                          
                        break;                        
                    case 1000:
                          if ($mapProfileStudent->isOwner == 1) $access = true;
                        break;
                }

            }
            
            return $access;
        }
        
        protected function getProfileAccessArrayFromMPS($inMapProfileStudent){
            if($inMapProfileStudent!==null){    
                $outAccessArray = $inMapProfileStudent->getAccessArray();
             }
             else{
                 $outAccessArray = array('l1'=>0,
                         'l2'=>0,
                         'l3'=>0,
                         'l4'=>0,
                         'owner'=>0,
                        );
             }
             return $outAccessArray;
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
                         'l4'=>0,
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
                case 4:
                     $outPrice = 20;                       
                    break;                
            }
           return $outPrice;
        }
 }
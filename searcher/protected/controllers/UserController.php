<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2_1';

	/**
	 * @return array action filters
	 */
	
        public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
        
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
	public function accessRules()
	{
		return array(
/*These need to be fixed so only the self user can run these operations */                    
			array('allow',  
				'actions'=>array('index','view','update','browse','indexSeller','indexBuyer','account',
                                                  'Credits', 'deleteConsult','Profile', 'Addresschange','Addressdelete', 'Paypaldelete',
                                                'Learnmore', 'Settings', 'Consult', 'Validate', 'Earnings', 'BuyerAccountSum',
                                                'PurchasedDetails', 'Help', 'PaypalChange','Viewinvoice','Successpage','Deletefile'),
				'users'=>array('@'),
			),
			array('allow',  
				'actions'=>array('miscStuff','generateRandom','deleteRandom','fillInMapInfo','fillInCreditInfo','calcSAT'),
				'users'=>array('@'),
			),
                        array('allow',  
				'actions'=>array('readUniversity','readHS','fillTotal','updateAvgRatings'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('Registrationlink','create','createstudent','captcha','Successlink'),
				'users'=>array('*'),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                    
                    
		);
	}
        
        public function actionFillInMapInfo()
        {                            
            $users = User::model()->findAll();
            fb($users);
            foreach($users as $user) { 
                
               $mapProfileStudent=MapProfileStudent::model()->findByPk(array("user_id"=>$user->id,"purchased_profile_id"=>$user->id));

		if($mapProfileStudent===null){    
                    $mapProfileStudent = new MapProfileStudent();

                    $mapProfileStudent->user_id = $user->id;
                    $mapProfileStudent->purchased_profile_id = $user->id;
                    $mapProfileStudent->l1_purchased = 0;
                    $mapProfileStudent->l2_purchased = 0;
                    $mapProfileStudent->l3_purchased = 0;
                    $mapProfileStudent->isOwner = 1;
                    $mapProfileStudent->save(true);
                }
            }
            
            Yii::app()->user->setFlash('generateSuccess',"Map info filled in!" );
            $this->redirect(array('user/miscStuff'));                 
        }
        
        public function actionFillInCreditInfo()
        {         
            $connection = Yii::app()->db;
            $sql = "DELETE FROM tbl_seller_hist_royalty where user_id >= 0";          
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_curr_royalty where user_id >= 0";          
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_hist_view where user_id >= 0";          
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_curr_view where user_id >= 0";          
            $command = $connection->createCommand($sql);
            $command->query();
            
            $userCredits = UserCredit::model()->findAll();
            fb($userCredits);
            foreach($userCredits as $userCredit) {
                if ($userCredit->buy_credits > 0 and ($userCredit->avg_price ==null or $userCredit->avg_price == 0)){
                    $userCredit->avg_price = User::defaultAvgPrice();
                    $userCredit->save(false);
                }
            }
            
            $basicProfiles = BasicProfile::model()->findAll();
            fb($basicProfiles);
            foreach($basicProfiles as $basicProfile) {
                User::updateRoyalty($basicProfile->user_id);
            }
            
            $mapProfileStudents = MapProfileStudent::model()->findAll();
            fb($mapProfileStudents);
            foreach($mapProfileStudents as $mapProfileStudent) {
                if ($mapProfileStudent->isOwner != 1){
                    
                    $tempSellerID = $mapProfileStudent->purchased_profile_id;
                    $tempBuyerID = $mapProfileStudent->user_id;
//                    $l1CreditPrice= ProfileController::getProfilePrice($tempSellerID, 1);
//                    $l2CreditPrice= ProfileController::getProfilePrice($tempSellerID, 2);
//                    $l3CreditPrice= ProfileController::getProfilePrice($tempSellerID, 3);
                    
                    $userCredit=UserCredit::model()->findByPk($tempBuyerID);
                    $tempPurchaseArray = array('l1Purchase'=>$mapProfileStudent->l1_purchased,
                         'l2Purchase'=>$mapProfileStudent->l2_purchased,
                         'l3Purchase'=>$mapProfileStudent->l3_purchased,
                        );		
//                    $tempCreditArray = array('l1Credits'=>$l1CreditPrice,
//                         'l2Credits'=>$l2CreditPrice,
//                         'l3Credits'=>$l3CreditPrice,
//                        );
                    
                    $tempCreditArray = array('l1Credits'=>1,
                         'l2Credits'=>2,
                         'l3Credits'=>2,
                        );
                    $tempAvgPrice = User::defaultAvgPrice();
                    User::addSellerView($tempPurchaseArray,$tempCreditArray,$tempAvgPrice,$tempBuyerID,$tempSellerID);
                }
            }
            
            Yii::app()->user->setFlash('generateSuccess',"Credit info filled in!" );
            $this->redirect(array('user/miscStuff'));                    
        }
        
        
	public function actionDeleteRandom()
	{
            $connection = Yii::app()->db;
            $sql = "SELECT count(user_id) as theCount FROM tbl_basic_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $theReader = $command->query();
            $theResult = $theReader->read();
//            $theReader->bindColumn('theCount',$numProfiles[0]);
            $numProfiles = $theResult['theCount'];
            
            $sql = "DELETE FROM tbl_basic_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_academic_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_activity_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_ap_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_award_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_competition_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_consult where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_essay_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_exclusive where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_forms_status where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
                    
            $sql = "DELETE FROM tbl_highschool_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_language_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_map_profile_student where user_id >= 10000000 or purchased_profile_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_music_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_other_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_other_school_admit_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_personal_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_rating where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_refer_friends where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_research_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_sat2_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_score_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_sport_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_subject_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_summer_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_user where id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_user_credit where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_verify_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_volunteer_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_work_profile where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_refer_friends where user_id >= 10000000 or friend_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_curr_royalty where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_curr_view where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_hist_payment where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_hist_royalty where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_hist_view where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_owed_payment where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_payment_info where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            $sql = "DELETE FROM tbl_seller_submitted_payment where user_id >= 10000000";
            $command = $connection->createCommand($sql);
            $command->query();
            
            Yii::app()->user->setFlash('generateSuccess',"$numProfiles deleted!" );
            $this->redirect(array('user/miscStuff'));   
	}
        
        public function actionGenerateRandom()
        {
            $model=new GenerateForm;
            $model->generateAll(10);
            Yii::app()->user->setFlash('generateSuccess',"10 profiles added!" );
            $this->redirect(array('user/miscStuff'));  
	}

        public function actionCalcSAT()
        {
                        
            $scoreProfiles = ScoreProfile::model()->findAll();
            foreach($scoreProfiles as $scoreProfile) {
                $scoreProfile->updateSATRange();
            }            

            Yii::app()->user->setFlash('generateSuccess',"SAT total recalculated!" );
            $this->redirect(array('user/miscStuff'));  
	}
        
	public function actionMiscStuff()
	{
            
	// display the login form
		$this->render('generate');
	}
        
        
        public function actionAccount()
	{
            $myTransType = Yii::app()->user->getState('TransType');

            if ($myTransType === 'B'){
                 $this->redirect(array('user/BuyerAccountSum'));                                                            
            }
            else if ($myTransType === 'S'){
                $this->redirect(array('user/indexSeller'));      
            }
            else{
                $this->redirect(array('user/admin'));
            }
	}
	public function actionView()
	{
                $myID = Yii::app()->user->id;
		$this->render('view',array(
			'model'=>$this->loadModel($myID),
		));
	}

	public function actionCredits()
	{
        // This is seller Activity
        UserIdentity::iscorrectTranstype("B");

            $msg='';
            if(@$_GET['msg']==1)
            {
             $msg = "You have successfully purchased ".$_GET['cvalue']." Credits <br/>";
            }
                $myID = Yii::app()->user->id;
                $dataProvider = CreditsPackage::model()->findAll();
                $bcModel=new BuyCreditsForm();
                $model = $this->loadModel($myID);
                $creditModel = $this->loadCreditModel($myID);
		// collect user input data
		if(isset($_POST['BuyCreditsForm']))
		{
			$bcModel->attributes=$_POST['BuyCreditsForm'];
			// validate user input and redirect to the previous page if valid
			if($bcModel->validate()){
                            $creditModel->buy_credits = $creditModel->buy_credits + $bcModel->buyAmount;
                            $creditModel->save(true);
                            unset($bcModel);
                            unset($model);
                            unset($creditModel);
                            // We may want to rewrite this so that it redirects in such a way that the model does not have to be reloaded
                            Yii::app()->user->setFlash('buySuccess',"Credits added!" );
                            //                             $this->redirect(array('BuyerAccountSum',)); 
                            $this->redirect(array('Credits',));  
                        }
		}


		$this->render('_buyer_credits',array(
                        'bcModel'=>$bcModel,
			'model'=>$model,
                        'dataProvider'=>$dataProvider,
                        'creditModel'=>$creditModel,
                        'msg'=>$msg,
		));
	}        

	public function actionIndexSeller()
	{
       // This is seller Activity
        UserIdentity::iscorrectTranstype("S");

		$myID = Yii::app()->user->id;
		$basicProfile=BasicProfile::model()->findByPk($myID);



		if($basicProfile===null){
			$basicProfile = new BasicProfile;
			$basicProfile->initialize($myID);
		}
		
		$model = $this->loadModel($myID);
		$creditModel = $this->loadCreditModel($myID);
                
	 		if(isset($_POST['BasicProfile']))
			{
				$basicProfile->attributes=$_POST['BasicProfile'];
				// validate user input and redirect to the previous page if valid
				if($basicProfile->validate()){
	                            $basicProfile->save(true);
	                            unset($basicProfile);
	                            unset($model);
	                            unset($creditModel);
	                            // We may want to rewrite this so that it redirects in such a way that the model does not have to be reloaded
	                            Yii::app()->user->setFlash('sellSuccess',"Info updated!" );
	                            //                             $this->redirect(array('indexSeller',)); 
	                            $this->redirect(array('indexSeller',));  
	                        }
			}
                
                            
			
			$exclusive = Exclusive::model()->find('user_id=:user_id',array(':user_id'=>$myID));			
			
			if($exclusive == null){
	            $exclusive = new Exclusive;
			}
			
			
            if(isset($_POST['Exclusive'])){
            	 
                $exclusive_params = Yii::app()->request->getParam('Exclusive');
                $exclusive->exclusiveValue =  isset($exclusive_params['exclusiveValue']) ? $exclusive_params['exclusiveValue'] : 0;
                $exclusive->user_id = $myID ;                			
                $exclusive->created = date('Y-m-d H:i:s');
     
                // Check whether Check box is checked or Not			
                if ($exclusive->validate()){
                    $exclusive->save(true);

                    //Set this Form Completed
                    //$this->redirect(array('IndexSeller'));
                    echo json_encode(array('error'=> 0));
                    exit();  
                }
                else {
                	 echo json_encode(array('error'=> 1));
                    exit(); 
                }
            }
    
                
		$this->render('sellerAdmin',array(
			'model'=>$model,
                        'creditModel'=>$creditModel,
                        'basicProfile'=>$basicProfile, 
                        'exclusive'=>$exclusive,
		));
	}   
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout='column2';

                $model=new User;
                $successRegistration = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $model->setScenario('register');
		if(isset($_POST['User']))
		{
                        // Set the User model class attributes in a bulk manner
                        // For every key in the $_POST['User'] array that matches the
                        //   name of a safe attribute in the User class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$model->attributes=$_POST['User'];

			if($model->validate()){
			
                            // activate the user  , this is applied for S user only ,
                            $model->active = 1;
							
                            $model->save(false);
                            User::updateRoyalty($model->id);
                            $model->setScenario('');
                            $creditModel = new UserCredit();
                            $creditModel->buy_credits = 0;
                            $creditModel->sell_credits = 0;
                            $creditModel->user_id = $model->id;                            
                            $creditModel->save(true);
                            $this->createSellerEarningsSummary($model->id,true);
                            
                            $mapProfileStudent = new MapProfileStudent();
                            
                            $mapProfileStudent->user_id = $model->id;
                            $mapProfileStudent->purchased_profile_id = $model->id;
                            $mapProfileStudent->l1_purchased = 0;
                            $mapProfileStudent->l2_purchased = 0;
                            $mapProfileStudent->l3_purchased = 0;
                            $mapProfileStudent->isOwner = 1;
                            $mapProfileStudent->save(true);
                            $successRegistration = true; 
                             //Yii::app()->controller->redirect(array('/site/createConfirm'));
                        }
                        else{
                            $model->password_unhash = "";
                            $model->password_unhash_repeat = "";
                        }

		}

	 	$mod = new AutoLoginForm;  	
		$this->render('create',array(
                        'mod'=>$mod,
			'model'=>$model,                        
                        'successRegistration'=>$successRegistration,                        
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
//	public function actionUpdate($id)
//	{
//		$model=$this->loadModel($id);
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['User']))
//		{
//			$model->attributes=$_POST['User'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('update',array(
//			'model'=>$model,
//		));
//	}
        
	public function actionCreateStudent()
	{		
                $this->layout='column2';
		// Check If the user is from refer - friend link 
		if(isset($_GET['key']) && isset($_GET['id'])){		
		 // set the key and ID in Cookie
		 Yii::app()->request->cookies['referFriendKey'] = new CHttpCookie('referFriendKey',$_GET['key']);
		 Yii::app()->request->cookies['referFriendId'] = new CHttpCookie('referFriendId',base64_decode(urldecode($_GET['id'])));		 
		}

		$model=new User;
                $successRegistration = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $model->setScenario('register');
		if(isset($_POST['User']))
		{
                        // Set the User model class attributes in a bulk manner
                        // For every key in the $_POST['User'] array that matches the
                        //   name of a safe attribute in the User class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$model->attributes=$_POST['User'];
			  
			
			if($model->validate()){
			
                            // send activation mail
                            $mail = new Sendmail;
                            // Generate Link
                            // Get the Base URL	

                            $link = Yii::app()->request->getHostInfo().Yii::app()->request->baseUrl;
                            // Generate a key Or HashKey by timestamp & store in DB
                            $key =  time();
                            $model->activationkey = $key;							
                            $model->save(false);


                            //$model->save();
                            //Encode the id
                            $id  = base64_encode($model->id);
                            // Generate the link
                            $link .= '/index.php?r=site/activate&key='.$key.'&id='.$id;

                            // Get the  Activation Mail template
                            $body = file_get_contents(Yii::app()->params['emailTemplate'].'UserActivation.php');
                            #add the activation Link to the body
                            $body .= $link;

                            // send the mail
                            $mail->send($model->email,'CrowdPrep - Registration Activation',$body);
                            // Check if this User is From refer friend Link
                            $referFriend = new ReferFriend;														
                            // Check the (email user given ) / cookie KEY / cookie ID
                            if(isset(Yii::app()->request->cookies['referFriendKey']) && (isset(Yii::app()->request->cookies['referFriendId']))){
                                    $referFriendArr = 
                                        $referFriend->find('keyValue=:keyValue and user_id=:userId and 
                                            date(date_referred) >= subdate(curdate() ,interval 14 day)',   // This condition For the Valid link for 2 weeks
                                            array(':keyValue'=>Yii::app()->request->cookies['referFriendKey']->value,
                                            ':userId'=>Yii::app()->request->cookies['referFriendId']->value
                                    ));
                            }							 	
                            // Check if referred 
                            $isReferred = !empty($referFriendArr) ? true : false;	
                            if($isReferred){									

                                $referFriendArr->keyValue = '';								
                                $referFriendArr->active = 1;
                                $referFriendArr->friend_id = $model->id;							
                                $referFriendArr->save(false);

                                /* Update the royalty of the referring friend */
                                User::updateRoyalty($referFriendArr->user_id);
                                
                                unset(Yii::app()->request->cookies['referFriendKey']);
                                unset(Yii::app()->request->cookies['referFriendId']);								
                            }

							
                      		
                            $model->setScenario('');
                            $creditModel = new UserCredit();
                            $creditModel->buy_credits = 0;
                            $creditModel->sell_credits = 0;
                            $creditModel->user_id = $model->id;
                            $creditModel->save(true);
                            
                            
                            $mapProfileStudent = new MapProfileStudent();
                            
                            $mapProfileStudent->user_id = $model->id;
                            $mapProfileStudent->purchased_profile_id = $model->id;
                            $mapProfileStudent->l1_purchased = 0;
                            $mapProfileStudent->l2_purchased = 0;
                            $mapProfileStudent->l3_purchased = 0;
                            $mapProfileStudent->isOwner = 1;
                            $mapProfileStudent->save(true);
                            
                            $successRegistration = true;
                            //$this->redirect(Yii::app()->homeUrl);
							//$this->render('createStudent',array('model'=>$model,'successRegistration'=>true));
                        }
                        else{
                            $model->password_unhash = "";
                            $model->password_unhash_repeat = "";
                        }
						

		}


		// display success pop - up 
		
		$this->render('createStudent',array(
			'model'=>$model,
			'successRegistration'=>$successRegistration
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
//	public function actionUpdate($id)
//	{
//		$model=$this->loadModel($id);
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['User']))
//		{
//			$model->attributes=$_POST['User'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('update',array(
//			'model'=>$model,
//		));
//	}
        
        
	public function actionAdmin()
	{
                $myID = Yii::app()->user->id;
		$model=$this->loadModel($myID);
                $model->password_unhash = "";
                $model->password_unhash_repeat = "";
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
                        $test = $model->password_unhash;
                        if (($model->password_unhash=="") or ($model->password_unhash == NULL)){
                            $model->isNewPassword = false;
                            $model->setScenario('origPassword');
                            if($model->validate()){
                                    Yii::app()->user->setState('TransType',$model->transType);
                                    Yii::app()->user->setState('SchoolType',$model->schoolType);
                                    Yii::app()->user->setState('FirstName',$model->FirstName);
                                   $model->save(false);
                                    Yii::app()->user->setFlash('userAdminSuccess',"Info saved!" );
                                    $model->setScenario('');
                                    $this->redirect(array('admin'));

                            }                      
                        }
                        else{
                            $model->isNewPassword = true;
                            $model->setScenario('newPassword');
                            if($model->validate()){
                         
                                $model->save(false);
                                    Yii::app()->user->setState('TransType',$model->transType);
                                    Yii::app()->user->setState('SchoolType',$model->schoolType);
                                    Yii::app()->user->setState('FirstName',$model->FirstName);
                                    Yii::app()->user->setFlash('userAdminSuccess',"Info saved!" );
                                    $model->setScenario('');
                                    $this->redirect(array('admin'));

                            }
                            else{
                                $model->password_unhash = "";
                                $model->password_unhash_repeat = "";
                            }
                        }
                        $model->setScenario('');
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
//	public function actionDelete($id)
//	{
//		if(Yii::app()->request->isPostRequest)
//		{
//			// we only allow deletion via POST request
//			$this->loadModel($id)->delete();
//
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
//		}
//		else
//			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
//		$dataProvider=new CActiveDataProvider('User');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
            
                $this->render('//site/index');
	}

	/**
	 * Manages all models.
	 */
//	public function actionAdmin()
//	{
//		$model=new User('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['User']))
//			$model->attributes=$_GET['User'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
//	}
        
	/**
	 * Manages all models.
	 */
	public function actionBrowse()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('browse',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	protected function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
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
        
        protected function loadSellerEarningsSummary($id)
	{
            $model=SellerEarningsSummary::model()->findByPk($id);
            if($model===null){
                $model = $this->createSellerEarningsSummary($id,false);
            }	
            $model->computeSummary();
            $model->save();
            return $model;
	}

        protected function createSellerEarningsSummary($id,$doSave)
	{
            $model = new SellerEarningsSummary();
            $model->user_id = $id;
                          
            if ($doSave) $model->save(true);
            return $model;
        }
        
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        

	
       public function actionBuyerAccountSum()
        {

            // This is seller Activity
            UserIdentity::iscorrectTranstype("B");

            $myID = Yii::app()->user->id;
            $model=User::model()->findByPk($myID);            

  
 		if(isset($_POST['User']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$model->attributes=$_POST['User'];

                        $valid = $model->validate();                  
                        if ($valid)
                        {
                            $model->save(true);
                            unset($model);
                            $model = new User;
                            Yii::app()->user->setFlash('modelSuccess',"Info saved!" );
                             $this->redirect(array('BuyerAccountSum',));   
                        }

		}                 
            $this->render('_buyer_account_summary', array('model'=>$model));
            
            
        }
        
        public function actionResetpassword()
        {
            $myID = Yii::app()->user->id;
            $model=User::model()->findByPk($myID);
            $this->render('_user_resetpassword', array('model'=>$model));
            
        }
        
        
        
        public function actionValidate()
        {

            // This is seller Activity
            UserIdentity::iscorrectTranstype("S");
	   		
            $myID = Yii::app()->user->id;
            $whr = 'user_id='.$myID;
            $verifyProfile= VerifyProfile::model()->find($whr);
            $ProfileRefFile = ProfileRefFiles::model()->findAll($whr);
            $count = ProfileRefFiles::model()->count($whr);
           
          //      echo $verifyProfile->id;exit;
            if($verifyProfile===null){    
                $verifyProfile=new VerifyProfile;
            }
            if(isset($_POST['VerifyProfile'])|| sizeof($_FILES) ){
                
			
                $verifyProfile->attributes=$_POST['VerifyProfile'];

                $valid = $verifyProfile->validate()/* && $valid*/;
                if ($valid){                       
                    $verifyProfile->save(true);
                   // Set this Form Completed                     
                   // $this->redirect(array('validate',));   
                }
                //File upload
                   $ucnt=0;
                  // print_r($_FILES);exit;
                if (@$verifyProfile->id && sizeof($_FILES)) {
                    foreach ($_FILES['files']['name'] as $key => $filename) 
                     {
                     $tmp_name = $_FILES['files']['tmp_name'][$key];
                     $new_url = Yii::app()->params['pv_file_path'].$filename;
                        if(move_uploaded_file($tmp_name, $new_url)){
                            $ProfileRefFile = new ProfileRefFiles();
                            $ProfileRefFile->user_id=$myID;
                           // $pfId = $verifyProfile->id;
                            $ProfileRefFile->v_profile_id=$verifyProfile->id;
                            $ProfileRefFile->filename=$filename;
                            $ProfileRefFile->save();
                           
                            
                        }
                        
                }
               }//End File upload
                 $this->redirect(array('Validate',));
           

                    
            }      
            $this->render('_seller_validate',array('verifyProfile'=>$verifyProfile,'ProfileRefFile'=>$ProfileRefFile,'count'=>$count));	
        }
            
        
        //seller account page to show their earnings
        public function actionEarnings()
        {
            // This is seller Activity
            UserIdentity::iscorrectTranstype("S");

            $myID = Yii::app()->user->id;
            $creditModel = $this->loadCreditModel($myID);
            $model=User::model()->findByPk($myID);
            $sellerEarningsSummary = $this->loadSellerEarningsSummary($myID);
            
            if(isset($_POST['ajax']) && $_POST['ajax']==='paypal-change'){
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            if(isset($_POST['User'])){
            // Set the Profile model class attributes in a bulk manner
            // For every key in the $_POST['Profile'] array that matches the
            //   name of a safe attribute in the Profile class, the class's
            //   attribute is set to the corresponding value in the array.
            // By default, all underlying database columns except the Primary Key
            //   are considered safe.
                $model->attributes=$_POST['User'];

                $valid = $model->validate();                  
                if ($valid){
                    $model->save(true);
                    unset($model);
                    $model = new User;
                    //  Yii::app()->user->setFlash('modelSuccess',"Info saved!" );
                    $this->redirect(array('Earnings',));   
                }

            } 
            $state = CommonMethods::getStates();
            $country = CommonMethods::getCountry();

            $this->render('_earnings', array('creditModel'=>$creditModel,
                                             'SellerEarningsSummary'=>$sellerEarningsSummary,
                                             'model'=>$model,
                                             'state'=>$state,
                                             'country'=>$country, ));
            
        }
        
        
        //for inputting paypal information for receiving $
        
           public function actionPaypalChange()
        {
            $myID = Yii::app()->user->id;          
            $model=User::model()->findByPk($myID);
       
            		if(isset($_POST['ajax']) && $_POST['ajax']==='paypal-change')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
            
             		if(isset($_POST['User']))
		{
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$model->attributes=$_POST['User'];

                        $valid = $model->validate();                  
                        if ($valid)
                        {
                            $model->save(true);
                            unset($model);
                            $model = new User;
                          //  Yii::app()->user->setFlash('modelSuccess',"Info saved!" );
                             $this->redirect(array('Earnings',));   
                        }

		} 
            
                 $this->render('paypalpopup', array('model'=>$model));
            
        } 
        //for deleting seller paypal info on how to get paid
           public function actionPaypaldelete()
                {
                    $id = Yii::app()->user->id; 
                    $user=User::model()->findByPk($id);
                    $user->email_paypal = NULL;
                    $user->save();
                     $this->redirect(array('user/Earnings',));   

                }        
                
            public function actionAddressChange()
                {
                    $myID = Yii::app()->user->id;          
                    $model=User::model()->findByPk($myID);

                                if(isset($_POST['ajax']) && $_POST['ajax']==='paypal-change')
                        {
                                echo CActiveForm::validate($model);
                                Yii::app()->end();
                        }

                                if(isset($_POST['User']))
                        {
                                // Set the Profile model class attributes in a bulk manner
                                // For every key in the $_POST['Profile'] array that matches the
                                //   name of a safe attribute in the Profile class, the class's
                                //   attribute is set to the corresponding value in the array.
                                // By default, all underlying database columns except the Primary Key
                                //   are considered safe.
                                $model->attributes=$_POST['User'];

                                $valid = $model->validate();                  
                                if ($valid)
                                {
                                    $model->save(true);
                                    unset($model);
                                    $model = new User;
                                  //  Yii::app()->user->setFlash('modelSuccess',"Info saved!" );
                                     $this->redirect(array('Earnings',));   
                                }

                        } 

                         $this->render('addresspopup', array('model'=>$model));

                } 

                //deleting submitted address if seller wants to receive check for earnings
           public function actionAddressdelete()
                {
                    $id = Yii::app()->user->id; 
                    $user=User::model()->findByPk($id);
                    $user->mail_street1 = NULL;
                    $user->mail_street2 = NULL;
                    $user->mail_city = NULL;
                    $user->mail_zip = NULL;
                    $user->mail_state = NULL;
                    $user->mail_country = NULL;
                    
                    $user->save();
                     $this->redirect(array('user/Earnings',));   

                }  

        
	// This function is if a seller registers but needs the registration Link resent
                
	public function actionRegistrationlink()
        {				
            $model=new User;				
            $model->setScenario('registrationlink');
            if(isset($_POST['User'])){
                $model->attributes=$_POST['User'];								
                $user = User::model()->find('email=:email', array(':email'=>$model->email));		
                if(empty($user)){				
                    Yii::app()->user->setFlash('registrationlinkError','Email does not exist');				
                }
                else{
                    // Check this Email is active .already
                    if($user->active){
                        Yii::app()->user->setFlash('registrationlinkError','Email is active');					
                    }
                    elseif(!$user->active){
                        // Generates Link
                        $key =  time();
                        $id  = base64_encode($user->id);

                        $user->activationkey = $key;							
                        $user->create_time    = date('Y-m-d',time());
                        $user->save(false);					
                        // Generate the link
                        $link  = Yii::app()->request->getHostInfo();					
                        $link  .= $this->createUrl('site/activate',array('key'=>$key,'id'=>$id));
                        // Get the  Activation Mail template
                        $body = file_get_contents(Yii::app()->params['emailTemplate'].'UserActivation.php');
                        #add the activation Link to the body
                        $body .= $link;					
                        // send the mail					
                        $mail = new Sendmail;
                        $mail->send($model->email,'CrowdPrep Account Activation',$body);
                         $this->redirect(array('user/Successlink&mailid='.$model->email,));  
                       // $this->redirect(array('user/reg_success','model'=>$model));
                    }				
                }	
			
            }	
            $this->render('registrationlink',array('model'=>$model));
	}
        
        public function actionReadUniversity()
        {
            set_time_limit(10000); 
            $row = 1;
            if (($handle = fopen("University2.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                
                    $myProfile = new UniversityName;
                    $myProfile->id = $data[0];
                    $tempString = $data[1];
                    $myProfile->name = $tempString;
                    $myProfile->save(false);         
                    $row++;
                    if ($row%500 ==0) sleep(10);
                }
                fclose($handle);
            }
 
        }
        
        public function actionReadHS()
        {
            set_time_limit(100000); 
            $row = 1;
            if (($handle = fopen("HighSchool3.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $myProfile = new HighSchoolName;
                    $myProfile->id = $data[0];
                    $tempString = $data[1];

                    $myProfile->name = $tempString;
                    $myProfile->city = $data[2];
                    $myProfile->state = $data[3];
                    $myProfile->zip_code = $data[4];
                    $myProfile->student_count = $data[5];
                    $myProfile->type = $data[6];
                    $myProfile->save(false);         
                    $row++;
                    if ($row%500 ==0) sleep(10);
                
                }
                fclose($handle);
            }
 
        }
        
        public function actionUpdateAvgRatings()
        {
            $basicProfileArray=BasicProfile::model()->findAllBySql('SELECT * FROM tbl_basic_profile WHERE USER_ID > -1');
            
            foreach ($basicProfileArray as $basicProfile):    
                $basicProfile->avg_profile_rating = $basicProfile->averageRating;
                $basicProfile->save(false);
            endforeach;            
        }
        public function actionFillTotal()
        {
            
            $basicProfileArray=BasicProfile::model()->findAllBySql('SELECT * FROM tbl_basic_profile WHERE USER_ID > -1');
            
            foreach ($basicProfileArray as $basicProfile):    
                $profileID = $basicProfile->user_id;
                $subjectProfileArray=SubjectProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_subjects = count($subjectProfileArray);
                
                $competitionProfileArray=CompetitionProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_competitions = count($competitionProfileArray);
                
                $awardProfileArray=AwardProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_awards = count($awardProfileArray);
                
                $activityProfileArray=ActivityProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_activities = count($activityProfileArray);
                
                $sportProfileArray=SportProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_sports = count($sportProfileArray);
                
                $musicProfileArray=MusicProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_music = count($musicProfileArray);
                
                $volunteerProfileArray=VolunteerProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_volunteer = count($volunteerProfileArray);
                
                $workProfileArray=WorkProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_work = count($workProfileArray);
                
                $researchProfileArray=ResearchProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_research = count($researchProfileArray);
                
                $summerProfileArray=SummerProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_summer = count($summerProfileArray);
                
                $otherProfileArray=OtherProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_other = count($otherProfileArray);
                
                $essayProfileArray=EssayProfile::model()->findAllByAttributes(array('user_id'=>$profileID));
                $num_essays = count($essayProfileArray);

                $num_extracurriculars = $num_activities + $num_sports + $num_music + $num_volunteer
                    + $num_work + $num_research + $num_summer + $num_other;
                $num_academics = $num_subjects + $num_competitions + $num_awards;
                
                $basicProfile->num_subjects = $num_subjects;
                $basicProfile->num_competitions = $num_competitions;
                $basicProfile->num_awards = $num_awards;
                $basicProfile->num_activities = $num_activities;
                $basicProfile->num_sports = $num_sports;
                $basicProfile->num_music = $num_music;
                $basicProfile->num_volunteer = $num_volunteer;
                $basicProfile->num_work = $num_work;
                $basicProfile->num_research = $num_research;
                $basicProfile->num_summer = $num_summer;
                $basicProfile->num_other = $num_other;
                $basicProfile->num_essays = $num_essays;
                $basicProfile->num_extracurriculars = $num_extracurriculars;
                $basicProfile->num_academics = $num_academics;
                $basicProfile->save(false);
            endforeach;
//                    echo count($basicProfileArray);

                   
 
        }
    public function actionPurchasedDetails()
    {
        // This is seller Activity
        UserIdentity::iscorrectTranstype("B");

        $myID = Yii::app()->user->id;
        
        $dataProvider=new CActiveDataProvider('OrderPayment',
                                           array('criteria'=>array('condition'=>'user_id='.$myID)));
        $creditModel = $this->loadCreditModel($myID);
        
        $this->render('purchaseddetails',array('dataProvider'=>$dataProvider,'creditModel'=>$creditModel));
        

    }
       public function actionSuccesspage()
    {
            $msg='';
            $qty = 1;
            if(@$_GET['data']['msg']==1)
            {
             $msg = "You have successfully purchased ".$_GET['data']['cvalue']." Credits <br/>";
             $qty=$_GET['data']['qty'];
             $credits= $_GET['data']['cvalue'];
            }
           // echo $msg;exit();
            $data = array('msg'=>$msg,'qty'=>$qty,'credits'=>$credits);
            $this->render('success',$data);
    }
	 public function actionViewinvoice($id)
    {
         $model=  OrderPayment::model()->findByPk($id);
         $data= array('model'=>$model);
         $this->render('invoice',$data);
    }
    
    	 public function actionLearnmore()
    {
                  
         $this->render('_learnconsult');
    }
    
    	 public function actionProfile()
    {

        // This is seller Activity
        UserIdentity::iscorrectTranstype("S");

          $myID = Yii::app()->user->id;        
          $user=User::model()->findByPk($myID);
          $basicProfile=BasicProfile::model()->findByPk($myID);
          $personalProfile=PersonalProfile::model()->findByPk($myID);
            $otherSchoolAdmitProfileArray=OtherSchoolAdmitProfile::model()->findAllByAttributes(array('user_id'=>$myID));
            $languageProfileArray=LanguageProfile::model()->findAllByAttributes(array('user_id'=>$myID),array('order'=>'language_id'));// $languageProfileArray=LanguageProfile::getLangIdById();//LanguageProfile::model()->findAllByAttributes(array('user_id'=>$myID));
          $scoreProfile=ScoreProfile::model()->findByPk($myID);
          $sat2ProfileArray=Sat2Profile::model()->findAllByAttributes(array('user_id'=>$myID));
          $apProfileArray=ApProfile::model()->findAllByAttributes(array('user_id'=>$myID));      
          $academicProfile=AcademicProfile::model()->findByPk($myID);
          $subjectProfileArray=SubjectProfile::model()->findAllByAttributes(array('user_id'=>$myID));
          $competitionProfileArray=CompetitionProfile::model()->findAllByAttributes(array('user_id'=>$myID));
          $awardProfileArray=AwardProfile::model()->findAllByAttributes(array('user_id'=>$myID));
          ($basicProfile->num_activities > 0) ? 
                            $activityProfileArray=ActivityProfile::model()->findAllByAttributes(array('user_id'=>$myID))
                            : $activityProfileArray = null;
                ($basicProfile->num_sports > 0) ? 
                            $sportProfileArray=SportProfile::model()->findAllByAttributes(array('user_id'=>$myID))
                            : $sportProfileArray = null;
                ($basicProfile->num_music > 0) ? 
                            $musicProfileArray=MusicProfile::model()->findAllByAttributes(array('user_id'=>$myID))
                            : $musicProfileArray = null;
                ($basicProfile->num_volunteer > 0) ? 
                            $volunteerProfileArray=VolunteerProfile::model()->findAllByAttributes(array('user_id'=>$myID))
                            : $volunteerProfileArray = null;
                ($basicProfile->num_work > 0) ? 
                            $workProfileArray=WorkProfile::model()->findAllByAttributes(array('user_id'=>$myID))
                            : $workProfileArray = null;
                ($basicProfile->num_research > 0) ? 
                            $researchProfileArray=ResearchProfile::model()->findAllByAttributes(array('user_id'=>$myID))
                            : $researchProfileArray = null;
                ($basicProfile->num_summer > 0) ? 
                            $summerProfileArray=SummerProfile::model()->findAllByAttributes(array('user_id'=>$myID))
                            : $summerProfileArray = null;
                ($basicProfile->num_other > 0) ? 
                            $otherProfileArray=OtherProfile::model()->findAllByAttributes(array('user_id'=>$myID))
                            : $otherProfileArray = null;
                ($basicProfile->num_essays > 0) ? 
                            $essayProfileArray=EssayProfile::model()->findAllByAttributes(array('user_id'=>$myID))
                            : $essayProfileArray = null;                
                
          $numberFormatter = new CNumberFormatter(Yii::app()->locale);
    
         $this->render('_seller_profile',
                             array(
                'basicProfile' => $basicProfile,
                'personalProfile' => $personalProfile,
                'otherSchoolAdmitProfileArray' => $otherSchoolAdmitProfileArray,
                'languageProfileArray' => $languageProfileArray, 
                'scoreProfile' => $scoreProfile,
                'sat2ProfileArray' => $sat2ProfileArray,
                'apProfileArray' => $apProfileArray,                                 
                'academicProfile' => $academicProfile,
                'subjectProfileArray' => $subjectProfileArray,
                'competitionProfileArray' => $competitionProfileArray,
                'awardProfileArray' => $awardProfileArray,
                'numberFormatter'=> $numberFormatter,                                 
                'activityProfileArray' => $activityProfileArray,
                'sportProfileArray' => $sportProfileArray,
                'musicProfileArray' => $musicProfileArray,
                'volunteerProfileArray' => $volunteerProfileArray,
                'workProfileArray' => $workProfileArray,
                'researchProfileArray' => $researchProfileArray,
                'summerProfileArray' => $summerProfileArray,
                'otherProfileArray' => $otherProfileArray, 
                'essayProfileArray' => $essayProfileArray, 
                                 
                 ));
    }

        public function actionSettings()
        {
           $myTransType = Yii::app()->user->getState('TransType');

            if ($myTransType === 'B'){
                
                     $myID = Yii::app()->user->id;
			
		$userPreferences = UserPreferences::model()->find('user_id=:user_id',array(':user_id'=>$myID));			
			
			if($userPreferences == null){
	            $userPreferences = new UserPreferences;
			}
		
		if(isset($_POST['UserPreferences'])){
			$userPreferences->attributes	=	$_POST['UserPreferences'];
			$userPreferences->user_id = $myID ;			
			
			$userPreferences->notify_general = $_POST['UserPreferences']['notify_general'];
                        $userPreferences->notify_ad = $_POST['UserPreferences']['notify_ad'];
                        $userPreferences->notify_profiles = $_POST['UserPreferences']['notify_profiles'];
			// Check whether Check box is checked or Not			
			$valid = $userPreferences->validate();	
			if ($valid){
				$userPreferences->save(true);
				// Set this Form Completed 
				
				$this->redirect(array('_buyer_settings'));  
			}
		}
		$this->render('_buyer_settings',array('userPreferences'=>$userPreferences));   
 
               
            }
           
            else if ($myTransType === 'S'){ 
                
                $myID = Yii::app()->user->id;
			
		$userPreferences = UserPreferences::model()->find('user_id=:user_id',array(':user_id'=>$myID));			
			
			if($userPreferences == null){
	            $userPreferences = new UserPreferences;
			}
		
		if(isset($_POST['UserPreferences'])){
			$userPreferences->attributes	=	$_POST['UserPreferences'];
			$userPreferences->user_id = $myID ;			
		//		print $_POST['UserPreferences']['notify_ad'];
               //                   print $_POST['UserPreferences']['notify_general'];
                 //                  print $_POST['UserPreferences']['notify_profiles'];exit;                
			$userPreferences->notify_general = $_POST['UserPreferences']['notify_general'];
                       $userPreferences->notify_ad = $_POST['UserPreferences']['notify_ad'];
                        $userPreferences->notify_profiles = $_POST['UserPreferences']['notify_profiles'];
			// Check whether Check box is checked or Not			
			$valid = $userPreferences->validate();	
			if ($valid){
				$userPreferences->save(true);
				// Set this Form Completed 
				
				$this->redirect(array('Settings'));  
			}
                        else print "Not Valid";
		}
		$this->render('_seller_settings',array('userPreferences'=>$userPreferences));
                   
                                   
               }
        }        
    
       public function actionConsult(){

           // This is seller Activity
           UserIdentity::iscorrectTranstype("S");

            $myID = Yii::app()->user->id;
			
            $consult = Consult::model()->find('user_id=:user_id',array(':user_id'=>$myID));			
            $basic = BasicProfile::model()->find('user_id=:user_id',array(':user_id'=>$myID));			

            if($consult == null){
            $consult = new Consult;
			}
		
		if(isset($_POST['Consult'])){
                     if(!empty($_POST['Consult']['contact'])){
			$consult->attributes	=	$_POST['Consult'];
			$consult->user_id = $myID ;			
			//print $_POST['Consult']['consultValue'];exit;
			$consult->consultValue = $_POST['Consult']['consultValue'];
			// Check whether Check box is checked or Not			
			$valid = $consult->validate();	
			if ($valid){
				$consult->save(true);
                                $basic->l4ForSale = 1;
                                $basic->save(true);
				// Set this Form Completed 
				
				$this->redirect(array('consult'));  
			}
                    }
                    Yii::app()->user->setFlash('error', "Please Enter Phone Number");
                    $this->redirect(array('consult'));  
                }
		$this->render('_seller_consult',array('consult'=>$consult));
    }
    
        public function actiondeleteConsult()
                {
                    $myID = Yii::app()->user->id;
                    $basic = BasicProfile::model()->find('user_id=:user_id',array(':user_id'=>$myID));	                    
                    $consult= new Consult;
                    $consult->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                    $consult->save();
                    $basic->l4ForSale = 0;
                    $basic->save(true);
                     $this->redirect(array('user/Consult',));   

                }    
    
         public function actionExclusivity()
        {		
		
            $myID = Yii::app()->user->id;
			
	$exclusive = Exclusive::model()->find('user_id=:user_id',array(':user_id'=>$myID));			
			
			if($exclusive == null){
	            $exclusive = new Exclusive;
			}
			
			
            if(isset($_POST['Exclusive'])){
                $exclusive->attributes = $_POST['Exclusive'];
                $exclusive->user_id = $myID ;			
                //print $_POST['Exclusive']['exclusiveValue'];exit;
                $exclusive->exclusiveValue = $_POST['Exclusive']['exclusiveValue'];
                // Check whether Check box is checked or Not			
                $valid = $exclusive->validate();	
                if ($valid){
                    $exclusive->save(true);

                    // Set this Form Completed 
                    $this->formStatus('exclusivity');
                    $this->redirect(array('exclusivity'));  
                }
            }
            $this->render('exclusive',array('exclusive'=>$exclusive));
        } 

         public function actionSuccesslink()
        {
            $mailId=$_GET['mailid'];
            $this->render('reg_success',array('mailId'=>$mailId));
        }
        
        public function actionDeletefile($id)
        {
            
             $ProfileRefFile = ProfileRefFiles::model()->findByPk($id);
             $ProfileRefFile->filename;
             $myFile= $path=Yii::app()->params['pv_file_path'].$ProfileRefFile->filename;
            //echo $myFile;exit;
            if(is_file($myFile))
             unlink($myFile);
             $ProfileRefFile->delete();
             
             $this->redirect(array('Validate',));
        }       
        public function actionHelp()
        {
            $this->render('help');
        }     
        
}

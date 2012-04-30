<?php

class SiteController extends Controller
{
    /**
     * @return array action filters
     */

    public function filters()
    {
        return array(
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
	 * Declares class-based actions.
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

        public function actionLearnmore()
        {
            $this->render('learnmore');
        }
        
        public function actionCreateConfirm()
        {
            $this->layout = 'column2';
            $this->render('createConfirm');
        }
        
        public function actionCreateStudentConfirm()
        {
            $this->layout = 'column2';
            $this->render('createStudentConfirm');
        }
        
        
        
        
        public function actionIndexFinder()
        {
            $myUser = Yii::app()->user;
            if (empty($myUser)||($myUser->getIsGuest())){
                $this->redirect(Yii::app()->homeUrl);
            }
            else{
                $myTransType = $myUser->getState('TransType');

                if ($myTransType === 'B'){
                     $this->redirect(array('search/index'));                                                            
                }
                else if ($myTransType === 'S'){
                    $this->redirect(array('user/indexSeller'));      
                }
                else{
                $this->redirect(Yii::app()->homeUrl);
                }
            }
        }
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
          //     Yii::app()->user->returnUrl = array('/site/index');
        // renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
                
                            $myUser = Yii::app()->user;
            if (empty($myUser)||($myUser->getIsGuest())){
                $this->render('index');
            }
            else{
                $myTransType = $myUser->getState('TransType');

                if ($myTransType === 'B'){
                     $this->redirect(array('search/index'));                                                            
                }
                else if ($myTransType === 'S'){
                    $this->redirect(array('user/indexSeller'));      
                }
                else{
               $this->render('index');
                }
            }

	}
	public function actionSignup()
	{
                $this->layout = 'column1';        
		$this->render('signup');

	}
        
        
        /*
         public function actionTest()
     {
        echo Yii::app()->user->getID();
        echo Yii::app()->user->getReturnUrl();
        echo Yii::app()->user->loginUrl[0];
    }
*/
        
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
                $this->redirect(array('site/IndexFinder'));
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
                $this->layout = 'column2_1';
                $model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = 'column2';
                $myID = Yii::app()->user->id;
                $model=new LoginForm;
                $msg = 0;
           
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
                    
			
                        $model->attributes=$_POST['LoginForm'];
			
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
			
				//remove blocked status
				UserLogHistory::model()->deleteAll('user_id = :I AND status = -1', array(':I'=>Yii::app()->user->id));
                                $sBlock = new SiteBlock();
				User::model()->updateByPk(Yii::app()->user->id, array('active'=> User::STATUS_ACTIVE,'update_time'=> date('Y-m-d H:i:s') ));
				
				$myTransType = Yii::app()->user->getState('TransType');
				$utype = Yii::app()->user->getState('usertype');
				$myID = Yii::app()->user->id;
				
                                //Check User Alrady login
                                $uLogHistry = new UserLogHistory();
				$logsts = $uLogHistry->checkLogStatus($myID);
                                $user = User::model()->findByPk($myID);
				
                                //Check is Mailid allow to login
                                $chekMailId = $sBlock->checkAllowMailId($user->email);
		//		if($chekMailId)
                //                {
                //                    $logsts=false;
                 //                   $msg=2;
                       //         }
                       //          elseif(!$logsts) {
                         //           $msg=1;
                         //       }
                                
                                
                                
                                $formstatus = FormStatus::model()->find('user_id=:user_id',array(':user_id'=>$myID));	
				
                               	if($logsts)
				{
				   $uLogHistry->afterLogin($myID);
					if ($myTransType === 'B'){
						$returnUrl = Yii::app()->user->returnUrl;  //CODECUT: in next line, remove testit before deploying
						if (empty($returnUrl) || $returnUrl == '/testit/index.php') $returnUrl = array('search/indexBuyer');
						
						$this->redirect($returnUrl);      
					}
					else if ($myTransType === 'S'){
						if ($formstatus->referrals == 1)
						{
						$returnUrl = Yii::app()->user->returnUrl;  //CODECUT: in next line, remove testit before deploying
						if (empty($returnUrl) || $returnUrl == '/testit/index.php') $returnUrl = array('user/indexSeller');
						
						$this->redirect($returnUrl);
					}
					else {    
						 Yii::app()->user->setFlash('pageid','login' );
					  if ($formstatus->exclusivity == 1) {$this->redirect(array('profileinfo/consult')); }
					 else if ($formstatus->verify == 1) {$this->redirect(array('profileinfo/exclusivity')); }
					 else if ($formstatus->consult == 1) {$this->redirect(array('profileinfo/verify')); }                                     
					 else if ($formstatus->summary == 1) {$this->redirect(array('profileinfo/consult')); }
					 else if ($formstatus->essay == 1) {$this->redirect(array('profileinfo/summary')); }
					 else if ($formstatus->extracurricular == 1) {$this->redirect(array('profileinfo/essay')); }
					 else if ($formstatus->volunteer == 1) {$this->redirect(array('profileinfo/extracurricular')); }   
					 else if ($formstatus->work == 1) {$this->redirect(array('profileinfo/referrals')); }   
					else if ($formstatus->sports == 1) {$this->redirect(array('profileinfo/work')); }                                     
					else if ($formstatus->music == 1) {$this->redirect(array('profileinfo/sports')); }
					else if ($formstatus->clubs == 1) {$this->redirect(array('profileinfo/music')); }
					else if ($formstatus->awardhonours == 1) {$this->redirect(array('profileinfo/clubs')); }
					else if ($formstatus->competitions == 1) {$this->redirect(array('profileinfo/awardhonors')); }
					else if ($formstatus->subjects == 1) {$this->redirect(array('profileinfo/competitions')); }
					else if ($formstatus->grades == 1) {$this->redirect(array('profileinfo/subjects')); }
					else if ($formstatus->toefl == 1) {$this->redirect(array('profileinfo/grades')); }
					else if ($formstatus->ap == 1) {$this->redirect(array('profileinfo/toefl')); }
					else if ($formstatus->sat2 == 1) {$this->redirect(array('profileinfo/ap')); }
					else if ($formstatus->act == 1) {$this->redirect(array('profileinfo/sat2')); }
					else if ($formstatus->sat1 == 1) {$this->redirect(array('profileinfo/act')); }
					else if ($formstatus->languages == 1) {$this->redirect(array('profileinfo/sat1')); }
					else if ($formstatus->admittance == 1) {$this->redirect(array('profileinfo/languages')); }
					else if ($formstatus->university == 1) {$this->redirect(array('profileinfo/admittance')); }
					else if ($formstatus->demographics == 1) {$this->redirect(array('profileinfo/university')); }
					else if ($formstatus->basic == 1) {$this->redirect(array('profileinfo/demographics')); }
					else if ($formstatus->basic == 0) {$this->redirect(array('profileinfo/basic')); }
					}    
					
					}
					else if($utype==1){
					
					$this->redirect(array('user/admin'));
				} 
				
				}
				else
				{
				   //$msg=1;
				   Yii::app()->user->setState('TransType',0);
					Yii::app()->user->logout();
					Yii::app()->user->setState('TransType',0);
				}
                                
                               

			}
			else {
				
			}
		}
		// display the login form
		//$this->render('login',array('model'=>$model));
		$this->render('loginpopup',array('model'=>$model,'msg'=>$msg));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
            if(Yii::app()->user->isGuest){
             $this->redirect(Yii::app()->homeUrl);
            }
            else
            {
                $uLogHistry = new UserLogHistory();
		$myID = Yii::app()->user->id;
             
		$uLogHistry->afterLogout($myID);
		Yii::app()->user->setState('TransType',0);
                Yii::app()->user->logout();
                Yii::app()->user->setState('TransType',0);
        
                $this->redirect(Yii::app()->homeUrl);
            }
	}
	
	
	/*
	 * user click the registration link , registration is activated 
	 	
	*/
	
	public function actionActivate(){
		
		// get Key and Id
		$key = Yii::app()->request->getParam('key');
		$id  = base64_decode(Yii::app()->request->getParam('id'));
		// Create Instance For User 
		$model = new User;
		
		/*
		 * Check the Condition  Userid and activation key and Created time is before two weeks		
		*/				
		$user = User::model()->find('id=:ID and activationkey=:AK and create_time >= subdate(curdate(), interval 14 day) ',
		array(':ID'=>$id,':AK'=>$key));
		// Check this is Valid Link
		if(empty($user)){
		// if this is not valid URL render invalid link 
			$this->render('invalidlink');			
		}else{
			//  remove the activation KEY
			$user->activationkey = '';
			// set the user Active
			$user->active = 1;
			$user->save();
			User::updateRoyalty($id);
			// Login the User 	  
			// create auto login form 
			$mod = new AutoLoginForm;
	 	  	$this->render('autologin',array('model'=>$mod,'id'=>$user->id));			
			
		}
	}
	
	
	/*
	*  this function used to auto login 
	*  id is posted , and sent to autologin  
	*/
	public function actionContinue(){		
		// get the user id from  autologin	
		$model=new AutoLoginForm;
		$model->attributes=$_POST['AutoLoginForm'];	
		// find the user name by user id 
		$user =User::model()->findByPk($model->id);	
		// create identity 		
		$identity=new UserIdentity($user->username,'');
		if($identity->autoLogin()){
		// autologin 
				Yii::app()->user->login($identity);
				$myTransType = Yii::app()->user->getState('TransType');			
			if ($myTransType === 'B'){
				$this->redirect(array('/search/indexBuyer'));                                                            
			}
			else if ($myTransType === 'S'){
				$this->redirect(array('/profileinfo/basic'));      
			}
			else{
				$this->redirect(array('site/index'));
			}			
		}		
	}
        
        
        
	public function actionTest(){
		
		$this->render('_cjui');
	}
        public function chkLockout($rtnUrl='')
        {
            Yii::app()->user->setState('TransType',0);
            Yii::app()->user->logout();
            Yii::app()->user->setState('TransType',0);
            if(isset ($rtnUrl))
                $this->redirect(array($rtnUrl));
        }
       	
        
}

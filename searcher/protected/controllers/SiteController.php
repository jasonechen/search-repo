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
                $this->redirect(array('site/index'));
            }
            else{
                $myTransType = $myUser->getState('TransType');

                if ($myTransType === 'B'){
                     $this->redirect(array('user/BuyerAccountSum'));                                                            
                }
                else if ($myTransType === 'S'){
                    $this->redirect(array('user/indexSeller'));      
                }
                else{
                $this->redirect(array('site/index'));
                }
            }
        }
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
                $model1=new LoginForm;
//                fb($model1);
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model1);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model1->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model1->validate() && $model1->login()){
//				$this->redirect(Yii::app()->user->returnUrl);
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
		}
				
// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index', array('model1'=>$model1));
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
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
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
                $model=new LoginForm;

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
//				$this->redirect(Yii::app()->user->returnUrl);
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
		}
		// display the login form
		//$this->render('login',array('model'=>$model));
		$this->render('loginpopup',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
                            Yii::app()->user->setState('TransType',0);
		Yii::app()->user->logout();
                Yii::app()->user->setState('TransType',0);
		$this->redirect(Yii::app()->homeUrl);
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
				$this->redirect(array('user/indexBuyer'));                                                            
			}
			else if ($myTransType === 'S'){
				$this->redirect(array('/profileinfo/basic'));      
			}
			else{
				$this->redirect(array('user/admin'));
			}
			
		}
		
	}
	public function actionTest(){
		
		$this->render('_cjui');
	}	
}

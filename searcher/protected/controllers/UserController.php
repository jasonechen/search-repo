<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
		);
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
				'actions'=>array('index','view','update','browse','indexSeller','indexBuyer','account'),
				'users'=>array('@'),
			),
			array('allow',  
				'actions'=>array('generateRandom','fillInMapInfo'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('create','captcha'),
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
            $this->redirect(array('user/generateRandom'));                 
        }
        
	public function actionGenerateRandom()
	{
		$model=new GenerateForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='generate-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['GenerateForm']))
		{
			$model->attributes=$_POST['GenerateForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate()){
                            $model->generate();
                            Yii::app()->user->setFlash('generateSuccess',"Profiles added!" );
                            $this->redirect(array('user/generateRandom'));                                                            
                        }
		}
		// display the login form
		$this->render('generate',array('model'=>$model));
	}
        
        
        public function actionAccount()
	{
            $myTransType = Yii::app()->user->getState('TransType');

            if ($myTransType === 'B'){
                 $this->redirect(array('user/indexBuyer'));                                                            
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

        
        
	public function actionIndexBuyer()
	{
                $myID = Yii::app()->user->id;
                                               
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
                            //                             $this->redirect(array('indexBuyer',)); 
                            $this->redirect(array('indexBuyer',));  
                        }
		}


		$this->render('buyerAdmin',array(
                        'bcModel'=>$bcModel,
			'model'=>$model,
                        'creditModel'=>$creditModel,
		));
	}        

	public function actionIndexSeller()
	{
                $myID = Yii::app()->user->id;
                $basicProfile=BasicProfile::model()->findByPk($myID);

		if($basicProfile===null){                
                        $basicProfile = new basicProfile;                        
                        $basicProfile->first_university_id = 1;
                        $basicProfile->curr_university_id = 1;
                        $basicProfile->num_academics = 0;
                        $basicProfile->num_extracurriculars = 0;
                        $basicProfile->num_sports = 0;
                        $basicProfile->num_competitions = 0;
                        $basicProfile->num_essays = 0;
                        $basicProfile->num_scores = 0;
                        $basicProfile->num_aps = 0;
                        $basicProfile->num_sat2s = 0;
                        $basicProfile->l1ForSale = 0;
                        $basicProfile->l2ForSale = 0;
                        $basicProfile->l3ForSale = 0;
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
                            //                             $this->redirect(array('indexBuyer',)); 
                            $this->redirect(array('indexSeller',));  
                        }
		}               
                
		$this->render('sellerAdmin',array(
			'model'=>$model,
                        'creditModel'=>$creditModel,
                        'basicProfile'=>$basicProfile,
		));
	}   
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

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
                            $model->save(false);
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
                            
                            $this->redirect(Yii::app()->homeUrl);
                        }
                        else{
                            $model->password_unhash = "";
                            $model->password_unhash_repeat = "";
                        }

		}

		$this->render('create',array(
			'model'=>$model,
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
            
                $this->render('//user/admin');
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
        
        public function setAdminMenu()
        {
            $this->menu=array(
                array('label'=>'Account admin', 'url'=>array('admin')),           
                array('label'=>'Buyer', 'url'=>array('indexBuyer')),
                array('label'=>'Seller', 'url'=>array('indexSeller')),
            );
        }
}

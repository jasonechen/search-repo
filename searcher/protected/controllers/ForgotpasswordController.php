<?php

class ForgotPasswordController extends Controller 
{  

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex(){	
	
		 $model=new ForgotPassword;
	 	 $this->render('forgotpassword',array('model'=>$model));		
	
	}
	public function accessRules()
	{
		return array(
/*These need to be fixed so only the self user can run these operations */                    
			array('allow',  
				'actions'=>array('Usernewpassword'),
				'users'=>array('@'),
			),
                    );
        }
	/**
	 * This is to send the email reset link for the user's email
	 * if the email exist , password reset link will send , if not exist shows error
	 */
	
    public function actionSendmaillink(){
		
		$model=new ForgotPassword;
		$model->attributes=@$_POST['ForgotPassword'];
		$mail = new Sendmail;	
		
		
		if($model->validate()){				
			// check the email exists
			$user = User::model()->find('email=:email', array(':email'=>$model->email));
			// if not exist shows error
			if(empty($user)){		
				// set flash message - Mail does not exist
				Yii::app()->user->setFlash('passworlinksenterror','Your email address does not exist.  Please try again.');
				$this->render('forgotpassword',array('model'=>$model));		
			}else{
				
				// if email exists , generate a link
				// timestamp as hash
				$key = time();
				$user->password_reset_key  = $key;
				$user->password_reset_sent = date("Y-m-d H:i:s", $key);  
				$user->save();
				//Encode the id
				$id  = base64_encode($user->id);
				// get the host details and base url				
				$link = Yii::app()->request->getHostInfo().Yii::app()->request->baseUrl;				
				$link .= '/index.php?r=forgotpassword/reset&key='.$key.'&id='.$id;
				// get the body 
				$body = file_get_contents(Yii::app()->params['emailTemplate'].'forgotpasswordEmail.php');
				$body = str_replace('#link#',$link,$body);   
				## send mail ##			    
				$mail = new Sendmail;
				$mail->send($model->email,'Reset your password',$body);
				 // set flash message - link sent 
				 Yii::app()->user->setFlash('passworlinksent',
				 "An email with a link has been sent to the submitted address. If you have other issues, please send an email to support@crowdprep.com" );
				 $this->render('_success',array('model'=>$model));
				
			}
			
		}
		
		
	
	} 
	
	
	/*
	*  Onclick the password link
	*/         
  
  	 public function actionReset(){
	 	 // get Key and Id
		$key = Yii::app()->request->getParam('key');
		$id  = base64_decode(Yii::app()->request->getParam('id'));
		// Create Instance For User 
		$model = new User;
		
		/*
		 * Check the Condition  Userid and activation key and Created time is before two weeks		
		*/				
		$user = User::model()->find('id=:ID and password_reset_key=:AK and 
		password_reset_sent >= subdate(curdate(), interval 14 day) ',array(':ID'=>$id,':AK'=>$key));
		
		if(empty($user)){			
		
			$this->render('invalidlink');
			
		}else{ 
		 	
			 $model=new ForgotPassword;
			 // set scenerio reset to match the rules
			 $model->setScenario('reset');			 		 
			// get Key and Id
			$key = Yii::app()->request->getParam('key');
			$id  = base64_decode(Yii::app()->request->getParam('id'));		 
			// Reset 
			$model->password_unhash = "";
                        $model->password_unhash_repeat = "";
			
			$this->render('reset',array('model'=>$model,'id'=>$id));
			
		}
	 }
	 
	 /*
	  * save new password 
	  * and auto login
	 */

	 public function actionSavenewpassword(){				
		$model=new ForgotPassword;
		$model->setScenario('reset');	
		$model->attributes=$_POST['ForgotPassword'];
		$user =User::model()->findByPk($model->id);
		$user->password =  $user->encrypt($model->password_unhash);	
		$user->password_reset_key 	 = '';
		$user->password_reset_sent   = ''; 	
	    $user->save();			
		// create auto login form 
		$mod = new AutologinForm;
	   	$this->render('autologin',array('model'=>$mod,'id'=>$user->id));	
		
	}
	

         public function actionUserReset(){
                $this->layout = 'column2';
  		$id = Yii::app()->user->id;
		// Create Instance For User 
		$model = new User;				
		 	
			 $model=new ForgotPassword;
			 // set scenerio reset to match the rules
			 $model->setScenario('reset');			 		 
		 
			// Reset 
			$model->password_unhash = "";
                        $model->password_unhash_repeat = "";

			$this->render('reset_user',array('model'=>$model,'id'=>$id));
			
		}
	 
	 	 

         public function actionUsernewpassword(){				
		$model=new ForgotPassword;
		$model->setScenario('reset');	
		$model->attributes=$_POST['ForgotPassword'];
		$user =User::model()->findByPk($model->id);
		$user->password =  $user->encrypt($model->password_unhash);					
                $user->save();			
	
				// create auto login form 
		$mod = new AutologinForm;
	   	$this->render('autologin_user',array('model'=>$mod,'id'=>$user->id));
	}

   	/*
	*  this function used to auto login
	*  id is posted , and sent to autologin  
	*/         
               
         

	public function actionLogin(){		
		// get the user id from  autologin	
		$model=new AutologinForm;
		$model->attributes=@$_POST['AutoLoginForm'];	
		
		// find the user name by user id 
		$user =User::model()->findByPk($model->id);			
		
		// create identity 		
		$identity=new UserIdentity($user->username,'');
				
		if($identity->autoLogin()){
		// autologin 
				Yii::app()->user->login($identity);
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
	
	public function actionTest(){
		$this->render('_success');
	}
	
               public function setAdminMenu()
        {
            $myTransType = Yii::app()->user->getState('TransType');

            if ($myTransType === 'B'){
    
        $this->menu=array(
                array('label'=>'Account Summary', 'url'=>array('user/BuyerAccountSum')),
                array('label'=>'Purchased Profiles', 'url'=>array('profile/browseMine')),
                array('label'=>'Credit Balance', 'url'=>array('user/Credits')),
                array('label'=>'Settings', 'url'=>array('user/Settings')),                
                array('label'=>'Purchased Details', 'url'=>array('user/PurchasedDetails')),
            );
            }
        else if ($myTransType === 'S'){ 
         $this->menu=array(
                array('label'=>'Account Summary', 'url'=>array('user/indexSeller')),         
                array('label'=>'Earnings', 'url'=>array('user/Earnings')),
                array('label'=>'Profile Wizard', 'url'=>array('profileinfo/basic')),
                array('label'=>'My Profile', 'url'=>array('profile/modBasic')),
                array('label'=>'Referrals', 'url'=>array('refer/index')),
                array('label'=>'Profile Validation', 'url'=>array('user/Validate')),
                array('label'=>'Consultation', 'url'=>array('user/Consult')),
                array('label'=>'Settings', 'url'=>array('user/Settings')),
                
            );
            }
         else{
         }
            
           
        }
        
        
}
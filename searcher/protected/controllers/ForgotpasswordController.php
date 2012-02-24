<?php

class ForgotPasswordController extends Controller 
{  

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex(){	
	
		 $model=new ForgotPassword;
	 	 $this->render('fogotpassword',array('model'=>$model));		
	
	}
	
	/**
	 * This is to send the email reset link for the user's email
	 * if the email exist , password reset link will send , if not exist shows error
	 */
	
    public function actionSendmaillink(){
		
		$model=new ForgotPassword;
		$model->attributes=$_POST['ForgotPassword'];
		$mail = new Sendmail;	
		
		
		if($model->validate()){				
			// check the email exists
			$user = User::model()->find('email=:email', array(':email'=>$model->email));
			// if not exist shows error
			if(empty($user)){		
				// set flash message - Mail does not exist
				Yii::app()->user->setFlash('passworlinksenterror','Email does not exist');
				$this->render('fogotpassword',array('model'=>$model));		
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
				 "An email has been sent to that address.  If there are other issues, send an email to support@meceve.com" );
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
	
	/*
	*  this function used to auto login
	*  id is posted , and sent to autologin  
	*/
	public function actionLogin(){		
		// get the user id from  autologin	
		$model=new AutologinForm;
		$model->attributes=$_POST['AutologinForm'];	
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
				$this->redirect(array('user/indexSeller'));      
			}
			else{
				$this->redirect(array('user/admin'));
			}
			
		}
		
	}
	
}
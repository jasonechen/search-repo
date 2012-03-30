<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_ACCOUNT_BLOCKED = 3;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    
        private $_id;
        
	public function authenticate()
	{
                $user=User::model()->find('username = :U', array(':U'=>$this->username) );
				
                if($user===null)
                { 
                	$this->errorCode=self::ERROR_USERNAME_INVALID;    
                } 
                else
                { 
                	$is_correct_password = ($user->password!==$user->encrypt($this->password)) ? false : true;
                	
                	if ($user->active == User::STATUS_BLOCKED)
                	{
                		$update_time = $user->update_time;
                		$period = 24*( (time() - strtotime($update_time)) / (24*3600));
                		
                		if ($is_correct_password && $period > 24)
                			$this->errorCode = self::ERROR_NONE;
                		else
                			$this->errorCode = self::ERROR_ACCOUNT_BLOCKED;
                	} 
                	else if ($user->active == User::STATUS_ACTIVE) {
	                	if(!$is_correct_password)  { 
	                         $this->errorCode=self::ERROR_PASSWORD_INVALID;                     
	                    }	 
                        else  { 
                        	$this->errorCode=self::ERROR_NONE;                               
                        }
                	}
                }
                
                if ($this->errorCode == self::ERROR_NONE)
                {
                	$this->_id = $user->id;
                	$this->setState('usertype',$user->usertype);
					$this->setState('FirstName',$user->FirstName);
                    $this->setState('TransType',$user->transType);
                    $this->setState('SchoolType',$user->schoolType);
                    
                    if(null===$user->last_login_time){
                    	$lastLogin = time();
                    } 
                    else {
                    	$lastLogin = strtotime($user->last_login_time);
                    } 
                   	
                    $this->setState('lastLoginTime', $lastLogin); 	
                }
				
                return !$this->errorCode;
        }
        public function getId()
        {
                return $this->_id;
        }
		
		
		
		/*
	 * autoLogin needs only username , 
	 * This is used in User Registration Activation Link
	 * when user Click the activation link , it turns logged in By using  username . 
	 * Only Difference Between authenticate and autologin is Password checking
	*/	
		
		public function autoLogin(){
			
			  $user=User::model()->findByAttributes(array('username'=>$this->username,'active'=>1));
			  
			  /*print '<pre>';
			  print_r($user);exit;*/

                if($user===null)
                { 
				
                        $this->errorCode=self::ERROR_USERNAME_INVALID;    
                } 
                else 

                { 
				
//                if($user->password!==$this->password) 
					$this->_id = $user->id; 
                     $this->setState('usertype',$user->usertype);
					$this->setState('FirstName',$user->FirstName);
					$this->setState('TransType',$user->transType);
					$this->setState('SchoolType',$user->schoolType);
					
					
					if(null===$user->last_login_time){
							$lastLogin = time();      
							
					} 
					else {
						
							$lastLogin = strtotime($user->last_login_time); 
					} 
					$this->setState('lastLoginTime', $lastLogin); 
					$this->errorCode=self::ERROR_NONE;
					
					
	
                }
				
                return !$this->errorCode;

						
		}



    /*
      * iscorrectTranstype needs transtype of the logged user  ,
      * This is used to check the controllers / actions  is available for transtype

     */

    public static function iscorrectTranstype($transid) {


        if (Yii::app()->user->getState('TransType') != $transid){

          Yii::app()->controller->redirect(array('site/logout'));
        }
    }

}

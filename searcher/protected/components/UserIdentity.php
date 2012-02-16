<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
                $user=User::model()->findByAttributes(array('username'=>$this->username,'active'=>1));

                if($user===null)
                { 
                        $this->errorCode=self::ERROR_USERNAME_INVALID;    
                } 
                else 

                { 
//                                            if($user->password!==$this->password) 
                        if($user->password!==$user->encrypt($this->password))  { 
                            $this->errorCode=self::ERROR_PASSWORD_INVALID;                     
                        } 
                        else  { 
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

}

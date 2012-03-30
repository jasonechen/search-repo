<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;
	public $message;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			
			if(!$this->_identity->authenticate()) 
			{
				$this->processBlockAccount();			
			}			
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else {
			
			$this->processBlockAccount();
				
			return false;
		}
	}
	
	private function processBlockAccount()
	{
		if ($this->_identity->errorCode == UserIdentity::ERROR_USERNAME_INVALID)
			$this->addError('username', 'Incorrect Username');
		else if ($this->_identity->errorCode == UserIdentity::ERROR_UNKNOWN_IDENTITY)
			$this->addError('password','Incorrect username or password.');	
		else if ($this->_identity->errorCode == UserIdentity::ERROR_ACCOUNT_BLOCKED)
			$this->addError('message','You have attempted to log in more than the maximum allowable attempts. Your account has been locked for security precautions');
		else if ($this->_identity->errorCode == UserIdentity::ERROR_PASSWORD_INVALID)
		{
			$user = User::model()->find('username = :U', array(':U'=>$this->username));
			if ($user)
			{
				//add history
				$login_history = new UserLogHistory();
				
				$login_history->user_id = $user->id;
				$login_history->log_ipaddress = $_SERVER['REMOTE_ADDR'];
				$login_history->status = -1;
				$login_history->save(false);
				
				//check block user
				$num_of_failed = UserLogHistory::model()->count('user_id = :ID AND status = -1', array(':ID'=> $user->id));
				$max_login_attempt = intval(Yii::app()->params['max_login_attempt']);
				
				if ($num_of_failed >= $max_login_attempt) {
					//update user status
					$user->active =User::STATUS_BLOCKED;
					$user->update_time = date('Y-m-d H:i:s');
					$user->save(false);
					
					
					$this->addError('message','You have attempted to log in more than the maximum allowable attempts. Your account has been locked for security precautions');
				}
				else 
					$this->addError('password','Incorrect username or password.');
			}
		}
	}
}

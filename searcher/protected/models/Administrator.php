<?php

/**
 * This is the model class for table "tbl_academic_profile".
 *
 * The followings are the available columns in table 'tbl_academic_profile':
 * @property string $username
 * @property string $password

 *
 * The followings are the available model relations:
 * @property Administrator $admin
 */
class Administrator extends CActiveRecord
{
        
	public $username;
	public $password;
	
        public function tableName()
	{
		return 'tbl_adminuser';
	}
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
			
			// password needs to be authenticated
			array('password', 'authenticate'),
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
				$this->addError('password','Incorrect username or password.');
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
		else
                {
			return false;
                }
	}	
}
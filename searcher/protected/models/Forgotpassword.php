<?php


class ForgotPassword extends CFormModel
{
	
	public $email;
	public $password_unhash_repeat;
    public $password_unhash;
	public $id; 
	
 
	/** 
	 * Declares the validation rules.
	 */
	public function rules()
	{ 
		return array(
			// name, email, subject and body are required  
			array('email', 'required'),
			array('email', 'email'),			
			array('password_unhash,password_unhash_repeat', 'required','on'=>'reset'), 
			array('password_unhash', 'length', 'max'=>256,'min'=>7,'on'=>'reset'), 			    
			array('password_unhash','compare','on'=>'reset'),
			array('id', 'required','on'=>'reset'), 							    
			
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'email'=>'Email',
			'password_unhash'=>'New Password',
			'password_unhash_repeat'=>'Confirm Password'
		);
	}
	
}
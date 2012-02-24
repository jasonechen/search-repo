<?php


class Refer extends CFormModel
{
	
	public $email1;
	public $email2;
	public $email3;
	public $email4;
	public $email5;
	public $email6;
	public $email7;
	public $email8;
	public $email9;
	public $email10;
	/** 
	 * Declares the validation rules.
	 */
	public function rules()
	{ 
		return array(
			// name, email, subject and body are required  
			array('email1', 'required'),
			array('email1,email2,email3,email4,email5,email6,email7,email8,email9,email10', 'email'),
			
			
			

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
			'email1'=>'Email 1',
			'email2'=>'Email 2',
			'email3'=>'Email 3',
			'email4'=>'Email 4',
			'email5'=>'Email 5',
			'email6'=>'Email 6',
			'email7'=>'Email 7',
			'email8'=>'Email 8',
			'email9'=>'Email 9',
			'email10'=>'Email 10',
		);
	}
	
}
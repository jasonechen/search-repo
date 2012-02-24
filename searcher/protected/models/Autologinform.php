<?php

/**
 * This form contains user id 
 * By using this Form , logged in  directly  with out password 
 * This is used in  user registration activation , change password 
 */
class AutoLoginForm extends CFormModel
{
	
	public $id; 
	
 
	/** 
	 * Declares the validation rules.
	 */
	public function rules()
	{ 
		return array( 
			// id  is user id 
			array('id', 'required')
			);
	}

	
	
}
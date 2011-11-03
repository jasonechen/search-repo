<?php

/**
 * BuyCreditsForm class.
 * BuyCreditsForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class BuyCreditsForm extends CFormModel
{
        public $buyAmount;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('buyAmount', 'required'),
                    	array('buyAmount', 'numerical','min'=>0),
                );
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'buyAmount'=>'Number of credits to purchase',
		);
	}

}

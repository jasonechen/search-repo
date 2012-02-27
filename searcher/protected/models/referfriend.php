<?php

/**
 * This is the model class for table "tbl_refer_friends".
  
 */
class ReferFriend extends CActiveRecord
{	
	// 10 email fields for refer friend email
	public $email0,$email1,$email2,$email3,$email4,$email5,$email6,$email7,$email8,$email9;
        
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name 
	 */
	public function tableName()
	{
		return 'tbl_refer_friends';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),		
			array('email1,email2,email3,email4,email5,email6,email7,email8,email9,email0','email'),
			array('friend_email','unique'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'email0'=>'Friend Email',
			'email1'=>'Friend Email',
			'email2'=>'Friend Email',
			'email3'=>'Friend Email',
			'email4'=>'Friend Email',
			'email5'=>'Friend Email',
			'email6'=>'Friend Email',
			'email7'=>'Friend Email',
			'email8'=>'Friend Email',
			'email9'=>'Friend Email'
		);
	}

	
	

}
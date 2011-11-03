<?php

/**
 * This is the model class for table "tbl_user_credit".
 *
 * The followings are the available columns in table 'tbl_user_credit':
 * @property string $user_id
 * @property double $buy_credits
 * @property double $sell_credits
 *
 * The followings are the available model relations:
 * @property User $user
 */  
class UserCredit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserCredit the static model class
	 */
    
    
    /* Testing        */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user_credit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, buy_credits, sell_credits', 'required'),
			array('buy_credits, sell_credits', 'numerical'),
			array('user_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, buy_credits, sell_credits', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'buy_credits' => 'Buy Credits',
			'sell_credits' => 'Sell Credits',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('buy_credits',$this->buy_credits);
		$criteria->compare('sell_credits',$this->sell_credits);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
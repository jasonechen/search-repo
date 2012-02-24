<?php

/**
 * This is the model class for table "tbl_seller_hist_view".
 *
 * The followings are the available columns in table 'tbl_seller_hist_view':
 * @property string $id
 * @property string $user_id
 * @property string $buyer_id
 * @property integer $trans_type
 * @property double $payment
 * @property string $purchase_date
 */
class SellerHistView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SellerHistView the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_seller_hist_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, buyer_id, trans_type, payment', 'required'),
			array('trans_type', 'numerical', 'integerOnly'=>true),
			array('payment,usedRoyalty', 'numerical'),
			array('user_id, buyer_id', 'length', 'max'=>10),
			array('purchase_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, buyer_id, trans_type, payment, usedRoyalty, purchase_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'buyer_id' => 'Buyer',
			'trans_type' => 'Trans Type',
			'payment' => 'Payment',
			'purchase_date' => 'Purchase Date',
			'usedRoyalty' => 'Used Royalty',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('buyer_id',$this->buyer_id,true);
		$criteria->compare('trans_type',$this->trans_type);
		$criteria->compare('payment',$this->payment);
		$criteria->compare('usedRoyalty',$this->usedRoyalty);
		$criteria->compare('purchase_date',$this->purchase_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
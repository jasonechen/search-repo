<?php

/**
 * This is the model class for table "tbl_unit_of_measure".
 *
 * The followings are the available columns in table 'tbl_unit_of_measure':
 * @property integer $id
 * @property string $user_id
 * @property string $bill_fname
 * @property integer $bill_lname
 * @property decimal $bill_address1
 * @property string $pricetype
 * @property datetime $createdate
 * @property integer $active
 * @property integer $delflg
 * @property enum $payment_type
 * @property integer $card_type
 * @property string $nameoncard
 * @property string $cardno
 * @property string $securitycode
 * @property integer $exp_month
 * @property integer $exp_year
 * @property datetime $created_date
 * @property decimal $totalamount
 * @property decimal $paidamount
 * @property integer $coupon_id
 * @property integer $discount
 */

class OrderPayment extends CActiveRecord
{
   /**
	 * Returns the static model of the specified AR class.
	 * @return UnitOfMeasure the static model class
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
		return 'tbl_order_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('bill_fname,bill_address1,bill_city,bill_state,bill_postal_code,nameoncard,cardno,securitycode,exp_month,exp_year', 'required'),
                        array ('bill_postal_code', 'length', 'max'=>5),
                        array ('bill_postal_code', 'numerical', 'integerOnly'=>true),
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
			'id' => 'ID',
                        'bill_fname' => 'First Name',
			'bill_lname' => 'Last Name',
                        'bill_address1' => 'Address',
                        'bill_address2'=> 'Address1',
                        'bill_city'=> 'City',
                        'bill_state'=> 'State',
                        'bill_postal_code'=> 'Postal Code',
                        'country'=> 'Country',
                        'payment_type'=>'Payment Method',
                        'card_type' => 'Card Type ',
			'nameoncard' => 'Name On Card ',
                        'cardno' => 'Card Number ',
                        'securitycode'=> 'Card Security Code(CSC)',
                    
		);
	}
        
        public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('bill_fname',$this->bill_fname);
		$criteria->compare('bill_lname',$this->bill_lname,true);
		$criteria->compare('bill_address1',$this->bill_address1,true);
		$criteria->compare('bill_address2',$this->bill_address2,true);
		$criteria->compare('bill_city',$this->bill_city,true);
		$criteria->compare('bill_state',$this->bill_state,true);
		$criteria->compare('bill_postal_code',$this->bill_postal_code,true);
		$criteria->compare('country',$this->country,true);
		//$criteria->compare('payment_type',$this->payment_type);
		$criteria->compare('card_type',$this->card_type,true);
		$criteria->compare('created_date',$this->created_date);
		$criteria->compare('totalamount',$this->totalamount,true);
		$criteria->compare('paidamount',$this->paidamount,true);
		//$criteria->compare('discount',$this->discount,true);
                
                return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
                     'pagination'=>array(
	            'pageSize'=>50
	        ),
                     'sort'=>array(
                'defaultOrder'=>'created_date',
            ),
		));
                
		/*return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		)); */
	}
        
        public function checkPromoCode($code)
        {
            $rtnValue = '';
            $condition ="promo_code='".$code."'";
            $coupon = Promo::model()->find($condition);
            if($coupon->discount_value)
                   $rtnValue = $coupon->discount_value.'_'.$coupon->id;
            else
                $rtnValue="0_0";
            return $rtnValue;
           
        }



}
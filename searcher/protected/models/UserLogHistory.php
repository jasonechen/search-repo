<?php

/**
 * This is the model class for table "tbl_unit_of_measure".
 *
 * The followings are the available columns in table 'tbl_unit_of_measure':
 * @property integer $id
 * @property integer $user_id
 * @property string $log_ipaddress
 * @property date $login_datetime
 * @property date $logout_datetime
 * @property string $desc 
 * @property integer $status

 
 */

class UserLogHistory extends CActiveRecord
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
		return 'tbl_user_loghistory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('refund_amt', 'required'),
                        
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('discount_value,act_fromdate, act_todate, pack_price', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			
			
                        
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
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('login_datetime',$this->login_datetime,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        public function checkLogStatus($id)
        {
            $hstry = $this->find('user_id='.$id.' and status = 1');
            $rtnValue = true;
            
            if(@$hstry)
            {
				$frmTime= $hstry->login_datetime;
				$expDate = date( "Y-m-d H:i:s", strtotime( $frmTime )+6*60*60 );
				$nowDate = date( "Y-m-d H:i:s");
                if(strtotime($nowDate) > strtotime($expDate)){ 
                    $this->expiredLogout($hstry->id);
                       
                }
                 else {
                    $rtnValue= false;
                }
            }
            return $rtnValue;
        }
        
        public function afterLogin($id)
        {
             $this->user_id=$id;
			 $ip = $_SERVER['REMOTE_ADDR'];//CHttpRequest::getUserHostAddress();
             $this->log_ipaddress = $ip;
             $this->save();
        }
        
        public function expiredLogout($id)
        {
            $model = UserLogHistory::model()->findByPk($id);
            //$model = $this->find('user_id='.$id.' and status = 1');
            $model->status = 2;
            $model->logout_datetime = date( "Y-m-d H:i:s");
            $model->save();
            
            
        }
         public function afterLogout($id)
        {
            $model = $this->find('user_id='.$id.' and status = 1');
            //$model = $this->find('user_id='.$id.' and status = 1');
            if(!empty($model))
            {
                $model->status = 0;
                $model->logout_datetime = date( "Y-m-d H:i:s");
                $model->save();
            }
        }


}
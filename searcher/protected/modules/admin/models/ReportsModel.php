<?php

/**
 * This is the model class for table "tbl_unit_of_measure".
 *
 * The followings are the available columns in table 'tbl_unit_of_measure':
 * @property integer $id
 * @property integer $order_id
 * @property integer $user_id
 * @property decimal $refund_amt
 * @property date $refund_date

 
 */

class ReportsModel extends CFormModel
{
   /**
	 * Returns the static model of the specified AR class.
	 * @return UnitOfMeasure the static model class
	 */
	

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
		$criteria->compare('refund_amt',$this->promo_code,true);
		

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        
        public function genrateSalesRpt($repotName)
        {
          $outdata[1] = array('Order No.','Order Date',
                        'Name','Mail Id',
                        'Package Name','Package Price',
                        'Total Amount','Paid Amount',
                        'Discount in %');
           $model =OrderPayment::model()->findAll(); 
            
           $i=2;
            foreach( $model as $data )
            {


                $outdata[$i] = array($data->order_id,$data->created_date,$data->user->FirstName,
                    $data->user->email,
                    $data->credits->pack_name,$data->credits->pack_price, $data->totalamount,
                    $data->paidamount,$data->discount);

                  $i++;
            }

            Yii::import('application.extensions.phpexcel.JPhpExcel');
            $xls = new JPhpExcel('UTF-8', false, 'CrowdPrep');
            $xls->addArray($outdata);
            $xls->generateXML($repotName);

        }
        
        public function genrateRefundRpt($reportName)
        {
            $model =OrderPayment::model()->findAll('refund_amount>0'); 
          
            $outdata[1] = array('Order No.','Order Date',
                        'Name','Mail Id',
                        'Package Name','Package Price',
                        'Total Amount','Paid Amount',
                        'Discount','refund_amount');
           
           $i=2;
           foreach( $model as $data )
            {
                    $outdata[$i] = array($data->order_id,$data->created_date,$data->user->FirstName,
                    $data->user->email,
                    $data->credits->pack_name,$data->credits->pack_price, $data->totalamount,
                    $data->paidamount,$data->discount,$data->refund_amount);

                  $i++;
            }
            
            Yii::import('application.extensions.phpexcel.JPhpExcel');
            $xls = new JPhpExcel('UTF-8', false, 'Crowd Prep');
            $xls->addArray($outdata);
            $xls->generateXML($reportName);
        }
        public function genrateCustomerRpt($reportName)
        {
            $model =  User::model()->findAll(); 
          
            $outdata[1] = array('FirstName','LastName','A/c Starting Date');
           
           $i=2;
           foreach( $model as $data )
            {
                    $outdata[$i] = array($data->FirstName,$data->LastName,$data->create_time,);

                  $i++;
            }
            
            Yii::import('application.extensions.phpexcel.JPhpExcel');
            $xls = new JPhpExcel('UTF-8', false, 'Crowd Prep');
            $xls->addArray($outdata);
            $xls->generateXML($reportName);
        }
        
        public function getTopSaleCoupons()
        {
            $sql = 'SELECT  COUNT(coupon_id) AS cnt,coupon_id,SUM(qty) AS qty FROM tbl_order_payment AS t
                    GROUP BY coupon_id ORDER BY cnt DESC';
         $connection=Yii::app()->db;   // assuming you have configured a "db" connection

        $command=$connection->createCommand($sql);
        return $command->queryAll();  
        }
        
         public function genrateUserRpt($reportName,$type)
        {
               
       if($type=='B' ||$type=='S' )
       {
           $cnt='transType="'.$type.'"';
       }
       else
           $cnt = 'id > 0';
            $model =  User::model()->findAll($cnt); 
          
            $outdata[1] = array('FirstName','LastName','User Name','A/c Starting Date',
               'User Type','Email','Status','Paypal Email','Street','City','State','Zip','Country' 
                );
           
           $i=2;
           foreach( $model as $data )
            {
               $utype = $data->transType=='S'?'Seller':'Buyer';
               $status = $data->active?'Active':'Inactive';
                    $outdata[$i] = array($data->FirstName,$data->LastName,$data->username,
                        $data->create_time,$utype,$data->email,$status,
                         $data->email_paypal,$data->mail_street1,$data->mail_city,$data->mailstate->name,
                        $data->mail_zip,$data->mailcountry->name);

                  $i++;
            }
            
            Yii::import('application.extensions.phpexcel.JPhpExcel');
            $xls = new JPhpExcel('UTF-8', false, 'Crowd Prep');
            $xls->addArray($outdata);
            $xls->generateXML($reportName);
        }


}
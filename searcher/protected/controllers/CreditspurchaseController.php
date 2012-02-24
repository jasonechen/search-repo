<?php
/**
 * Controller for Credits Purchase
 *
 * @author JKP
 */


class CreditspurchaseController extends Controller
{
    public $myId;
    public function init() {
      //  $this->$myID = Yii::app()->user->id;
       
    }
  

	public function actionIndex($id)
	{
             $error ='';
            
             $paymentdetails = new OrderPaymentModel();
            //  $this->getInvoiceTemplate($paymentdetails);
             $myID = Yii::app()->user->id;
             $orderno='mece'.(1000+OrderPaymentModel::model()->count()+1);
             $credit = CreditsModel::model()->findByPk($id);
			 
            if(isset($_POST['OrderPaymentModel']) )
            {
             
                    
                        $paymentdetails->order_id=$orderno;
                        $paymentdetails->attributes = $_POST['OrderPaymentModel'];
                        $paymentdetails->user_id=$myID; 
                        $paymentdetails->totalamount = $_POST['totalprice'];
                        $paymentdetails->paidamount = $_POST['totalwithdisprice'] ? $_POST['totalwithdisprice'] : $_POST['totalprice'];
                        $paymentdetails->allow_refund_amount=$paymentdetails->paidamount;
                        $paymentdetails->coupon_id = $_POST['promocodeid'];
                        $paymentdetails->discount = $_POST['totaldiscount'];
                        $paymentdetails->country=$_POST['OrderPaymentModel']['country'];
                         $paymentdetails->card_type=$_POST['OrderPaymentModel']['card_type'];
                        $paymentdetails->credits_id = $id;
                      
                         $isPaid = 0;
                         $res= $this->paypallPayNow($_POST['OrderPaymentModel'],$paymentdetails->paidamount);
                          
                          $msg = strtolower($res['ACK']);
                          $isPaid = strlen(strstr($msg,"success"))?1:0 ;
                        if($isPaid)//Check the payment details
                        {
                            
                                $this->getInvoiceTemplate($paymentdetails);
                                $paymentdetails->save();
                               
                                $creditModel = $this->loadCreditModel($myID);
                                $creditModel->buy_credits = $creditModel->buy_credits + $credit->pack_value;
                                $creditModel->save(true);
                                $resultArray= array("msg"=>"1",'cvalue'=>$credit->pack_value,'qty'=>$paymentdetails->qty);
                                $this->redirect(array('user/successpage','data'=>$resultArray));

                        }
                        else
                            $error='Payment Not completed <br/> Please check your account details';
                
                
                
            }
           
            
              //Input Form Object
                $cardtype =CHtml::listData(PaymentCardTypeModel::model()->findAll(), 'shortname', 'cardname');
                $month = CommonMethods::getMonth();
                $year = CommonMethods::getYear();
                $state = CommonMethods::getStates();
                $country = CommonMethods::getCountry();
                 //End Form Object
                $data = array('credit'=>$credit,
                'paymentdetails'=>$paymentdetails ,'cardtype'=>$cardtype,
                 'month'=>$month,'year'=>$year,'error'=>$error, 
                 'state'=>$state,'country'=>$country,   
                 );
                $this->render('index',$data);
            
	}
     public function actionUpdateAjax()
    {
         try
            {
                $code = $_GET['promocode'];
				
				
                $coupons = new CouponsModel();
               
                $result = $this->checkCode($code);
                print_r($result);
               exit();
            }  catch (Exception $ex){
                
            }
        
    }
    protected function loadCreditModel($id)
	{
		$model=UserCredit::model()->findByPk($id);
		if($model===null){
                    $model = new UserCredit();
                    $model->buy_credits = 0;
                    $model->sell_credits = 0;
                    $model->user_id = $id;
                    $model->save(true);
                }			
		return $model;
	}
        
        protected function checkCode($code)
        {
			
		
            $paymentdetails = new OrderPaymentModel();
            return $paymentdetails->checkPromoCode($code);
					
		
        }
        
        public function paypallPayNow($arg,$amt=1)
        {
            
            $paypal = new CallerService();
        
            $paymentType =urlencode("Sale");
            $firstName =urlencode( $arg['bill_fname']);
            $lastName =urlencode( $arg['bill_lname']);
            
             
            //$card =  PaymentCardTypeModel::model()->findByPk($arg['card_type']);
            $creditCardType =  urlencode($arg['card_type']); 
            
            $creditCardNumber = urlencode($arg['cardno']);  //$creditCardNumber = urlencode('344764037517055');
            $expDateMonth =urlencode($arg['exp_month']);

            // Month must be padded with leading zero
            $padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);

            $expDateYear =urlencode( $arg['exp_year']);
            $cvv2Number = urlencode($arg['securitycode']);//$cvv2Number = urlencode('962');
            $address1 = urlencode($arg['bill_address1']);
            $address2 = urlencode($arg['bill_address2']);
            $city = urlencode($arg['bill_city']);
            $state =urlencode($arg['bill_state']);// 'CA'
            $zip = urlencode($arg['bill_postal_code']);//'95131'
            $amount = urlencode($amt);
            $country = urlencode('USA'); //USA $arg['country']
            $currencyCode=urlencode('USD');	
          
            /* Construct the request string that will be sent to PayPal.
           The variable $nvpstr contains all the variables and is a
           name value pair string with & as a delimiter */
            $nvpstr="&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=".         $padDateMonth.$expDateYear."&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName&STREET=$address1&CITY=$city&STATE=$state".
            "&ZIP=$zip&COUNTRYCODE=US&CURRENCYCODE=$currencyCode";



        /* Make the API call to PayPal, using API signature.
           The API response is stored in an associative array called $resArray */
            $resArray=$paypal->hash_call("doDirectPayment",$nvpstr);
            //$res = strtoupper($resArray['ASK'])=='SUCCESS'?1:0;
            return $resArray;
    }
    
    public function getInvoiceTemplate($data)
    {
         $myID = Yii::app()->user->id;
       $model=User::model()->findByPk($myID); 
        $file = '\email_template.txt';//$this->loadModel($id);
        $path = Yii::app()->basePath .'\mailtemplate\invoice';
        
       
        $cardtype=PaymentCardTypeModel::model()->find('shortname=:card_type', array(':card_type'=>$data->card_type));
       
        
        $tempcontent=file_get_contents($path.$file,true);
        $tempcontent = str_replace('#Merchant_name#', $data->bill_fname, $tempcontent);
        $tempcontent = str_replace('#ShopperID#', $data->order_id, $tempcontent);
        $tempcontent = str_replace('#Date#', date('M-d-Y'), $tempcontent);
        $tempcontent = str_replace('#Pay_Method#',$cardtype->cardname, $tempcontent);
        $tempcontent = str_replace('#Inv_name#', $data->bill_fname, $tempcontent);
        $tempcontent = str_replace('#Inv_addr1#', $data->bill_address1, $tempcontent);
        $tempcontent = str_replace('#Inv_state#', $data->bill_state, $tempcontent);
        $tempcontent = str_replace('#Inv_zip#', $data->bill_postal_code, $tempcontent);
        $tempcontent = str_replace('#Inv_country#', $data->country, $tempcontent);
        
        $tempcontent = str_replace('#Voucher_value#', $data->totalamount, $tempcontent);
        $tempcontent = str_replace('#Discount_value#', $data->discount, $tempcontent);
        
        $tempcontent = str_replace('#Tax_value#', '0.00', $tempcontent);
        $tempcontent = str_replace('#Total_value#', $data->paidamount, $tempcontent);
        $tempcontent = str_replace('#qty#', $data->qty, $tempcontent);
        $tempcontent = str_replace('#Product#', $data->credits->pack_value.' Credits ', $tempcontent);
        
        
        $mail = new Sendmail;
        $mail->send($model->email,'INVOICE',$tempcontent);
        
        
    }
    
 

    
    
}
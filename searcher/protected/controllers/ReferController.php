<?php
 
	/* 
		*Refer Friend Controller	
	
	*/

class ReferController extends Controller
{ 
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public function actionIndex(){			
		
		$myID = Yii::app()->user->id;
		//get Email Content		
		$body = file_get_contents(Yii::app()->params['emailTemplate'].'referFriend.php');		
		// model
		$referFriend = new ReferFriend;
		// mail
		$mail = new Sendmail;
		
		// Get the number of referals used		
			$count_referrals_used = ReferFriend::model()->count('user_id=:id',array(':id'=>$myID));
			
		
		if(isset($_POST['ReferFriend'])){
			//foreach($_POST['ReferFriend'] as $form){								
				$referFriend->attributes = $_POST['ReferFriend'];			
				$referFriend->user_id = $myID;				
				$valid = $referFriend->validate();  
													
				if($valid){				
				 	foreach($_POST['ReferFriend'] as $email){
						if(!empty($email)){  	
							// key and User Id 
							$key = time();
							$id  = base64_encode($myID);
							
							$referFriend->user_id  = $myID;
							$referFriend->keyValue = $key; 
							$referFriend->friend_email = $email;
							$referFriend->save(false);
							// Set this Form Completed 
							$this->formStatus('referrals');				
							
							// send mail to the friends email					
							$body = file_get_contents(Yii::app()->params['emailTemplate'].'referFriend.php');				
							$url= Yii::app()->request->getHostInfo().$this->createUrl("user/createStudent",array('key'=>$key,'id'=>$id));				
							$body = str_replace('#link#',$url,$body);
							$mail->send($email,'Friend referral',$body); 
							
							unset($referFriend);
							$referFriend = new ReferFriend;	
							Yii::app()->user->setFlash('referSuccess',"An email has been sent to your listed referrals." );
						}				
					} 				
				}
			//}	
		}	
	
		$this->render('index',array('referFriend'=>$referFriend, 'count'=>$count_referrals_used)); 
	}

               public function setAdminMenu()
        {
            $myTransType = Yii::app()->user->getState('TransType');

            if ($myTransType === 'B'){
    
        $this->menu=array(
                array('label'=>'Account Summary', 'url'=>array('user/BuyerAccountSum')),
                array('label'=>'Purchased Profiles', 'url'=>array('browseMine')),
                array('label'=>'Credit Balance', 'url'=>array('user/indexBuyer')),
                array('label'=>'Settings', 'url'=>array('user/indexBuyer')),                
            );
            }
        else if ($myTransType === 'S'){ 
         $this->menu=array(
                array('label'=>'Account Summary', 'url'=>array('user/indexSeller')),         
                array('label'=>'Earnings', 'url'=>array('user/Earnings')),
                array('label'=>'Profile Wizard', 'url'=>array('profileinfo/basic')),
                array('label'=>'My Profile', 'url'=>array('profile/modBasic')),
                array('label'=>'Referrals', 'url'=>array('refer/index')),
                array('label'=>'Profile Verification', 'url'=>array('user/Validate')),
                array('label'=>'Consultation', 'url'=>array('user/Consult')),
                array('label'=>'Settings', 'url'=>array('user/Settings')),
                
            );
            }
         else{
         }
}
}
	

		



<?php

/**
 * BuyProfileForm class.
 */
class BuyProfileForm extends CFormModel
{
	public $profile_id;
        public $buyer_id;
	public $basicProfile;
        
        public $l1Status; // Either already purchased or not for sale
        public $l2Status;
        public $l3Status;
        public $isOwner;
        
        public $buyL1;
        public $buyL2;
        public $buyL3;
        
        public $l1Disabled;
        public $l2Disabled;
        public $l3Disabled;
        
        public $l1Price;
        public $l2Price;
        public $l3Price;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('buyL1,buyL2,buyL3', 'safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
		);
	}
        
        public function getStatusText($inStatus,$inType)
        {
            $myPrice = $this->getPrice($inType);
            $myText = "";
            switch ($inStatus){
                case 0:
                      $myText = "Not for sale";
                    break;
                case 1:
                      $myCreditText = $myPrice==1 ? "credit" : "credits";
                      $myText = "".$myPrice." ".$myCreditText;
                    break;
                case 2:
                      $myText = "Already Purchased.";
                    break;
            }
            
            return $myText;
        }

        protected function getPrice($inLevel)
        {               
            return ProfileController::getProfilePrice($this->profile_id,$inLevel);
        }
        
        
        
        public function fillInStatus($mpProfile)
        {

            $tempArray = $this->basicProfile->checkBuyer($this->buyer_id,$mpProfile);
            $this->l1Status = $tempArray['l1'];
            $this->l2Status = $tempArray['l2'];
            $this->l3Status = $tempArray['l3'];
            $this->isOwner = $tempArray['owner'];
            $this->l1Price = $this->getPrice(1);
            $this->l2Price = $this->getPrice(2);
            $this->l3Price = $this->getPrice(3);
            switch ($this->l1Status){
                case 0:
                      $this->buyL1 = 0;
                      $this->l1Disabled = 1;
                      break;
                case 1:
                      $this->l1Disabled = 0;
                    break;
                case 2:
                      $this->buyL1 = 1;
                      $this->l1Disabled = 1;
                    break;
            }            
            switch ($this->l2Status){
                case 0:
                      $this->buyL2 = 0;
                      $this->l2Disabled = 1;
                    break;
                case 1:
                      $this->l2Disabled = 0;
                    break;
                case 2:
                      $this->buyL2 = 1;
                      $this->l2Disabled = 1;
                    break;
            }   
            switch ($this->l3Status){
                case 0:
                      $this->buyL3 = 0;
                      $this->l3Disabled = 1;
                    break;
                case 1:
                      $this->l3Disabled = 0;
                    break;
                case 2:
                      $this->buyL3 = 1;
                      $this->l3Disabled = 1;
                    break;
            }   

        }
        
        
        public function checkIfPurchase($inputArray){
            $returnArray = array('isPurchase'=>false,
                                 'l1Purchase'=>false,
                                 'l2Purchase'=>false,
                                 'l3Purchase'=>false,
                                 'errorMessage'=>'');
                    
            if (isset($inputArray['buyL1'])){
                if ($inputArray['buyL1']){
                  if ($this->l1Status == 1){
                      $returnArray['l1Purchase'] = true;
                      $returnArray['isPurchase'] = true;
                  }
                }                                                     
            }
            if (isset($inputArray['buyL2'])){
                if ($inputArray['buyL2']){
                  if ($this->l2Status == 1){
                      $returnArray['l2Purchase'] = true;
                      $returnArray['isPurchase'] = true;
                  }
                }                                                     
            }
            if (isset($inputArray['buyL3'])){
                if ($inputArray['buyL3']){
                  if ($this->l3Status == 1){
                      $returnArray['l3Purchase'] = true;
                      $returnArray['isPurchase'] = true;
                  }
                }                                                     
            }
            
            return $returnArray;
        }

	public function verify()
	{
            return true;
	}
}

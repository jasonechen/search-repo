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
        
        public $l1PackagePrice;
        public $l2PackagePrice;
        public $l3PackagePrice;

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
        
        public function getStatusText($inStatus,$inPackageType)
        {
            $myPrice = $this->getPackagePrice($inPackageType);
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
        
        protected function getPackagePrice($inPackageType)
        {               
            $myPackagePrice = 999;
            switch ($inPackageType){
                case 1:
                    $myPackagePrice = $this->l1PackagePrice;
                    break;
                case 2:
                    $myPackagePrice = $this->l2PackagePrice;
                    break;
                case 3:
                    $myPackagePrice = $this->l3PackagePrice;
                    break;
            }
            
            return $myPackagePrice;
        }        
        
        public function fillInStatus($mpProfile)
        {

            /* Fill in status with respect to a particular profile */
            
            /* checkBuyer returns $buyerStatusArray: */
            /*  Keys: l1, l2, l3, owner */
            /*     l1 = 0 if not for sale, 1 if for sale, and 2 if already purchased */
            
            $tempArray = $this->basicProfile->checkBuyer($this->buyer_id,$mpProfile);
            $this->l1Status = $tempArray['l1'];
            $this->l2Status = $tempArray['l2'];
            $this->l3Status = $tempArray['l3'];
            $this->isOwner = $tempArray['owner'];
            $this->l1PackagePrice = $this->getPrice(1);
            // Check to see if L1 as been purchased, and if so, then don't include in the package price */
            if ($this->l1Status == 1){
                $this->l2PackagePrice = $this->l1PackagePrice + $this->getPrice(2);
            }
            else{
                $this->l2PackagePrice = $this->getPrice(2);
            }
            if ($this->l2Status == 1){
                $this->l3PackagePrice = $this->l2PackagePrice + $this->getPrice(3);
            }
            else{
                if ($this->l1Status == 1){
                    $this->l3PackagePrice = $this->l1PackagePrice + $this->getPrice(3);
                }
                else{
                    $this->l3PackagePrice = $this->getPrice(3);
                }
            }
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
                  if ($this->l1Status == 1){
                      $returnArray['l1Purchase'] = true;
                      $returnArray['isPurchase'] = true;
                  }
                  if ($this->l2Status == 1){
                      $returnArray['l2Purchase'] = true;
                      $returnArray['isPurchase'] = true;
                  }
                }                                                     
            }
            if (isset($inputArray['buyL3'])){
                if ($inputArray['buyL3']){
                  if ($this->l1Status == 1){
                      $returnArray['l1Purchase'] = true;
                      $returnArray['isPurchase'] = true;
                  }
                  if ($this->l2Status == 1){
                      $returnArray['l2Purchase'] = true;
                      $returnArray['isPurchase'] = true;
                  }
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

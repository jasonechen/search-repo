<?php

class ProfileInfoController extends Controller
{ 
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters 
	 */ 
	public function filters() 
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function accessRules()
	{
		return array(
			  array('deny', 
                'users'=>array('?'),  // ? deny - Guest , @ ->deny  - logged in users
            ), 
		);	
	}
	 
	 /**
	 *  this action check , incompleted forms and redirect to that form
	 *  if all forms completed redirect to default action basic
	 *
	 **/
	
	public function actionIndex(){
	
		 $myID = Yii::app()->user->id; 			 
		 $formStatus =  FormStatus::model()->find('user_id=:id',array(':id'=>$myID));
		
		if($formStatus != null){
			$form = $this->getForms();			
			foreach($form as $key=>$val){							
				 if($formStatus->$val == 0 ){
					$this->Formredirect($val);
				 }	
			}		
		}
		
		$this->redirect(array('basic'));
		
	}
	
	/**
	* 
	*  returns the array with all the forms in the order 
	*/
	
	public function getForms(){
		$form = array();

		//personal Info
		$form[1] = 'basic';
		$form[2] = 'demographics';
		$form[3] = 'university';
		$form[4] = 'admittance';
		$form[5] = 'languages';
		
		// Test score
		$form[6] = 'sat1';
		$form[7] = 'act';
		$form[8] = 'sat2';
		$form[9] = 'ap';
		$form[10] = 'toefl';
	   // Academics	
   		$form[11] = 'grades';
		$form[12] = 'subjects';
		$form[13] = 'competitions';
		$form[14] = 'awardhonours';
	  //Extra-curricular	
   		$form[15] = 'clubs';
		$form[16] = 'sports';
		$form[17] = 'music';
		$form[18] = 'work';
	  	$form[19] = 'volunteer';
		$form[20] = 'extracurricular';		
	  // Essay
	  	$form[21] = 'essay';
		
	  // summary	
	  	$form[22] = 'summary';		
			  
	  // Finish	
   		$form[23] = 'consult';
		$form[24] = 'verify';
		$form[25] = 'exclusivity';		
	  	$form[26] = 'referrals';	
		return $form;
	
	} 
	/**
	* Get the form name and redirect to its corresponding action.
	*
	**/
	
	public function Formredirect($form){
		
		switch($form){		
		// personal info 	
		  case  'basic': 
		  	$this->redirect(array('basic'));	
		  	break;
		   case  'demographics': 
		  	$this->redirect(array('demographics'));	
		  	break;		
		 case  'university': 
		  	$this->redirect(array('university'));	
		  	break;		
		 case  'admittance': 
		  	$this->redirect(array('admittance'));	
		  	break;		
		 case  'languages': 
		  	$this->redirect(array('languages'));	
		  	break;
		// Test score
		 case  'sat1': 
		  	$this->redirect(array('sat1'));	
		  	break;									

		 case  'act': 
		  	$this->redirect(array('act'));	
		  	break;									

		 case  'sat2': 
		  	$this->redirect(array('sat2'));	
		  	break;									

		 case  'ap': 
		  	$this->redirect(array('ap'));	
		  	break;									

		 case  'toefl': 
		  	$this->redirect(array('toefl'));	
		  	break;					 
		 // Academics
 		 case  'grades': 
		  	$this->redirect(array('grades'));	
		  	break;
 		 case  'subjects': 
		  	$this->redirect(array('subjects'));	
		  	break;
 		 case  'competitions': 
		  	$this->redirect(array('competitions'));	
		  	break;
 		 case  'awardhonours': 
		  	$this->redirect(array('awardshonors'));	
		  	break;
	 	// Extra-Curricular
 		 case  'clubs': 
		  	$this->redirect(array('clubs'));	
		  	break;
 		 case  'sports': 
		  	$this->redirect(array('sports'));	
		  	break;
 		 case  'music': 
		  	$this->redirect(array('music'));	
		  	break;
 		 case  'work': 
		  	$this->redirect(array('work'));	
		  	break;
 		 case  'volunteer': 
		  	$this->redirect(array('volunteer'));	
		  	break;
 		 case  'extracurricular': 
		  	$this->redirect(array('extracurricular'));	
		  	break;
		// Essay
 		 case  'essay': 
		  	$this->redirect(array('modEssays'));	
		  	break;
		// summary
 		 case  'summary': 
		  	$this->redirect(array('summary'));	
		  	break;
		// Finish
		
		 case  'consult': 
		  	$this->redirect(array('consult'));	
		  	break;					
		 case  'referrals': 
		  	$this->redirect(array('referrals'));	
		  	break;
		 case  'toefl': 
		  	$this->redirect(array('toefl'));	
		  	break;
		 case  'verify': 
		  	$this->redirect(array('verify'));	
		  	break;
		 case  'exclusivity': 
		  	$this->redirect(array('exclusivity'));	
		  	break;		 				
		}
	
	}
	  
	public function actionBasic() 
	{
		
        $myID = Yii::app()->user->id;
    
        $personalProfile=PersonalProfile::model()->findByPk($myID);
				
		if($personalProfile===null){                
                        $personalProfile=new PersonalProfile;
                        $personalProfile->alumni_connections = array();
                        $personalProfile->alumni_connections_flag = 0;
                }
                else{
                    $personalProfile->alumni_connections_flag = 0;
                    $personalProfile->alumni_connections = array();
    
                    if (($personalProfile->legacy_direct == "N")&&($personalProfile->legacy_indirect == "N")){
                        $personalProfile->alumni_connections[] = "None";    
                    }
                    else{
                        if (($personalProfile->legacy_direct == "F") or ($personalProfile->legacy_direct == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Father";
                        }
                        if (($personalProfile->legacy_direct == "M") or ($personalProfile->legacy_direct == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Mother";
                        }
                        if (($personalProfile->legacy_indirect == "S") or ($personalProfile->legacy_indirect == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Sibling";
                        }
                        if (($personalProfile->legacy_indirect == "O") or ($personalProfile->legacy_indirect == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Other";
                        }
                    }
                }
                
                $basicProfile=BasicProfile::model()->findByPk($myID);
		if($basicProfile===null){   					
                        $basicProfile=new BasicProfile;						
                        $basicProfile->initialize($myID);
                }
                else{
                        $basicProfile->curr_university_name = $basicProfile->getCurrUniversityName();
                        $basicProfile->first_university_name = $basicProfile->getFirstUniversityName();
                        $basicProfile->high_school_name = $basicProfile->getHighSchoolName();
                        
                }
				
				
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

              
		$personalProfile->setScenario('dateOfBirth');
		if(isset($_POST['PersonalProfile'],$_POST['BasicProfile']))
		{
            	
				
			
			            // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.

						$personalProfile->attributes=$_POST['PersonalProfile'];
                        $basicProfile->attributes=$_POST['BasicProfile'];
						
                        if (isset($_POST['PersonalProfile']['alumni_connections_flag'])){
						
                            $personalProfile->alumni_connections = $_POST['PersonalProfile']['alumni_connections'];

                            $tempArray = array('None'=>0,'Father'=>0,'Mother'=>0,'Sibling'=>0,'Other'=>0);
                            if ($personalProfile->alumni_connections !== ''){
                                foreach ($personalProfile->alumni_connections as $i=>$theValue){
                                    if ($theValue == 'None') {
                                        $tempArray['None'] = 1;
                                    }    
                                    else if ($theValue == 'Father') {
                                        $tempArray['Father'] = 1;
                                    }                       
                                    else if ($theValue == 'Mother'){
                                        $tempArray['Mother'] = 1;
                                    }
                                    else if ($theValue == 'Sibling'){
                                        $tempArray['Sibling'] = 1;
                                    }
                                    else if ($theValue == 'Other'){
                                        $tempArray['Other'] = 1;
                                    }
                                }
                            }
                            if (($tempArray['Father'] + $tempArray['Mother'] + $tempArray['Sibling']+$tempArray['Other'])>0){
                                $tempArray['None'] = 0;                            
                            }
                            else{
                                $tempArray['None'] = 1;   
                            }
                            if (($tempArray['Father'] == 1) && ($tempArray['Mother']==1)){
                                $personalProfile->legacy_direct = 'B';
                            }
                            else if ($tempArray['Father']==1){
                                $personalProfile->legacy_direct = 'F';
                            }
                            else if ($tempArray['Mother']==1){
                                $personalProfile->legacy_direct = 'M';
                            }
                            else if ($tempArray['None']==1){
                                $personalProfile->legacy_direct = 'N';
                            }
                            if (($tempArray['Sibling'] == 1) && ($tempArray['Other']==1)){
                                $personalProfile->legacy_indirect = 'B';
                            }
                            else if ($tempArray['Sibling']==1){
                                $personalProfile->legacy_indirect = 'S';
                            }
                            else if ($tempArray['Other']==1){
                                $personalProfile->legacy_indirect = 'O';
                            }
                            else if ($tempArray['None']==1){
                                $personalProfile->legacy_indirect = 'N';
                            }                       
                        }
						
                        $valid = $personalProfile->validate();                  
                        $valid = $basicProfile->validate()  && $valid;
						
					// Change the Date Format
					if(isset($_POST['PersonalProfile']['date_of_birth'])){					
						@$OldDateBirth = explode('/',$_POST['PersonalProfile']['date_of_birth']);	// Explode 
						@$NewDateBirth = $OldDateBirth[2].'-'.$OldDateBirth[0].'-'.$OldDateBirth[1];  	// New Format
						@$personalProfile->date_of_birth = $NewDateBirth;
					}
					
					
					
                        if ($valid)
                        {					
                            $personalProfile->save(false);						
                            $basicProfile->save(true);							
							// Set this Form Completed 
							$this->formStatus('basic');						
						
                            Yii::app()->user->setFlash('basicSuccess',"Info saved!" );
                             $this->redirect(array('demographics'));   
                        }
						
						
		}
		
        		
		// View convert the date Format
		if(isset($personalProfile->date_of_birth )){
			$temp =	explode('-',$personalProfile->date_of_birth);
			if(!empty($temp[1]) && $temp[1] > 0)			
				$personalProfile->date_of_birth = $temp[1].'/'.$temp[2].'/'.$temp[0];
			else 
				$personalProfile->date_of_birth = '';
		
		}
				
		$this->render('_personal',array('basicProfile'=>$basicProfile,'personalProfile'=>$personalProfile));
	
	
		
	}
	
			
        public function actiondemographics()	{
                    $myID = Yii::app()->user->id;
            
                $personalProfile=PersonalProfile::model()->findByPk($myID);
				
		if($personalProfile===null){                
                        $personalProfile=new PersonalProfile;
                        $personalProfile->alumni_connections = array();
                        $personalProfile->alumni_connections_flag = 0;
                }
                else{
                    $personalProfile->alumni_connections_flag = 0;
                    $personalProfile->alumni_connections = array();
    
                    if (($personalProfile->legacy_direct == "N")&&($personalProfile->legacy_indirect == "N")){
                        $personalProfile->alumni_connections[] = "None";    
                    }
                    else{
                        if (($personalProfile->legacy_direct == "F") or ($personalProfile->legacy_direct == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Father";
                        }
                        if (($personalProfile->legacy_direct == "M") or ($personalProfile->legacy_direct == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Mother";
                        }
                        if (($personalProfile->legacy_indirect == "S") or ($personalProfile->legacy_indirect == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Sibling";
                        }
                        if (($personalProfile->legacy_indirect == "O") or ($personalProfile->legacy_indirect == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Other";
                        }
                    }
                }
                
                $basicProfile=BasicProfile::model()->findByPk($myID);
		if($basicProfile===null){   				
                        $basicProfile=new BasicProfile;
                        $basicProfile->initialize($myID);					
                }
                else{
                        $basicProfile->curr_university_name = $basicProfile->getCurrUniversityName();
                        $basicProfile->first_university_name = $basicProfile->getFirstUniversityName();
                        $basicProfile->high_school_name = $basicProfile->getHighSchoolName();
                        
                }
				$basicProfile->setScenario('demogr');
				//$personalProfile->setScenario('dateOfBirth');
				
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['PersonalProfile'],$_POST['BasicProfile']))
		{
            	
			
			            // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.

						$personalProfile->attributes=$_POST['PersonalProfile'];
                        $basicProfile->attributes=$_POST['BasicProfile'];
						
                        if (isset($_POST['PersonalProfile']['alumni_connections_flag'])){
						
                            $personalProfile->alumni_connections = $_POST['PersonalProfile']['alumni_connections'];

                            $tempArray = array('None'=>0,'Father'=>0,'Mother'=>0,'Sibling'=>0,'Other'=>0);
                            if ($personalProfile->alumni_connections !== ''){
                                foreach ($personalProfile->alumni_connections as $i=>$theValue){
                                    if ($theValue == 'None') {
                                        $tempArray['None'] = 1;
                                    }    
                                    else if ($theValue == 'Father') {
                                        $tempArray['Father'] = 1;
                                    }                       
                                    else if ($theValue == 'Mother'){
                                        $tempArray['Mother'] = 1;
                                    }
                                    else if ($theValue == 'Sibling'){
                                        $tempArray['Sibling'] = 1;
                                    }
                                    else if ($theValue == 'Other'){
                                        $tempArray['Other'] = 1;
                                    }
                                }
                            }
                            if (($tempArray['Father'] + $tempArray['Mother'] + $tempArray['Sibling']+$tempArray['Other'])>0){
                                $tempArray['None'] = 0;                            
                            }
                            else{
                                $tempArray['None'] = 1;   
                            }
                            if (($tempArray['Father'] == 1) && ($tempArray['Mother']==1)){
                                $personalProfile->legacy_direct = 'B';
                            }
                            else if ($tempArray['Father']==1){
                                $personalProfile->legacy_direct = 'F';
                            }
                            else if ($tempArray['Mother']==1){
                                $personalProfile->legacy_direct = 'M';
                            }
                            else if ($tempArray['None']==1){
                                $personalProfile->legacy_direct = 'N';
                            }
                            if (($tempArray['Sibling'] == 1) && ($tempArray['Other']==1)){
                                $personalProfile->legacy_indirect = 'B';
                            }
                            else if ($tempArray['Sibling']==1){
                                $personalProfile->legacy_indirect = 'S';
                            }
                            else if ($tempArray['Other']==1){
                                $personalProfile->legacy_indirect = 'O';
                            }
                            else if ($tempArray['None']==1){
                                $personalProfile->legacy_indirect = 'N';
                            }                       
                        }
						
                        $valid = $personalProfile->validate();                  
                        $valid = $basicProfile->validate()  && $valid;
						
					/*print '<pre>';
					print_r($personalProfile->getErrors());exit;*/
						
					// Change the Date FOrmat
					if(isset($_POST['PersonalProfile']['date_of_birth'])){					
						@$OldDateBirth = explode('/',$_POST['PersonalProfile']['date_of_birth']);	// Explode 
						@$NewDateBirth = $OldDateBirth[2].'-'.$OldDateBirth[0].'-'.$OldDateBirth[1];  	// New Format
						@$personalProfile->date_of_birth = $NewDateBirth;
					}	
						
                        if ($valid)
                        {
						
							
                            $personalProfile->save(false);						
                            $basicProfile->save(true);	
							// Set this Form Completed 
							$this->formStatus('demographics');	
													
							
                            Yii::app()->user->setFlash('basicSuccess',"Info saved!" );
                             $this->redirect(array('university'));   
                        }

		}
				 	
				// View convert the date Format
				if(isset($personalProfile->date_of_birth )){
					$temp =	explode('-',$personalProfile->date_of_birth);
					if(!empty($temp[1]) && $temp[1] > 0)			
						$personalProfile->date_of_birth = $temp[1].'/'.$temp[2].'/'.$temp[0];
					else 
						$personalProfile->date_of_birth = '';
					
				} 
				 
				$this->render('_demographics',array('basicProfile'=>$basicProfile,'personalProfile'=>$personalProfile));
		

			}
			
			
		public function actionUniversity()
	{
	
		//print '<pre>'; print_r($_POST);exit;		
                $myID = Yii::app()->user->id;
            
                $personalProfile=PersonalProfile::model()->findByPk($myID);
				
		if($personalProfile===null){                
                        $personalProfile=new PersonalProfile;
                        $personalProfile->alumni_connections = array();
                        $personalProfile->alumni_connections_flag = 0;
                }
                else{
                    $personalProfile->alumni_connections_flag = 0;
                    $personalProfile->alumni_connections = array();
    
                    if (($personalProfile->legacy_direct == "N")&&($personalProfile->legacy_indirect == "N")){
                        $personalProfile->alumni_connections[] = "None";    
                    }
                    else{
                        if (($personalProfile->legacy_direct == "F") or ($personalProfile->legacy_direct == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Father";
                        }
                        if (($personalProfile->legacy_direct == "M") or ($personalProfile->legacy_direct == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Mother";
                        }
                        if (($personalProfile->legacy_indirect == "S") or ($personalProfile->legacy_indirect == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Sibling";
                        }
                        if (($personalProfile->legacy_indirect == "O") or ($personalProfile->legacy_indirect == "B")) {
                     
                             $personalProfile->alumni_connections[] = "Other";
                        }
                    }
                }
                
                $basicProfile=BasicProfile::model()->findByPk($myID);
		if($basicProfile===null){   				
                        $basicProfile=new BasicProfile;
                        $basicProfile->initialize($myID);					
                }
                else{
                        $basicProfile->curr_university_name = $basicProfile->getCurrUniversityName();
                        $basicProfile->first_university_name = $basicProfile->getFirstUniversityName();
                        $basicProfile->high_school_name = $basicProfile->getHighSchoolName();
                        
                }
				
				
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PersonalProfile'],$_POST['BasicProfile']))
		{
            	
			
			            // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.

						$personalProfile->attributes=$_POST['PersonalProfile'];
                        $basicProfile->attributes=$_POST['BasicProfile'];
						
                        if (isset($_POST['PersonalProfile']['alumni_connections_flag'])){
						
                            $personalProfile->alumni_connections = $_POST['PersonalProfile']['alumni_connections'];

                            $tempArray = array('None'=>0,'Father'=>0,'Mother'=>0,'Sibling'=>0,'Other'=>0);
                            if ($personalProfile->alumni_connections !== ''){
                                foreach ($personalProfile->alumni_connections as $i=>$theValue){
                                    if ($theValue == 'None') {
                                        $tempArray['None'] = 1;
                                    }    
                                    else if ($theValue == 'Father') {
                                        $tempArray['Father'] = 1;
                                    }                       
                                    else if ($theValue == 'Mother'){
                                        $tempArray['Mother'] = 1;
                                    }
                                    else if ($theValue == 'Sibling'){
                                        $tempArray['Sibling'] = 1;
                                    }
                                    else if ($theValue == 'Other'){
                                        $tempArray['Other'] = 1;
                                    }
                                }
                            }
                            if (($tempArray['Father'] + $tempArray['Mother'] + $tempArray['Sibling']+$tempArray['Other'])>0){
                                $tempArray['None'] = 0;                            
                            }
                            else{
                                $tempArray['None'] = 1;   
                            }
                            if (($tempArray['Father'] == 1) && ($tempArray['Mother']==1)){
                                $personalProfile->legacy_direct = 'B';
                            }
                            else if ($tempArray['Father']==1){
                                $personalProfile->legacy_direct = 'F';
                            }
                            else if ($tempArray['Mother']==1){
                                $personalProfile->legacy_direct = 'M';
                            }
                            else if ($tempArray['None']==1){
                                $personalProfile->legacy_direct = 'N';
                            }
                            if (($tempArray['Sibling'] == 1) && ($tempArray['Other']==1)){
                                $personalProfile->legacy_indirect = 'B';
                            }
                            else if ($tempArray['Sibling']==1){
                                $personalProfile->legacy_indirect = 'S';
                            }
                            else if ($tempArray['Other']==1){
                                $personalProfile->legacy_indirect = 'O';
                            }
                            else if ($tempArray['None']==1){
                                $personalProfile->legacy_indirect = 'N';
                            }                       
                        }
						
                        $valid = $personalProfile->validate();                  
                        $valid = $basicProfile->validate()  && $valid;
						
						
					// if isTransfer is Not Checked , first_university_id = curr_university_id
					if(isset($_POST['BasicProfile']['isTransfer'])){
						$_POST['BasicProfile']['isTransfer']?'' : ($basicProfile->first_university_id = $basicProfile->curr_university_id );
					}
					
                        if ($valid)
                        {
							
							
                            $personalProfile->save(true);						
                            $basicProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('university');
														
							
                            Yii::app()->user->setFlash('basicSuccess',"Info saved!" );
                             $this->redirect(array('admittance'));   
                        }

		}

		// To set the isTransfer CheckBox , checked or Not checked  ,,,,Check this Conditon
		if($basicProfile->first_university_id != $basicProfile->curr_university_id)
			$isTransfer = true;
		else
			$isTransfer = false;
			
        		
		$this->render('_university',
						array('basicProfile'=>$basicProfile,
						'personalProfile'=>$personalProfile,
						'isTransfer'=>$isTransfer
						));
	
	
		
	}	
	
	
	//for other Other Admittances
	
	public function actionAdmittance(){
		
		$otherschooladmitProfile=new OtherSchoolAdmitProfile;
		
		$myID = Yii::app()->user->id;
		$university = new UniversityName;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['OtherSchoolAdmitProfile']))
		{
				 $otherschooladmitProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
				foreach($_POST['OtherSchoolAdmitProfile'] as $form){			
					
					if(!empty($form['otherschool_id'])){
						$otherschooladmitProfile->attributes	=	$form;
						$otherschooladmitProfile->user_id = $myID;	
								
						// Get the University ID By  Name												
						$otherschooladmitProfile->otherschool_id = $university->getIdbyName($form['otherschool_id']);
                        $valid = $otherschooladmitProfile->validate();                  						
                        if ($valid)
                        {	
						
											
                            $otherschooladmitProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('admittance');
							
                            unset($otherschooladmitProfile);
                            $otherschooladmitProfile = new OtherSchoolAdmitProfile;
                            Yii::app()->user->setFlash('otherschoolSuccess',"Info saved!" );
                             
                        }
				   }		
				}	
					
			$this->redirect(array('languages',));		

		}
		
		$this->render('_schooladmits',array('otherschooladmitProfile'=>$otherschooladmitProfile));
	
	}
			
	public function actionLanguages(){
	
		 $myID = Yii::app()->user->id;
				
		 
		 $languageProfile=new LanguageProfile;
		 
		 		                 
       
		 if(isset($_POST['LanguageProfile']))
		{
			 /*
		 	* Before inserting the languges Delete the before all records 
			* for the particular User
		 	*/
			 $languageProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
			 
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
				foreach($_POST['LanguageProfile'] as $form){
				 	
					$languageProfile->attributes	= $form;					
                        $valid = $languageProfile->validate();                  
                        if ($valid)
                        {
                            $languageProfile->save(true);
							
							// Set this Form Completed 
							$this->formStatus('languages');
							
                            unset($languageProfile);
                            $languageProfile = new LanguageProfile;
                            Yii::app()->user->setFlash('langSuccess',"Info saved!" );
                                
                        }
				}
				
                                $this->redirect(array('sat1',)); 
				


		}
			
	
			$this->render('_languages',array('languageProfile'=>$languageProfile));
	}		
	
	   public function setEditProfileMenu()
        {
            $this->menu=array(
                array('label'=>'Personal Info', 'url'=>array('modBasic')),
                array('label'=>'Academics', 'url'=>array('modAcademicTabs')),
                array('label'=>'Test Scores', 'url'=>array('modScoreTabs')),
                array('label'=>'Extracurriculars', 'url'=>array('modExtracurriculars')),
                array('label'=>'Essays', 'url'=>array('modEssays')),

/*              array('label'=>'Basic', 'url'=>array('modBasic')),
                array('label'=>'Basic Academic/Scores', 'url'=>array('modScores')),
                array('label'=>'Subjects Studied', 'url'=>array('modSubjects')),
                array('label'=>'SAT II Scores', 'url'=>array('modSat2')),
                array('label'=>'AP Scores', 'url'=>array('modAp')),
                array('label'=>'Sports', 'url'=>array('modSports')),
                array('label'=>'Extracurriculars', 'url'=>array('modExtracurriculars')),
                array('label'=>'Non-Athletic Competitions', 'url'=>array('modCompetitions')),
                array('label'=>'Essays', 'url'=>array('modEssays')),
 */               
                
                
                );
        }
        
	/*
		* Include Js files for Dynamic row
		* 
	*/	
		
	public function IncludeJsDynamicrows(){
	
		$baseUrl = Yii::app()->baseUrl; 
		$cs = Yii::app()->getClientScript();
		$cs->registerScriptFile($baseUrl.'/js/jquery.calculation.min.js');
		$cs->registerScriptFile($baseUrl.'/js/jquery.format.js');
		$cs->registerScriptFile($baseUrl.'/js/template.js');
		$cs->registerScriptFile($baseUrl.'/js/validation.js');
		
	
	}	
	
          public function actionSat1(){
	  	  $myID = Yii::app()->user->id;
                
                $scoreProfile=ScoreProfile::model()->findByPk($myID);
                $academicProfile=AcademicProfile::model()->findByPk($myID);
                
		if($scoreProfile===null)
                {                
                        $scoreProfile=new ScoreProfile;
                }
		if($academicProfile===null)
                {                
                        $academicProfile=new AcademicProfile;
                }                
                      
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['ScoreProfile']))||(isset($_POST['AcademicProfile'])))
		{
                        // Set the Profile model class attributes in a bulk ma  nner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$scoreProfile->attributes=$_POST['ScoreProfile'];
                        if (isset($_POST['AcademicProfile'])){                               
                                $academicProfile ->attributes=$_POST['AcademicProfile'];
                                $valid = $academicProfile->validate();        
                                $valid = $scoreProfile->validate() && $valid;          
                                if ($valid)
                                {
                                    $scoreProfile->save(true);
									// Set this Form Completed 
									$this->formStatus('sat1');
									
                                    $academicProfile->save(true);
																	
									
                                    Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                                     $this->redirect(array('act',));   
                                }
                        }
                        else{     
                                if ($scoreProfile->validate())
                                {
                                    $scoreProfile->save(true);
									
									// Set this Form Completed 
									$this->formStatus('sat1');
									
                                    Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                                     $this->redirect(array('act',));   
                                }
                        }



		}	  
		
		$this->render('_scores_sat1',array('academicProfile'=>$academicProfile,'scoreProfile'=>$scoreProfile));
		
	  	
	  }
	 
 	  public function actionAct(){
	  
	  	  $myID = Yii::app()->user->id;
                
                $scoreProfile=ScoreProfile::model()->findByPk($myID);
                $academicProfile=AcademicProfile::model()->findByPk($myID);
                
		if($scoreProfile===null)
                {                
                        $scoreProfile=new ScoreProfile;
                }
		if($academicProfile===null)
                {                
                        $academicProfile=new AcademicProfile;
                }                
                      
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['ScoreProfile']))||(isset($_POST['AcademicProfile'])))
		{
                        // Set the Profile model class attributes in a bulk ma  nner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$scoreProfile->attributes=$_POST['ScoreProfile'];
                        if (isset($_POST['AcademicProfile'])){                               
                                $academicProfile ->attributes=$_POST['AcademicProfile'];
                                $valid = $academicProfile->validate();        
                                $valid = $scoreProfile->validate() && $valid;          
                                if ($valid)
                                {
                                    $scoreProfile->save(true);
                                    // Set this Form Completed 
                                    $this->formStatus('act');
									
                                    $academicProfile->save(true);
                                    Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                                     $this->redirect(array('modScoreTabs',));   
                                }
                        }
                        else{     
                                if ($scoreProfile->validate())
                                {
                                    $scoreProfile->save(true);
									
									// Set this Form Completed 
									$this->formStatus('act');
									
									
                                    Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                                     $this->redirect(array('sat2',));   
                                }
                        }



		}	  
		
	  	$this->render('_scores_act',array('academicProfile'=>$academicProfile,'scoreProfile'=>$scoreProfile));
	  	
	  }

 	  public function actionSat2(){
	  
	  
	  			$myID = Yii::app()->user->id;
	  	         $sat2Profile=new Sat2Profile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sat2Profile']))
		{
		
			$sat2Profile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
						
			foreach($_POST['Sat2Profile'] as $form){			
				$sat2Profile->attributes= $form;
	
							$valid = $sat2Profile->validate();                  
							if ($valid)
							{
								$sat2Profile->save(true);
								// Set this Form Completed 
								$this->formStatus('sat2');
									
								unset($sat2Profile);
								$sat2Profile = new Sat2Profile;
								Yii::app()->user->setFlash('sat2Success',"Info saved!" );
				 
							}
			}
			// ReDirect Finally
			$this->redirect(array('ap',));   				
		}
	  	
			$this->render('_sat2',array('sat2Profile'=>$sat2Profile));
		
	  }
 	  public function actionAp(){
	  
	  		 $myID = Yii::app()->user->id;	
	  	     $apProfile=new ApProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ApProfile']))
		{
		
			$apProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			foreach($_POST['ApProfile'] as $form){					
				$apProfile->attributes = $form;
	
							$valid = $apProfile->validate();                  
							if ($valid)
							{
								$apProfile->save(true);
								// Set this Form Completed 
								$this->formStatus('ap');
								
								unset($apProfile);
								$apProfile = new ApProfile;
								Yii::app()->user->setFlash('apSuccess',"Info saved!" );
								  
							}
	 	   }
		    $this->redirect(array('toefl',));
		     
		}  
		
		
	  		$this->render('_ap', array('apProfile'=>$apProfile));
	  }
	  
        
 	  public function actiontoefl(){
	  
	  	  $myID = Yii::app()->user->id;
                
                $scoreProfile=ScoreProfile::model()->findByPk($myID);
                
		if($scoreProfile===null)
                {                
                        $scoreProfile=new ScoreProfile;
                }
          
                      
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['ScoreProfile'])))
		{
                        // Set the Profile model class attributes in a bulk ma  nner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			$scoreProfile->attributes=$_POST['ScoreProfile'];
  
                                if ($scoreProfile->validate())
                                {
                                    $scoreProfile->save(true);
									
                                    // Set this Form Completed 
                                    $this->formStatus('toefl');
									
                                    Yii::app()->user->setFlash('scoreSuccess',"" );
                                     $this->redirect(array('grades',));   
                                }
                        }



			  
		
		$this->render('_toefl',array('scoreProfile'=>$scoreProfile));
		
	  	
	  }
          
          
	public function actionGrades(){
		
			 $myID = Yii::app()->user->id;
			  $academicProfile=AcademicProfile::model()->findByPk($myID);
	
			  if($academicProfile===null){
			      $academicProfile=new AcademicProfile;
              }
			  if(isset($_POST['AcademicProfile']))
		{
                        // Set the Profile model class attributes in a bulk ma  nner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			//$scoreProfile->attributes=$_POST['ScoreProfile'];
                        $academicProfile->attributes=$_POST['AcademicProfile'];

                        //$valid = $scoreProfile->validate();          
                        $valid = $academicProfile->validate()/* && $valid*/;
                        if ($valid)
                        {
                          //  $scoreProfile->save(true);
                            $academicProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('grades');
							
                            Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                             $this->redirect(array('subjects',));   
                        }

		}      
		
		$this->render('_grades',array('academicProfile'=>$academicProfile));
	}	
	
	
		public function actionSubjects(){
		
			 $myID = Yii::app()->user->id;		
		 $subjectProfile=new SubjectProfile;
		 
		 	if(isset($_POST['SubjectProfile']))
		{
		
			$subjectProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
		
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
						
			
			foreach($_POST['SubjectProfile'] as $form){	
			$subjectProfile->attributes	=	$form;

                        $valid = $subjectProfile->validate();                  
                        if ($valid)
                        {
                            $subjectProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('subjects');
							
                            unset($subjectProfile);
                            $subjectProfile = new SubjectProfile;
                            Yii::app()->user->setFlash('subjectSuccess',"Info saved!" );
                            
                        }
			}
					
		// Re - direct Finally
			 
			  $this->redirect(array('competitions',));  				 				

		}
           				
				
		$this->render('_subjects',array('subjectProfile'=>$subjectProfile));
		
	  }
	  
	  public function actionCompetitions(){
	  
	  	$myID = Yii::app()->user->id;	
	  
	  	$competitionProfile=new CompetitionProfile;
		  
        if(isset($_POST['CompetitionProfile']))
		{
			$competitionProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
						
			foreach($_POST['CompetitionProfile'] as $form){				
			$competitionProfile->attributes	=	$form;

                        $valid = $competitionProfile->validate();                  
                        if ($valid)
                        {
                            $competitionProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('competitions');
							
                            unset($competitionProfile);
                            $competitionProfile = new CompetitionProfile;
                            Yii::app()->user->setFlash('competitionSuccess',"Info saved!" );
                           
                        }
			}
			// Re-direct finally
			  $this->redirect(array('awardshonors',));  			

		}
		
	   $this->render('_competitions',array('competitionProfile'=>$competitionProfile));
	   
	  }
	  
	  
	  public function actionAwardshonors(){
	  
	  		$myID = Yii::app()->user->id;	
	  	     $awardProfile=new AwardProfile;
		if(isset($_POST['AwardProfile'])){
		
			$awardProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			foreach($_POST['AwardProfile'] as $form){		
				$awardProfile->attributes= $form;

                        $valid = $awardProfile->validate();                  
                        if ($valid)
                        {
                            $awardProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('awardhonours');
							
                            unset($awardProfile);
                            $awardProfile = new AwardProfile;
                            Yii::app()->user->setFlash('awardSuccess',"Info saved!" );
             
                        }
			}
			
			$this->redirect(array('clubs',)); 			

		}
		
	  	$this->render('_awardshonors',array('awardProfile'=>$awardProfile));
	  
	  }
	  
	  
	
	  
	   public function actionClubs(){
	   	
		
	   	$myID = Yii::app()->user->id;
		$activityProfile=new ActivityProfile;
		if(isset($_POST['ActivityProfile'])){
		
			$activityProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
		
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			foreach($_POST['ActivityProfile'] as $form){				
				
				$activityProfile->attributes	=	$form;
	
							$valid = $activityProfile->validate();                  
							if ($valid)
							{
								$activityProfile->save(true);
								// Set this Form Completed 
								$this->formStatus('clubs');
								
								unset($activityProfile);
								$activityProfile = new ActivityProfile;
								Yii::app()->user->setFlash('activitySuccess',"Info saved!" );								 
							}
					
			}
			$this->redirect(array('sports',));  			

		}
		
	   	$this->render('_clubs', array('activityProfile'=>$activityProfile));
	   }
	   
	   
	   
	   public function actionSports()
           {
		
                $myID = Yii::app()->user->id;
                $sportProfile=new SportProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SportProfile']))
		{
			$sportProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			foreach($_POST['SportProfile'] as $form){			
						$sportProfile->attributes = $form;

                        $valid = $sportProfile->validate();                  
                        if ($valid)
                        {
                            $sportProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('sports');	
							
                            unset($sportProfile);
                            $sportProfile = new SportProfile;
                            Yii::app()->user->setFlash('sportSuccess',"Info saved!" );
                           
                        }
			}	
		 $this->redirect(array('music',)); 		
		 

		}
		
			$this->render('_sports', array('sportProfile'=>$sportProfile));
	   }
	   
	    public function actionMusic(){
			
			 $myID = Yii::app()->user->id;
			 $musicProfile=new MusicProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MusicProfile']))
		{
			$musicProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
				foreach($_POST['MusicProfile'] as $form){					
				$musicProfile->attributes = $form;

                        $valid = $musicProfile->validate();                  
                        if ($valid)
                        {
                            $musicProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('music');	
							
                            unset($musicProfile);
                            $musicProfile = new MusicProfile;
                            Yii::app()->user->setFlash('musicSuccess',"Info saved!" );
                               
                        }
			}	
			
			$this->redirect(array('work',)); 		

		}
		
		$this->render('_music', array('musicProfile'=>$musicProfile));	
	   
	   }

	    public function actionWork(){
		
			   $myID = Yii::app()->user->id;
			   $workProfile=new WorkProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WorkProfile']))
		{
			$workProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			foreach($_POST['WorkProfile'] as $form){	
			
				
				$workProfile->attributes	=	$form;
						
                        $valid = $workProfile->validate();						
						if ($valid)
                        {   
							$workProfile->comments = $form['comments'];        
							$workProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('work');
							
                            unset($workProfile);
                            $workProfile = new WorkProfile;
                            Yii::app()->user->setFlash('workSuccess',"Info saved!" );
                             
                        }
			}
			
				$this->redirect(array('volunteer',));   				

		}             

	    $this->render('_work', array('workProfile'=>$workProfile));	
			
	   } 
	   
	              
           
           
	    public function actionVolunteer(){
						 $myID = Yii::app()->user->id;
			           $volunteerProfile=new VolunteerProfile;  
					   
					           
					 // print_r( $volunteerProfile);exit;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VolunteerProfile']))
		{
					$volunteerProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
						
					foreach($_POST['VolunteerProfile'] as $form){
							
						$volunteerProfile->attributes = $form;
						
						$valid = $volunteerProfile->validate();                  
						
							if ($valid)
							{
							   // Volunteer name and comments
								$volunteerProfile->name = $form['name'];
								$volunteerProfile->comments = $form['comments'];
								
								$volunteerProfile->save(true);
								// Set this Form Completed 
								$this->formStatus('volunteer');	
								
								unset($volunteerProfile);
								$volunteerProfile = new VolunteerProfile;
								Yii::app()->user->setFlash('volunteerSuccess',"Info saved!" );
								 
							}
					}	
					
				$this->redirect(array('extracurricular',));   	
		}
		
	   	$this->render('_volunteer', array('volunteerProfile'=>$volunteerProfile));	
	   }
	   
           
           

	  
	   public function actionResearch(){
	   
	   		  $myID = Yii::app()->user->id;	
		     $researchProfile=new ResearchProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ResearchProfile']))
		{
			$researchProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
		foreach($_POST['ResearchProfile'] as $form){				
			$researchProfile->attributes	=	$form;

                        $valid = $researchProfile->validate();                  
                        if ($valid)
                        {
                            $researchProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('extracurricular');
							
                            unset($researchProfile);
                            $researchProfile = new ResearchProfile;
                            Yii::app()->user->setFlash('researchSuccess',"Info saved!" );
        
                        }
		}
		                     $this->redirect(array('summer',));   				

		} 
	   	
	   	$this->render('_research', array('researchProfile'=>$researchProfile));	
	   } 
 		
	   public function actionSummer(){
	   		
			 $myID = Yii::app()->user->id;	
	   	   $summerProfile=new SummerProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SummerProfile']))
		{
			$summerProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
				foreach($_POST['SummerProfile'] as $form){				
				$summerProfile->attributes	=	$form;

                        $valid = $summerProfile->validate();                  
                        if ($valid)
                        {
                            $summerProfile->save(true);
							// Set this Form Completed 
							$this->formStatus('extracurricular');
							
                            unset($summerProfile);
                            $summerProfile = new SummerProfile;
                            Yii::app()->user->setFlash('summerSuccess',"Info saved!" );
                              
                        }
				}	
			 $this->redirect(array('Extra',)); 			

		} 

	   	$this->render('_summer', array('summerProfile'=>$summerProfile));	
	   }				  
	
	public function actionExtra(){
	
		 $myID = Yii::app()->user->id;	
	  $otherProfile=new OtherProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OtherProfile']))
		{
			$otherProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			foreach($_POST['OtherProfile'] as $form){			
							
				$otherProfile->attributes	=	$form;
	
							$valid = $otherProfile->validate();                  
							if ($valid)
							{
								$otherProfile->save(true);								
								
								unset($otherProfile);
								$otherProfile = new OtherProfile;
								Yii::app()->user->setFlash('otherSuccess',"Info saved!" );

							}
			 }
		  $this->redirect(array('modEssays',));    
		}        
	
	$this->render('_extracurr_other', array('otherProfile'=>$otherProfile));
	}
	
	public function actionModEssays()
	{
		$myID = Yii::app()->user->id;	
		$essayProfile = new EssayProfile;


            if(isset($_FILES['EssayProfile'])){
		
				
				$validUpload = false;
			// Check any values are valid
			foreach($_FILES['EssayProfile']['name'] as $name){
				if(!empty($name['mime'])){
					$validUpload = true;
				}
			}
			
			if($validUpload){
				// delete old files		
				if(is_dir(Yii::app()->params['uploadDirEssay'].$myID)){	
					foreach($this->findFiles(Yii::app()->params['uploadDirEssay'].$myID) as $files){
						unlink(Yii::app()->params['uploadDirEssay'].$myID.'/'.$files);				
					}	
				}
				// delete old files in DB
			//	$essayProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));			
			
				//upload new files			
				for($i =0;$i< count($_FILES['EssayProfile']['name']);$i++){	 					
				
					if(!empty($_POST['EssayProfile'][$i]['name']) ){
						$filename = $_FILES['EssayProfile']['name'][$i]['mime'];	
						!is_dir(Yii::app()->params['uploadDirEssay']."/".$myID)?mkdir(Yii::app()->params['uploadDirEssay']."/".$myID,777):'';			
						$this->upload($_FILES['EssayProfile']['tmp_name'][$i]['mime'],Yii::app()->params['uploadDirEssay'].$myID.'/'.$filename);
						
						$essayProfile->attributes = $_POST['EssayProfile'][$i];													
						$essayProfile->mime =  $filename;
						$essayProfile->name = $_POST['EssayProfile'][$i]['name'];
						$essayProfile->size = $_FILES['EssayProfile']['size'][$i]['mime'];
						$essayProfile->user_id = $myID;					
						$essayProfile->save(false);
						// Set this Form Completed 
						$this->formStatus('essay');				
						unset($otherProfile);
					   $essayProfile = new EssayProfile;
					}   
				}
			
			}
			
			//$this->redirect(array('consult',));    
			  
		}	
		
		
		$this->render('modEssays',array(
			'essayProfile'=>$essayProfile,
		));
	}
        
	
	public function actionDeleteessay($id){
		EssayProfile::model()->deleteBypk($id);
		$this->redirect(array('modEssays'));
	}
        
	/**
	 * @return array filename
	 */
	public function findFiles($dir)
	{
		return array_diff(scandir($dir), array('.', '..'));
	}
	
	/*
	/*
		Upload New files
	*/
	public function upload($from,$to){
		move_uploaded_file($from,$to);	
	}

	/*	
		*To control the forms to be filled in Extra Curricular 
		
	*/
	public function actionExtracurricular(){
		
		
		$myID = Yii::app()->user->id;
		

					
		// Work
		  $workProfile=new WorkProfile;
		  $workCheck = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WorkProfile']))
		{
			$workProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			foreach($_POST['WorkProfile'] as $form){	
			
				
				$workProfile->attributes	=	$form;
						
                        $valid = $workProfile->validate();						
						if ($valid)
                        {   
							$workProfile->comments = $form['comments'];        
							$workProfile->save(true);
							// Set this Form Completed 
								$this->formStatus('extracurricular');
								
                            unset($workProfile);
                            $workProfile = new WorkProfile;
                            Yii::app()->user->setFlash('workSuccess',"Info saved!" );
                            //$workCheck = true; 
                        }
			}

		}     
		
		 $researchProfile=new ResearchProfile;
		 $researchCheck = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ResearchProfile']))
		{
			$researchProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
		foreach($_POST['ResearchProfile'] as $form){				
			$researchProfile->attributes	=	$form;

                        $valid = $researchProfile->validate();                  
                        if ($valid)
                        {
                            $researchProfile->save(true);
							// Set this Form Completed 
								$this->formStatus('extracurricular');
                            unset($researchProfile);
                            $researchProfile = new ResearchProfile;
                            Yii::app()->user->setFlash('researchSuccess',"Info saved!" );
        					//$researchCheck = true;
                        }
			}
		                   			

		}	
		
		
		// Summer
		  $summerProfile=new SummerProfile;
		  $summerCheck = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SummerProfile']))
		{
			$summerProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
				foreach($_POST['SummerProfile'] as $form){				
				$summerProfile->attributes	=	$form;

                        $valid = $summerProfile->validate();                  
                        if ($valid)
                        {
                            $summerProfile->save(true);
							// Set this Form Completed 
								$this->formStatus('extracurricular');
                            unset($summerProfile);
                            $summerProfile = new SummerProfile;
                            Yii::app()->user->setFlash('summerSuccess',"Info saved!" );
                           // $summerCheck = true;  
                        }
				}	
		
		} 
		
		// Extra
		 $otherProfile=new OtherProfile;
		 $otherCheck = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OtherProfile']))
		{
			$otherProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
			foreach($_POST['OtherProfile'] as $form){			
							
				$otherProfile->attributes	=	$form;
	
							$valid = $otherProfile->validate();                  
							if ($valid)
							{
								$otherProfile->save(true);
								// Set this Form Completed 
								$this->formStatus('extracurricular');
								unset($otherProfile);
								$otherProfile = new OtherProfile;
								Yii::app()->user->setFlash('otherSuccess',"Info saved!" );
							//	$otherCheck = true;
							}
			 }
		  
		} 
		
		// After save all forms
if(isset($_POST['ActivityProfile'])  || isset($_POST['ResearchProfile']) || isset($_POST['SummerProfile']) || isset($_POST['OtherProfile']) ){
	$this->redirect(array('modEssays',));	
}
				
		
		$this->render('extracurricular',array(			
			'researchProfile'=>$researchProfile,'researchCheck'=>$researchCheck,
			'summerProfile'=>$summerProfile,'summerCheck'=>$summerCheck,
			'otherProfile'=>$otherProfile,'otherCheck'=>$otherCheck
			
		));		
	
	}
	
	public function actionCongratulation(){	
		$this->render('congratulation');
	}

   public function actionConsult(){		
		
          $myID = Yii::app()->user->id;
			
			$consult = Consult::model()->find('user_id=:user_id',array(':user_id'=>$myID));			
			
			if($consult == null){
	            $consult = new Consult;
			}
		
		if(isset($_POST['Consult'])){
			$consult->attributes	=	$_POST['Consult'];
			$consult->user_id = $myID ;			
			//print $_POST['Exclusive']['consultValue'];exit;
			$consult->consultValue = $_POST['Consult']['consultValue'];
			// Check whether Check box is checked or Not			
			$valid = $consult->validate();	
			if ($valid){
				$consult->save(true);
				// Set this Form Completed 
				$this->formStatus('consult');
				$this->redirect(array('verify'));  
			}
		}
		$this->render('consult',array('consult'=>$consult));
		
		
    }        
	   public function actionReferrals(){
	   		
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
		$this->render('_referrals',array(
					  'referFriend'=>$referFriend,
					  'count'=>$count_referrals_used				  
		)); 
	}
	
   

        public function actionVerify()
        {
	   		
            $myID = Yii::app()->user->id;
            $verifyProfile=VerifyProfile::model()->findByPk($myID);
                         
            if($verifyProfile===null){    
                $verifyProfile=new VerifyProfile;
            }
            if(isset($_POST['VerifyProfile'])){
			
                $verifyProfile->attributes=$_POST['VerifyProfile'];

                $valid = $verifyProfile->validate()/* && $valid*/;
                if ($valid){                       
                    $verifyProfile->save(true);
                    // Set this Form Completed 
                    $this->formStatus('verify');
                    $this->redirect(array('exclusivity',));   
                }

                    
            }      
            $this->render('_verify',array('verifyProfile'=>$verifyProfile));	
        }	

        public function actionExclusivity()
        {		
		
            $myID = Yii::app()->user->id;
			
	$exclusive = Exclusive::model()->find('user_id=:user_id',array(':user_id'=>$myID));			
			
			if($exclusive == null){
	            $exclusive = new Exclusive;
			}
			
			
            if(isset($_POST['Exclusive'])){
                $exclusive->attributes = $_POST['Exclusive'];
                $exclusive->user_id = $myID ;			
                //print $_POST['Exclusive']['exclusiveValue'];exit;
                $exclusive->exclusiveValue = $_POST['Exclusive']['exclusiveValue'];
                // Check whether Check box is checked or Not			
                $valid = $exclusive->validate();	
                if ($valid){
                    $exclusive->save(true);

                    // Set this Form Completed 
                    $this->formStatus('exclusivity');
                    $this->redirect(array('referrals'));  
                }
            }
            $this->render('exclusive',array('exclusive'=>$exclusive));
        }

    public function actionSummary()
{			
		$this->formStatus('summary');
			
		$this->render('_summary', array(''));
		
    }      
    
    
/*
	This is Function For Proress Bar
*/	

	public function progressbar($main='Personal',$sub='basic')
	{	
		
		$myID = Yii::app()->user->id;
		$value =  0 ;
		
		$formsObj = new FormStatus;
		$forms = $formsObj->find('user_id=:user_id', array(':user_id'=>$myID));
		//Set 0 
		
		
		
		if(!empty($forms)){
		
			$PersonalInfo   = (	$forms->basic + 
								$forms->demographics+ 
								$forms->university+
								$forms->admittance+
								$forms->languages
							);
			$Academics	    = ( $forms->grades+
							    $forms->subjects+
							    $forms->competitions+
							    $forms->awardhonours
							  );
							   	
			$testScore	   =( $forms->sat1+
							  $forms->act+
							  $forms->sat2+
							  $forms->ap+
                              $forms->toefl
							 );
							   
			$extraCurricular1	= (
								  $forms->clubs+
								  $forms->music+
								  $forms->sports+
                                  $forms->work+
								  $forms->volunteer
							  ); 
							  
			$extraCurricular2 =   $forms->extracurricular;
							 
							  
			$essay    	    =  $forms->essay;	
			
			$finish	= (
                                                  $forms->consult+
                                                  $forms->referrals+
                                                  $forms->verify+
                                                  $forms->exclusivity+
                                                  $forms->summary						  
							  ); 
				
			 $PersonalInfo  =     round((100*$PersonalInfo ) / 5);
			 $Academics  =     round((100*$Academics ) / 4); 
			 $testScore  =     round((100*$testScore ) / 5); 
			 $extraCurricular1  =     round((100*$extraCurricular1 ) / 5);
			 $extraCurricular2  =     round((100*$extraCurricular2 ) / 1);  
			 $extraCurricular   = ($extraCurricular1 + $extraCurricular2 )/2;  
			 $essay  =     round((100*$essay ) / 1);
                         $finish = round((100*$finish) / 4);
			
			// Get the Over all Percentage 	  
			 $OverAll = round((( $PersonalInfo +  $Academics  +  $testScore + $extraCurricular + $essay) / 5 ));
			 			  
		}else{
		
		$PersonalInfo = 0 ;
		$Academics	  = 0 ;
		$testScore    = 0 ;
		$extraCurricular = 0 ;
		$essay		 = 0 ;
                $finish = 0;
		$OverAll         = 0 ;
		// Forms under the Profile 
	//	$forms->basic = 0;
	//	$forms->demographics = 0 ;
	//	$forms->university = 0 ;
	//	$forms->admittance = 0 ;
	//	$forms->languages = 0 ;
		
	//	$forms->grades = 0 ;
	//	$forms->subjects = 0 ;
	//	$forms->competitions = 0 ;
	//	$forms->awardhonours = 0;
		
	//	$forms->sat1 = 0 ;
	//	$forms->act  = 0 ;
	//	$forms->sat2 = 0 ;
	//	$forms->ap   = 0 ;  
	//	$forms->clubs = 0 ;
	//	$forms->music = 0 ;
	//	$forms->sports = 0 ;
	//	$forms->extracurricular = 0 ;
		
	//	$forms->essay = 0;
		
		
		
		
		}
			
		$progressbarColor = "#999999";		   
		
	  
	  // Get the Class  
	  	$basic		  = $this->ClassSelector(@$forms->basic,'basic',$sub); 
		$demographics = $this->ClassSelector(@$forms->demographics,'demographics',$sub); 
        $university   = $this->ClassSelector(@$forms->university,'university',$sub); 
	  	$admittance   = $this->ClassSelector(@$forms->admittance,'admittance',$sub); 
	  	$languages    = $this->ClassSelector(@$forms->languages,'languages',$sub); 		
		// Academics		
		$grades			  = $this->ClassSelector(@$forms->grades,'grades',$sub);
		$subjects		  = $this->ClassSelector(@$forms->subjects,'subjects',$sub);
		$competitions	  = $this->ClassSelector(@$forms->competitions,'competitions',$sub); 
		$awardhonours	  = $this->ClassSelector(@$forms->awardhonours,'awardshonors',$sub);
		// TestScore 		
		$sat1 = $this->ClassSelector(@$forms->sat1,'sat1',$sub);
		$act  = $this->ClassSelector(@$forms->act,'act',$sub);
		$sat2  = $this->ClassSelector(@$forms->sat2,'sat2',$sub);
		$ap  = $this->ClassSelector(@$forms->ap,'ap',$sub);
        $toefl = $this->ClassSelector(@$forms->toefl,'toefl',$sub);
		// 
		 $clubs = $this->ClassSelector(@$forms->clubs,'clubs',$sub);
		 $sports = $this->ClassSelector(@$forms->sports,'sports',$sub);
         $music = $this->ClassSelector(@$forms->music,'music',$sub);
		 $work  = $this->ClassSelector(@$forms->work,'work',$sub);
         $volunteer  = $this->ClassSelector(@$forms->volunteer,'volunteer',$sub);                 
		 $extracurricular = $this->ClassSelector(@$forms->extracurricular,'extracurricular',$sub);
		// Essay
		$essayStatus = $this->ClassSelector(@$forms->essay,'essay',$sub);
                // Essay
		$consult = $this->ClassSelector(@$forms->consult,'consult',$sub);
                $referrals = $this->ClassSelector(@$forms->referrals,'referrals',$sub);
		$verify = $this->ClassSelector(@$forms->verify,'verify',$sub);
                $exclusivity = $this->ClassSelector(@$forms->exclusivity,'exclusivity',$sub);
                $summary = $this->ClassSelector(@$forms->summary,'summary',$sub);
		// Select main Tab
		$personalinfoTab = $this->mainTabClassSelector($main,'Personalinfo');
		$academicsTab    = $this->mainTabClassSelector($main,'Academics');
		$testscoreTab    = $this->mainTabClassSelector($main,'TestScore');	
		$ecTab			 = $this->mainTabClassSelector($main,'EC');
		$essayTab		 = $this->mainTabClassSelector($main,'Essay');
        $summaryTab		 = $this->mainTabClassSelector($main,'Summary');
        $finishTab		 = $this->mainTabClassSelector($main,'Finish');
        
		
	 	
	  $this->renderPartial('_status',array(
	  	    'PersonalInfo'=>$PersonalInfo,			
			'basic'=>$basic,
			'demographics'=>$demographics,
			'university'=>$university,
			'admittance'=>$admittance,
			'languages'=>$languages,
			'personalinfoTab'=>$personalinfoTab,			
                        'Academics'=>$Academics,
			'grades'=>$grades,
			'subjects'=>$subjects,
			'competitions'=>$competitions,
			'awardhonours'=>$awardhonours,
			'academicsTab'=>$academicsTab,
			'testScore'=>$testScore,
			'sat1'=>$sat1,
			'act'=>$act,
			'sat2'=>$sat2,
			'ap'=>$ap,
            'toefl'=>$toefl,
			'testscoreTab'=>$testscoreTab,
	    	'extraCurricular'=>$extraCurricular,
			'clubs'=>$clubs,
			'sports'=>$sports,
			'music'=>$music,
            'work'=>$work,
            'volunteer'=>$volunteer,
			'extracurricular'=>$extracurricular,	
			'ecTab'	=>$ecTab,
	    	'essay'=>$essay,
			'essayStatus'=>$essayStatus,
			'essayTab'=>$essayTab,
                        'consult'=>$consult,
                        'referrals'=>$referrals,
                        'verify'=>$verify,
                        'exclusivity'=>$exclusivity,
                        'summaryTab'=>$summaryTab,
                        'summary'=>$summary,
                        'finishTab'=>$finishTab,	
                        'OverAll'=>$OverAll,
			'color'=>$progressbarColor,
			'Tab'=>$this->Tab($main)		
	  ));	
		
	}
	
	// Set the status of the Form Completed 
	
	public function formStatus($formName){
	 	
		 $formsObj = new FormStatus;
		 $myID = Yii::app()->user->id;		 
		 $forms = $formsObj->find('user_id=:user_id', array(':user_id'=>$myID));
		// if record Exist  save the Form complete status 
		 if(!empty($forms)){		 
		 	$forms->$formName = 1;
			$forms->save();	
		 // Update If the record for User Exist						
		 }else{				 
		 	$formsObj->user_id = $myID;
			$formsObj->$formName = 1;
			$formsObj->save();
		 }	
	} 
	
	//Generate Error DIv tag
	
	public function ErrorDiv($id,$attributeName){		
		echo '<div class="errorMessage" id="'.$id.'" style="display:none;">'.$attributeName.'  Cannot Left Blank</div>';
	}
	
	// 
	public function ClassSelector($formCompleted,$formName,$action){
	
		if($formName == $action)
			$i = 2;
		elseif($formCompleted)
			$i = 1;
		else 
			$i = 0 ;	
		
		
			
		switch ($i){
		
			case 1:
				return  'disabled';break; //return  'done';break;
			case 2:
				return 'selected';break;
			case 0:
				return 'disabled';break;			
			default:	
				return 'disabled';break;			
		}		
	
	}
	
	public function Tab($tab){	
		
		if($tab == 'Personalinfo') return '_personalStatus';
		if($tab == 'Academics') return '_academicsStatus';
		if($tab == 'TestScore') return '_TestScoreStatus';
		if($tab == 'EC') return '_EC';
		if($tab == 'Essay') return '_essayStatus';
                if($tab == 'Summary') return '_SummaryStatus';
                if($tab == 'Finish') return '_FinishStatus';
	}

  public function mainTabClassSelector($tab,$t){
  
  	if($tab == $t) return 'selected';
  	else return 'btn';		
  }
  
  /*
  	Check the forms , flag set or not in Form_status table,
	if the object is empty , return 0 
  	
  */
 	
}


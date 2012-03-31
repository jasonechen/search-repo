<?php

class ProfileeditController extends Controller
{ 
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2_1';

	/**
	 * @return array action filters 
	 */ 
/*	public function beforeAction($action)
        {
             $myID = Yii::app()->user->id; 			 
             $formStatus =  FormStatus::model()->find('user_id=:id',array(':id'=>$myID));            
             if ($formStatus->summary !==1):            
            $this->beginContent('//layouts/column1');            
            else:
                
            $this->beginContent('//layouts/column2');    
            
            endif;
            
        }*/
        public function init()
        {
            UserIdentity::iscorrectTranstype("S");
        }        
        
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
	
		$this->redirect(array('basic'));
		
	}
	
	/**
	* 
	*  returns the array with all the forms in the order 
	*/
	
	
	  
	public function actionBasic() 
	{
		
        $myID = Yii::app()->user->id;
    
        $personalProfile=PersonalProfile::model()->findByPk($myID);
				
		if($personalProfile===null){                
                        $personalProfile=new PersonalProfile;
      
                };
                
                
        $basicProfile=BasicProfile::model()->findByPk($myID);
		if($basicProfile===null){   					
                        $basicProfile=new BasicProfile;						
                        $basicProfile->initialize($myID);
                }
                else{
                        $basicProfile->curr_university_name = $basicProfile->getCurrUniversityName();
                        $basicProfile->first_university_name = $basicProfile->getFirstUniversityName();
                    //    $basicProfile->high_school_name = $basicProfile->getHighSchoolName();
                        
                        //show preselected multiselect drop down values 
                        for($i=1;$i<=11; $i++) {
                            $fieldName = 'focus_'.$i;    
                            if ($basicProfile->$fieldName == 1)                            
                            $basicProfile->focus[$i] = $i;         
                            }                        
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
                        
                      $valid = $personalProfile->validate();                  
                       $valid = $basicProfile->validate()  && $valid;
     
                       //action for assigning 1 value to focus_i in table based on checkbox
                       
                       if (isset($_POST['BasicProfile']['focus'])) { 
                          for ($i=1;$i<=11; $i++) {
                            $fieldName = 'focus_'.$i;                                                
                            if( in_array($i,$_POST['BasicProfile']['focus']) ) $basicProfile->setAttribute($fieldName, 1);
                            else $basicProfile->setAttribute($fieldName, 0);                                     
                           }                           
                       }   //set all values to zero if no check box
                        else {
                            for ($i=1;$i<=11; $i++) {
                            $fieldName = 'focus_'.$i;
                             $basicProfile->setAttribute($fieldName, 0);
                        }
                        }
					// Change the Date Format
                        if(isset($_POST['PersonalProfile']['date_of_birth'])){					
                                @$OldDateBirth = explode('/',$_POST['PersonalProfile']['date_of_birth']);	// Explode 
                                @$NewDateBirth = $OldDateBirth[2].'-'.$OldDateBirth[0].'-'.$OldDateBirth[1];  	// New Format
                                @$personalProfile->date_of_birth = $NewDateBirth;
                        }
			
                        //Null state value if non US country is chosen
			if($_POST['PersonalProfile']['country_reside'] != '1' &&  isset($_POST['PersonalProfile']['state'] ))
                            {
                            @$personalProfile->state = NULL;
                        }							
					
                        if ($valid)
                        {					
                            $personalProfile->save(false);						
                            $basicProfile->save(true);							
					
						
                            Yii::app()->user->setFlash('basicSuccess',"Info saved!" );
                              $this->redirect(array('user/profile'));      
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
			
				
		$this->render('_personal',array('basicProfile'=>$basicProfile,'personalProfile'=>$personalProfile,));
	
	
		
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
							
                            Yii::app()->user->setFlash('basicSuccess',"Info saved!" );
                             $this->redirect(array('user/profile'));    
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
                        $bprof= $_POST['BasicProfile'];
                       
			$personalProfile->attributes=$_POST['PersonalProfile'];
                        $basicProfile->attributes=$_POST['BasicProfile'];
                       $isTransfer = $bprof['isTransfer'];
                      
                        
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
                                        if($isTransfer)
                                        {
                                            $basicProfile->isTransfer='Y';
                                        }
                                        else
                                        {
                                             $basicProfile->isTransfer='N';
                                             $basicProfile->first_university_id = $basicProfile->curr_university_id;
                                             
                                        }
					//if(isset($_POST['BasicProfile']['isTransfer'])){
					//	$_POST['BasicProfile']['isTransfer']?'' : ($basicProfile->first_university_id = $basicProfile->curr_university_id );
					//}
					
                        if ($valid)
                        {
							
							
                            $personalProfile->save(true);						
                            $basicProfile->save(true);													
							
                            Yii::app()->user->setFlash('basicSuccess',"Info saved!" );
                            $this->redirect(array('user/profile'));   
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
							
                            unset($otherschooladmitProfile);
                            $otherschooladmitProfile = new OtherSchoolAdmitProfile;
                            Yii::app()->user->setFlash('otherschoolSuccess',"Info saved!" );
                                    }
				   }		
				}	
					
			$this->redirect(array('user/profile'));   	
		}
		$this->render('_schooladmits',array('otherschooladmitProfile'=>$otherschooladmitProfile));
	}
			
	public function actionLanguages(){
	
                $myID = Yii::app()->user->id;
		 
		 $languageProfile=new LanguageProfile;
		 		                 
     		if (isset($_POST["yt0"]))
		{  
                    $languageProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID)); 
                     
                
                 if(isset($_POST['LanguageProfile']))
		{
			 /*
		 	* Before inserting the languges Delete the before all records 
			* for the particular User
		 	*/
			 
                        // Set the Profile model class attributes in a bulk manner
                        // For every key in the $_POST['Profile'] array that matches the
                        //   name of a safe attribute in the Profile class, the class's
                        //   attribute is set to the corresponding value in the array.
                        // By default, all underlying database columns except the Primary Key
                        //   are considered safe.
                       
				foreach($_POST['LanguageProfile'] as $form){
				 	
                                        //$fluency=$this->getSelectedFluency($form['fluency']);
                                      // $fluency= $form['fluency'];
                                       //if(@$fluency)
                                    if(!empty ($form)&& @$form['fluency'])
                                        foreach ($form['fluency'] as $key => $value) {
                                          //  print_r($form);
                                            $languageProfile->attributes	= $form;
                                                $languageProfile->fluency=$value;
                                                 //$languageProfile->fluency_type=$fluency;
                                            $valid = $languageProfile->validate();                  
                                            if ($valid)
                                            {
                                                $languageProfile->save(true);

                                                unset($languageProfile);
                                                $languageProfile = new LanguageProfile;
                                                Yii::app()->user->setFlash('langSuccess',"Info saved!" );

                                            }
                                        }
                                        }
                                    //    exit;
                            $this->redirect(array('user/profile'));   	
                }          
                 $this->redirect(array('user/profile'));   	             
                }	
	
            $this->render('_languages',array('languageProfile'=>$languageProfile));
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
                                    $academicProfile->save(true);																	
									
                                    Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                                     $this->redirect(array('user/profile',));   
                                }
                        }
                        else{     
                                if ($scoreProfile->validate())
                                {
                                    $scoreProfile->save(true);
									
                                    Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                                    $this->redirect(array('user/profile'));   
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
									
                                    $academicProfile->save(true);
                                    Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                                    $this->redirect(array('user/profile'));   
                                }
                        }
                        else{     
                                if ($scoreProfile->validate())
                                {
                                    $scoreProfile->save(true);
																		
                                    Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                                     $this->redirect(array('user/profile'));   
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
     		if (isset($_POST["yt0"]))
		{  
                    $sat2Profile->model()->deleteAll('user_id =:id', array(':id'=>$myID));

		if(isset($_POST['Sat2Profile']))
		{
		
			
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
                                            unset($sat2Profile);
                                            $sat2Profile = new Sat2Profile;
                                            Yii::app()->user->setFlash('sat2Success',"Info saved!" );
                                    } 
                                    }
			// ReDirect Finally
			$this->redirect(array('user/profile'));   			
		}
	  	$this->redirect(array('user/profile')); 
          }
	$this->render('_sat2',array('sat2Profile'=>$sat2Profile));
		
	 }
          
 	  public function actionAp(){
	  
        	 $myID = Yii::app()->user->id;	
                $apProfile=new ApProfile;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
     		if (isset($_POST["yt0"]))
                {
		
			$apProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));                    
                
		if(isset($_POST['ApProfile']))
		{

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

                                            unset($apProfile);
                                            $apProfile = new ApProfile;
                                            Yii::app()->user->setFlash('apSuccess',"Info saved!" );

                                    }
	 	   }
		    $this->redirect(array('user/profile'));   
		     
		}  
		$this->redirect(array('user/profile'));   
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
									
                                    Yii::app()->user->setFlash('scoreSuccess',"" );
                                    $this->redirect(array('user/profile'));   
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
							
                            Yii::app()->user->setFlash('scoreSuccess',"Info saved!" );
                            $this->redirect(array('user/profile'));   
                        }
		}      
		
		$this->render('_grades',array('academicProfile'=>$academicProfile));
	}	
	
	
		public function actionSubjects(){
		
		$myID = Yii::app()->user->id;		
		 $subjectProfile=new SubjectProfile;
            
     		if (isset($_POST["yt0"]))
                {
                    $subjectProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                    if(isset($_POST['SubjectProfile']))
		{		
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
                            unset($subjectProfile);
                            $subjectProfile = new SubjectProfile;
                            Yii::app()->user->setFlash('subjectSuccess',"Info saved!" );
                            
                        }
			}					
		// Re - direct Finally 
			$this->redirect(array('user/profile'));   				 				
                	}
                $this->redirect(array('user/profile'));   				 				           				
                }		
		$this->render('_subjects',array('subjectProfile'=>$subjectProfile));
		
	  }
	  
	  public function actionCompetitions(){
	  
            $myID = Yii::app()->user->id;	

            $competitionProfile=new CompetitionProfile;

                if (isset($_POST["yt0"]))
                {		  
                    
		$competitionProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));                
                if(isset($_POST['CompetitionProfile']))
		{

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
							
                            unset($competitionProfile);
                            $competitionProfile = new CompetitionProfile;
                            Yii::app()->user->setFlash('competitionSuccess',"Info saved!" );
                           
                        }
			}
			// Re-direct finally
			$this->redirect(array('user/profile'));   		
                }
			$this->redirect(array('user/profile'));   		                
		}
		
	   $this->render('_competitions',array('competitionProfile'=>$competitionProfile));
	   
	  }
	  
	  
	  public function actionAwardshonors(){
	  
            $myID = Yii::app()->user->id;
            $awardProfile=new AwardProfile;

                if (isset($_POST["yt0"]))
                {       
                    
                $awardProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));  
		if(isset($_POST['AwardProfile'])){			
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
							
                            unset($awardProfile);
                            $awardProfile = new AwardProfile;
                            Yii::app()->user->setFlash('awardSuccess',"Info saved!" );
             
                        }
			}
			
			$this->redirect(array('user/profile'));   			
                }
                $this->redirect(array('user/profile'));   			
		}
		
	  	$this->render('_awardshonors',array('awardProfile'=>$awardProfile));
	  }
	  

	   public function actionClubs(){
	   			
            $myID = Yii::app()->user->id;

            $activityProfile=new ActivityProfile;

            if (isset($_POST["yt0"]))
                {       
                $activityProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                   
                if(isset($_POST['ActivityProfile'])){

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
                                            unset($activityProfile);
                                            $activityProfile = new ActivityProfile;
                                            Yii::app()->user->setFlash('activitySuccess',"Info saved!" );								 
                                    }

			}
			$this->redirect(array('user/profile'));   			
                    }
                $this->redirect(array('user/profile'));   			
		}
		
	   	$this->render('_clubs', array('activityProfile'=>$activityProfile));
	   }
	   
	   
	   
	   public function actionSports()
           {
		
            $myID = Yii::app()->user->id;     

            $sportProfile=new SportProfile;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                if (isset($_POST["yt0"]))
                {       
		$sportProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                if(isset($_POST['SportProfile']))
                
		{
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
							
                            unset($sportProfile);
                            $sportProfile = new SportProfile;
                            Yii::app()->user->setFlash('sportSuccess',"Info saved!" );
                           
                        }
			}	
                    $this->redirect(array('user/profile'));   		
                    }		 
		$this->redirect(array('user/profile'));   		
		}		
    	$this->render('_sports', array('sportProfile'=>$sportProfile));
	   }
	   
	    public function actionMusic(){
			
            $myID = Yii::app()->user->id;
            $musicProfile=new MusicProfile;                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                if (isset($_POST["yt0"]))
                {
                    $musicProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                    if(isset($_POST['MusicProfile']))
                    {
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

                            unset($musicProfile);
                            $musicProfile = new MusicProfile;
                            Yii::app()->user->setFlash('musicSuccess',"Info saved!" );
                               
                        }
			}	
			
			$this->redirect(array('user/profile'));   	
                    }
                    $this->redirect(array('user/profile'));   	
		}		
		$this->render('_music', array('musicProfile'=>$musicProfile));		   
	   }

	    public function actionWork(){
		
            $myID = Yii::app()->user->id;
                
                $workProfile=new WorkProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                if (isset($_POST["yt0"]))
                {
                    $workProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                    if(isset($_POST['WorkProfile']))
		{
			
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

                            unset($workProfile);
                            $workProfile = new WorkProfile;
                            Yii::app()->user->setFlash('workSuccess',"Info saved!" ); 
                            }
			}
                    $this->redirect(array('user/profile'));
                }
		$this->redirect(array('user/profile'));   				
		}             
	    $this->render('_work', array('workProfile'=>$workProfile));	
			
	   } 
	   	                         
           
	    public function actionVolunteer(){

            $myID = Yii::app()->user->id;

            $volunteerProfile=new VolunteerProfile;  					   				           
					 // print_r( $volunteerProfile);exit;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                if (isset($_POST["yt0"]))
                {
                    $volunteerProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));               
                    if(isset($_POST['VolunteerProfile']))
		{					
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

                                                    unset($volunteerProfile);
                                                    $volunteerProfile = new VolunteerProfile;
                                                    Yii::app()->user->setFlash('volunteerSuccess',"Info saved!" );

                                            }
					}			
			$this->redirect(array('user/profile'));   	
                    }
                $this->redirect(array('user/profile'));   	
		}
		
	   	$this->render('_volunteer', array('volunteerProfile'=>$volunteerProfile));	
	   }
	   
     

	  
	   public function actionResearch(){
	   
            $myID = Yii::app()->user->id;	
                 
            $researchProfile=new ResearchProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                if (isset($_POST["yt0"]))
                {
                $researchProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                        
		if(isset($_POST['ResearchProfile']))
		{
		
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
							
                            unset($researchProfile);
                            $researchProfile = new ResearchProfile;
                            Yii::app()->user->setFlash('researchSuccess',"Info saved!" );
        
                        }
		}
                    $this->redirect(array('user/profile'));   				
                }
		    $this->redirect(array('user/profile'));   				

		} 
	   	
	   	$this->render('_research', array('researchProfile'=>$researchProfile));	
	   } 
 		
	   public function actionSummer(){
	   		
		 $myID = Yii::app()->user->id;	

	   	   $summerProfile=new SummerProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                if (isset($_POST["yt0"]))
                {
                    $summerProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                
		if(isset($_POST['SummerProfile']))
		{			
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
							
                            unset($summerProfile);
                            $summerProfile = new SummerProfile;
                            Yii::app()->user->setFlash('summerSuccess',"Info saved!" );
                              
                        }
				}	
                                $this->redirect(array('user/profile'));
                    } 
               $this->redirect(array('user/profile'));
                } 
	   	$this->render('_summer', array('summerProfile'=>$summerProfile));	
	   }				  
	
	public function actionExtra(){
	
            $myID = Yii::app()->user->id;	

	  $otherProfile=new OtherProfile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                if (isset($_POST["yt0"]))
                {
                    $otherProfile->model()->deleteAll('user_id =:id', array(':id'=>$myID));
                
		if(isset($_POST['OtherProfile']))
		{	
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
		$this->redirect(array('user/profile'));     
		}        
            $this->redirect(array('user/profile'));     
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
                                                $essayProfile->topic = $_POST['EssayProfile'][$i]['topic'];
						$essayProfile->name = $_POST['EssayProfile'][$i]['name'];
						$essayProfile->size = $_FILES['EssayProfile']['size'][$i]['mime'];
						$essayProfile->user_id = $myID;					
						$essayProfile->save(false);
						// Set this Form Completed 
	
						unset($essayProfile);
                                                 $essayProfile = new EssayProfile;
					}   
				}
			
			}           //update basic profile model essay count
                                    $basicProfile=BasicProfile::model()->findByPk($myID);
                                    $numEssays = $essayProfile->countByAttributes(array('user_id'=>$myID));

                                    if($basicProfile===null){                
                                            $basicProfile=new BasicProfile;
                                            $basicProfile->initialize($myID);
                                    }

                                    $basicProfile->num_essays = $numEssays;
                                    $basicProfile->save(true);					
                            $this->redirect(array('user/profile'));     
			  
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


 
        
        public function getSelectedFluency($fluency)
        {
            $rtnValue='';
            foreach ($fluency as $key => $value) 
                $rtnValue.= $value.',';
            return $rtnValue;
        }
        
	public function ErrorDiv($id,$attributeName){		
		echo '<div class="errorMessage" id="'.$id.'" style="display:none;">'.$attributeName.'  Cannot Left Blank</div>';
	}        
        
        public function setWizardCSS()
        {
        
                $baseUrl = Yii::app()->baseUrl; 
		$cs = Yii::app()->getClientScript();
                $cs->registerCssFile($baseUrl.'/css/edit-profile.css');
        }
}


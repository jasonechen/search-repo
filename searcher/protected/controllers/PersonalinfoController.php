<?php

	/*
	* This is the controller for  personal information forms
		
	*/

	class PersonalInfoController extends Controller{
	
	
		public function index(){
			print 'hie';exit;
		}
		
		public function actionBasic(){
		// Basic model
			//$basicmodel = new BasicPersonalInfo;
			
			
			$basicProfile= new BasicProfile;
			$basicProfile->user_id = 62;			
			$basicProfile->first_university_id = 1;
			$basicProfile->curr_university_id = 1;
			$basicProfile->highschool_id = 1;
			$basicProfile->num_academics = 0;
			$basicProfile->num_extracurriculars = 0;
			$basicProfile->num_sports = 0;
			$basicProfile->num_competitions = 0;
			$basicProfile->num_essays = 0;
			$basicProfile->num_scores = 0;
			$basicProfile->num_aps = 0;
			$basicProfile->num_sat2s = 0;
			$basicProfile->l1ForSale = 0;
			$basicProfile->l2ForSale = 0;
			$basicProfile->l3ForSale = 0;
			
			
			 print '<pre>';
			
			 $basicProfile->save(false);
				exit;
			
			 		
			

		}
		
	}



?>
<?php

	/*
	* This is the controller for  personal information forms
		
	*/

	class PersonalinfoController extends Controller{
	
	
		public function index(){
			print 'hie';exit;
		}
		
		public function actionBasic(){
		// Basic model
			//$basicmodel = new BasicPersonalinfo;
			
			
			$basicProfile= new BasicProfile;
			$basicProfile->initialize(62);
			
			 print '<pre>';
			
			 $basicProfile->save(false);
				exit;
			
			 		
			

		}
		
	}



?>
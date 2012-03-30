<?php
return array(
	// this is used in contact page
	'adminEmail'=>'info@crowdprep.com',
		//this is used in  forgot password (to send link)
	'siteEmail'=>'registration@crowdprep.com',
	'siteEmailPassword'=>'crowdprep',
	'siteEmailSmtpHost'=>'smtpout.secureserver.net',
	'siteEmailName'=>'CrowdPrep Registration',
	
	'orderEmail'=>'orders@crowdprep.com',
	'orderEmailName'=>'CrowdPrep',
	
	'friendsEmail'=>'friends@crowdprep.com',
	'friendsEmailName'=>'CrowdPrep',
	
	'noReplay'=>'no-reply@crowdprep.com',
	'noReplayName'=>'CrowdPrep',
	//Upload files in this path
	'uploadDirEssay'=>'uploads/essay/',
	//Email Template path
	'emailTemplate'=>'../yii/protected/views/site/elements/',
	//Email Pattern , separated by | symbol , eg: edu|org|com 
	//'emailPattern'=>'edu|com|uk',

	'buyerEmailPattern'=>'edu|com|net',

	'sellerEmailPattern'=>'edu|com',
        //Not Allow mail domain names
        'nt_buyerDomain'=>'yahoo|gmx',
        'nt_sellerDomain'=>'hotmail',

	//Exclusive
	'exclusive_period' => 180,
    
        //Profile Verification
        'upload_max_file'=>2,
        'upload_file_formate'=>'doc|docx|txt|pdf|jpeg|jpg|JPG',
        'pv_file_path'=>'uploads/profilereference/',

	//login attempts
	'max_login_attempt' => 5,
	'account_blocked_time' => 24, // 24 hours

	 //Delete all Referral in active friends
        'referral_exp_weeks' => 3, // 3weeks
);
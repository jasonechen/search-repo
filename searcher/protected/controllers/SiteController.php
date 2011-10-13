<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        public function actionFillRandom()
	{
        
        $CityArray
          = array("New York",
                  "Los Angeles",
                  "San Francisco",
                  "Moscow",
                  "London",
                  "Paris",
               );
        // Loop from 1 to 1000
//        for ($i = 1; $i <= 339; $i++) {
//        for ($i = 340; $i <= 641; $i++) {
//        for ($i = 642; $i <= 800; $i++) {
        for ($i = 801; $i <= 1000; $i++) {
            $firstName = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));
            $lastName = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,10));
            echo $i.' '.$firstName.' '.$lastName."\r\n";
            $emailTemp = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ',10)),0,rand(3,5));
            $username = $firstName.'.'.$lastName;
            $email = $firstName.'.'.$lastName.'@'.$emailTemp.'.COM';
            $race_id = substr(str_shuffle(str_repeat('ABCDEFGH',10)),0,1);
            $religion_id = 'A'.substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRST',10)),0,1);
            $gender = substr(str_shuffle(str_repeat('MF',100)),0,1);
            $hasPets = substr(str_shuffle(str_repeat('YN',100)),0,1);
            $hasChildren = substr(str_shuffle(str_repeat('YN',100)),0,1);
            $gender = substr(str_shuffle(str_repeat('MF',100)),0,1);
            $photo_id = rand(1,8);
            $income_bracket= rand(0,7);
            $photo_id = rand(1,8);
            $education = rand(0,3);
            $city = $CityArray[rand(0,5)];
            $num_hobbies = rand(0,4);
            $birthMonth = rand(1,12);
            $birthDay = rand(1,27);
            if ($birthDay < 10){
                $birthDayString = "0".$birthDay;
            }
            else{
                $birthDayString = $birthDay;
            }
            if ($birthMonth < 10){
                $birthMonthString = "0".$birthMonth;
            }
            else{
                $birthMonthString = $birthMonth;
            }
            $birthYear = 1950+rand(0,40);
            $birthDate = $birthYear."-".$birthMonthString."-".$birthDayString;
            echo ' Email: '.$email."\r\n";
            echo ' Race: '.$race_id."\r\n";
            echo ' Religion: '.$religion_id."\r\n";
            echo ' Gender: '.$gender."\r\n";
            echo ' Has Pets: '.$hasPets."\r\n";
            echo ' Has Children: '.$hasChildren."\r\n";
            echo ' City: '.$city."\r\n";
            echo ' Photo #: '.$photo_id."\r\n";
            echo ' Birthday: '.$birthDate."\r\n";
            
            $myProfile = new Profile;
            $myProfile->id = $i;
            $myProfile->email = $email;
            $myProfile->username = $username;
            $myProfile->FirstName = $firstName;
            $myProfile->LastName = $lastName;
            $myProfile->race_id = $race_id;
            $myProfile->religion_id = $religion_id;
            $myProfile->gender = $gender;
            $myProfile->hasPets = $hasPets;
            $myProfile->hasChildren = $hasChildren;
            $myProfile->education = $education;
            $myProfile->income_bracket = $income_bracket;
            $myProfile->city = $city;
            $myProfile->photo_id = $photo_id;
            $myProfile->num_hobbies = $num_hobbies;
            $myProfile->date_of_birth = $birthDate;
            $myProfile->save(false);         
            $hobbylist = substr(str_shuffle(str_repeat('ABCDEFGH',10)),0,4);
            for ($j = 0; $j < $num_hobbies; $j++) {
                $myHobby = new Hobby;
                $myHobby->user_id = $i;
                $myHobby->hobby_id = "A".substr($hobbylist,$j,1);
                $myHobby->save(false);
            }
 
        }
    
            
	}
}
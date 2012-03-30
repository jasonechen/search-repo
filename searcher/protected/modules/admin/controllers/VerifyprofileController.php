<?php

class VerifyprofileController extends Controller
{
   //$this->layout = 'column2';
   public $layout='//layouts/admin_column2';

   
   public function actionIndex()
   {
    
       
       $condition = 'status=0';
      $dataProvider=new CActiveDataProvider('VerifyProfile',
              array('criteria'=>array('condition'=>$condition,),
      ));

    
       $this->render('/verifyprofile/index',array(
			'dataProvider'=>$dataProvider,
		));
    
	 
   }
   public function actionView($id)
   {
       $verifyProfile = VerifyProfile::model()->findByPk($id);
       $uname = User::model()->findByPk($verifyProfile->user_id);
       if(isset($_POST['VerifyProfile'])){
                $verifyProfile->attributes=$_POST['VerifyProfile'];
                $verifyProfile->ref1_check=$_POST['VerifyProfile']['ref1_check'];
                $verifyProfile->ref2_check=$_POST['VerifyProfile']['ref2_check'];
                $verifyProfile->ref3_check=$_POST['VerifyProfile']['ref3_check'];
                $valid = true;// $verifyProfile->validate()/* && $valid*/;
                if ($valid){                       
                    $verifyProfile->save(true);
                  }
                
                 $this->redirect(array('Index',));
           } 
       $this->render('/verifyprofile/_seller_validate',array(
			'verifyProfile'=>$verifyProfile,'uname'=>$uname->FirstName,
		));
   }
 
     public function actionActive($id)
    {
       
      $model= VerifyProfile::model()->findByPk($id);
      $userid = $model->user_id;
      $basicmodel= BasicProfile::model()->findByPk($userid);
      $model->status=1;
      $basicmodel->verified='Y';
      $model->save();
      $basicmodel->save();
      $this->redirect(array('index'));
      
       
    }
  
}

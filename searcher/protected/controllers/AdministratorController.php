<?php

class AdministratorController extends Controller
{
	public $layout='//layouts/admin_column1';
	public function actionIndex()
	{
           // echo "ete";exit();
           // $myUser = Yii::app()->user;
           $model = new LoginForm(); 
           if(isset ($_POST['LoginForm']))
           {
               $model->attributes = $_POST['LoginForm'];
               if($model->validate()&& $model->login())
               {
                   $usertype = Yii::app()->user->getState('usertype');
                    if($usertype==1)
                    $this->redirect(array('/admin/index')); 
                    else {
                    $this->redirect(array('/site/index'));
                }
                   
               }
           }
           $this->render('/administrator/index',array('model'=>$model));
	}

  
        

		
}

<?php

class CreditsController extends Controller
{
   //$this->layout = 'column2';
   public $layout='//layouts/admin_column2';

   /**
    * Displays a particular model.
    */
   public function actionView()
   {
      
   }

   /**
    * Lists all models.
    */
   public function actionIndex()
   {
       $dataProvider=new CActiveDataProvider('CreditsPackage');
       $this->render('/index/index',array(
			'dataProvider'=>$dataProvider,
		));
      
      //echo "test Admin"; exit();
         //  $data = CreditsPackage::model()->findAll();
          //echo "<pre>";
         //  print_r($model);exit();
	 // $model = new Administrator(); 
         // $this->render('/index/index',array('data'=>$data));
	 
   }

   public function actionCreate()
   {
      //echo "test Admin"; exit();
           $model = new CreditsPackage();
            if(isset($_POST['CreditsPackage']))
            {
                
              $model->attributes = $_POST['CreditsPackage'];
              if($model->save()){
                  $this->redirect(array('index'));
              }
            }
            $this->render('/index/create',array('model'=>$model));
	 
   }
   public function actionUpdate($id)
   {
       $model =  CreditsPackage::model()->findByPk($id);
         if(isset($_POST['CreditsPackage']))
            {
                
              $model->attributes = $_POST['CreditsPackage'];
              if($model->save()){
                  $this->redirect(array('index'));
              }
            }
       $this->render('/index/create',array('model'=>$model));
   }
    public function actionDelete($id)
    {
        $model=  CreditsPackage::model()->findByPk($id);
        if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/index/index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        $model->delete();
        $this->redirect(array('index'));
    }
    public function actionCreditsLimit()
    {
            $model =  SiteConfig::model()->find("sit_keys='MAX_ALLOW_CRDEITS'"); 
                       
            if(isset($_POST['SiteConfig']))
            {
               $model =  SiteConfig::model()->findByPk($model->id);
               $value = $_POST['SiteConfig']['sit_values'];
               $model->sit_values=$value;
               if($model->save()){
                  $this->redirect(array('creditslimit'));
              }
            }
            $this->render('/credits/creditslimit',array('model'=>$model));
    }


      
   
}

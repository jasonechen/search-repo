<?php

class CouponsController extends Controller
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
       
      // $model = new CouponsModel('search');
      // print_r($model);exit();
       $dataProvider=new CActiveDataProvider('CouponsModel');
       $this->render('/coupons/index',array(
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
           $model = new CouponsModel();
            if(isset($_POST['CouponsModel']))
            {
               // echo $_POST['act_fromdate']; exit();
                
               $model->attributes = $_POST['CouponsModel'];
               $model->act_fromdate =$_POST['act_fromdate'];
               $model->act_todate =$_POST['act_todate'];
               $model->save();
                $this->redirect(array('/admin/coupons/'));
              }
            
            $this->render('/coupons/create',array('model'=>$model));
	 
   }
   public function actionUpdate($id)
   {
       $model =  CouponsModel::model()->findByPk($id);
         if(isset($_POST['CouponsModel']))
            {
                
              $model->attributes = $_POST['CouponsModel'];
              $model->act_fromdate =$_POST['act_fromdate'];
               $model->act_todate =$_POST['act_todate'];
              if($model->save()){
                  $this->redirect(array('index'));
              }
            }
       $this->render('/coupons/create',array('model'=>$model));
   }
    public function actionDelete($id)
    {
        $model=  CouponsModel::model()->findByPk($id);
        if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/admin/coupons/index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        $model->delete();
        $this->redirect(array('/admin/coupons/index'));
    }



   public function setAdminMenu()
        {
            $this->menu=array(
                array('label'=>'Account admin', 'url'=>array('admin')),           
                array('label'=>'Buyer', 'url'=>array('indexBuyer')),
                array('label'=>'Seller', 'url'=>array('indexSeller')),
            );
        }
        
        public function actionUpdateAjax()
        {
            $nowdatetime = date('dmyhms');
            echo md5($nowdatetime);
        }
      
   
}

<?php

class UserlistController extends Controller
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
       $type = isset($_GET['type'])?$_GET['type']:'all';
     //  if(!(@$type))
      //  $type='all';
      
      // exit;
        
       $users = User::model()->findAll();
       
       if($type=='B' ||$type=='S' )
       {
           $cnt='transType="'.$type.'"';
       }
       else
           $cnt = 'id > 0';
       $dataProvider=new CActiveDataProvider('User',array('criteria'=>array('condition'=>$cnt)));
       
       $this->render('/userlist/index',array('dataProvider'=>$dataProvider,'type'=>$type,));
    
	 
   }

   
   public function actionUpdate($id)
   {
       //$this->redirect(array('index'));
       $model =  User::model()->findByPk($id);
       $model->setScenario('uedit');
         if(isset($_POST['User']))
            {
                
              $model->attributes = $_POST['User'];
              if($model->save()){
                  $this->redirect(array('index'));
              }
            }
            
       $this->render('/userlist/modifyuser',array('model'=>$model));
   }
    public function actionDelete($id)
    {
        $model= User::model()->findByPk($id);
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
    public function actionApprove($id,$status=1,$type='all')
    {
       
      $model= User::model()->findByPk($id);
      $model->active=$status;
      $model->save();
      $this->redirect(array('index','type'=>$type));
      
       
    }
    
    public function actionExportusers($type)
    {
        $reportName='User List ';
        $rptModel = new ReportsModel();
        $rptModel->genrateUserRpt($reportName, $type);
    }
    
    public function actionDeleteinactivefriends()
    {
        $noOfweek = Yii::app()->params['referral_exp_weeks'];
         $nowDate = date( "Y-m-d H:i:s");
         $expDate = date( "Y-m-d H:i:s", strtotime("-$noOfweek weeks") );
         $cont= "active = 0 and date_referred < '".$expDate."'";
         ReferFriend::model()->deleteAll($cont);
         $this->redirect(array('index'));
    }
    


      
   
}

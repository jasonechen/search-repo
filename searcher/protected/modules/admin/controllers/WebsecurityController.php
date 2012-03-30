<?php

class WebsecurityController extends Controller
{
   //$this->layout = 'column2';
   public $layout='//layouts/admin_column2';

   
   public function actionIndex()
   {
    
        $pid = isset ($_GET['id'])?$_GET['id']:0;
      
      $model = new SiteBlock();
      if($pid)
      {
          $model = SiteBlock::model()->findByPk($pid);
      }
        $model->setScenario('addmail');
       if(isset($_POST['SiteBlock']))
       {   
            $model->attributes = $_POST['SiteBlock'];
            $model->stype='email';
            $model->save();
            $this->redirect(array('index'));
       }
 
        $condition = 'stype="email"';
        $dataProvider=new CActiveDataProvider('SiteBlock', array(
        'criteria'=>array( 'condition'=>$condition)));
        $this->render('/websecurity/index',array(
			'dataProvider'=>$dataProvider,'model'=>$model,
		));
    
	 
   }
   public function actionIpaddress()
   {
       $pid = isset ($_GET['id'])?$_GET['id']:0;
      
      $model = new SiteBlock();
      if($pid)
      {
          $model = SiteBlock::model()->findByPk($pid);
      }
        
       if(isset($_POST['SiteBlock']))
       {   
            $model->setScenario('addip');
            $model->attributes = $_POST['SiteBlock'];
            if($model->validate())
            {
               $model->stype='ip';
              $model->save();
                $this->redirect(array('ipaddress'));
            }
       }
 
        $condition = 'stype="ip"';
        $dataProvider=new CActiveDataProvider('SiteBlock', array(
        'criteria'=>array( 'condition'=>$condition)));
        $this->render('/websecurity/ipaddress',array(
			'dataProvider'=>$dataProvider,'model'=>$model,
		));
    
   }




   public function actionDelete($id)
   {
       $model = SiteBlock::model()->findByPk($id);
       if(Yii::app()->request->isPostRequest)
	{
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
    
   
    
   
    
    
    


      
   
}

<?php

class ReferralsController extends Controller
{
   //$this->layout = 'column2';
   public $layout='//layouts/admin_column2';

   
   public function actionIndex()
   {
     $this->redirect(array('userlist/'));   
     /*
       $condition = 'user.transType="S" and user.active=1';
      $dataProvider=new CActiveDataProvider('ReferFriend', array(
     'criteria'=>array(
        'with'=>array('user'=>array( 'condition'=>$condition,'group'=>'user.id','oder'=>'user.id')),
      ),
      ));

    
       $this->render('/referrals/index',array(
			'dataProvider'=>$dataProvider,
		));
    */
	 
   }
   public function actionView($id)
   {
       $user = User::model()->findByPk($id);
       $name=$user->username;
      
        $condition = 'user_id='.$id;
        $dataProvider=new CActiveDataProvider('ReferFriend',array('criteria'=>array('condition'=>$condition)));
        $this->render('/referrals/_view_referrals',array(
			'dataProvider'=>$dataProvider,'name'=>$name,'uid'=>$id,
		));
   }




   public function actionDelete($id)
   {
       $model = ReferFriend::model()->findByPk($id);
      //  $model= ReferFriend::model()->findAll('user_id='.$id.' and active = 0');
        if(Yii::app()->request->isPostRequest)
		{
            
			// we only allow deletion via POST request
			/*foreach ($model as $key => $value) {
                          $value->delete();
                        }*/
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
    
    public function actionDeleteall()
   {
        
        $model= ReferFriend::model()->findAll('active = 0');
        if(Yii::app()->request->isPostRequest)
		{
            
			// we only allow deletion via POST request
			foreach ($model as $key => $value) {
                          $value->delete();
                        }

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/index/index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        $model->delete();
        $this->redirect(array('index'));
    }
    
    public function actionDeleteallbyuser($id)
    {
         $model= ReferFriend::model()->findAll('user_id='.$id.' and active = 0');
       foreach ($model as $key => $value) {
                          $value->delete();
                        }
        //$model->delete();
        $this->redirect(array('referrals/view&id='.$id));
    }

    
   
    
    
    


      
   
}

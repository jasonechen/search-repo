<?php

class RefundController extends Controller
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
     
       $dataProvider=new CActiveDataProvider('OrderPayment');
      // print_r($dataProvider);exit();
       $this->render('/refund/index',array(
			'dataProvider'=>$dataProvider,
		));
      
	 
   }

   public function actionUpdate($id)
   {
       $model = OrderPayment::model()->findByPk($id);
       $refundmodel = new RefundModel();
       $msg='';
       //print_r($refundmodel);exit();
         if(isset($_POST['RefundModel']))
            {
              $refundmodel->order_id=$id;
              $refundmodel->user_id=$model->user_id;
              
              $refundmodel->attributes = $_POST['RefundModel'];
              if($model->allow_refund_amount>=$refundmodel->refund_amt)
              {
                  
                  $model->allow_refund_amount=$model->allow_refund_amount-$refundmodel->refund_amt;
                  $model->refund_amount += $refundmodel->refund_amt;
                  if($refundmodel->save()){
                      $model->save();
                      $this->redirect(array('index'));
                  }
              }
              else
                  $msg="Refund amount should be less than Paid amount. ";
            }
       $this->render('/refund/refund',array('model'=>$model,'refundmodel'=>$refundmodel,'msg'=>$msg));
   }
    public function actionDelete($id)
    {
        $model=  OrderPayment::model()->findByPk($id);
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

      
   
}

<?php

class ReportsController extends Controller
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
       $this->render('/reports/sales',array(
			'dataProvider'=>$dataProvider,
		));
    }
   public function actionCustomer()
   {
     
      $dataProvider=new CActiveDataProvider('User');
       $this->render('/reports/customer',array(
			'dataProvider'=>$dataProvider,
		));
    }
   public function actionRefund()
   {
      
      $dataProvider=new CActiveDataProvider('OrderPayment',
                                           array('criteria'=>array('condition'=>'refund_amount>0')));
      $this->render('/reports/refund',array(
			'dataProvider'=>$dataProvider,
		));
   }
   
   
   public function actionExportarSalesRpt()
   {
       $RptModel = new ReportsModel();
       $RptModel->genrateSalesRpt('SalesReport');
        Yii::app()->end();

    }
    
     public function actionExportarRefundRpt()
   {
       $RptModel = new ReportsModel();
       $RptModel->genrateRefundRpt('Refund');
        Yii::app()->end();

    }
    
    public function actionExportCustomerRpt()
    {
        $RptModel = new ReportsModel();
        $RptModel->genrateCustomerRpt('Customer');
        Yii::app()->end();
       
    }

  
      
   
}

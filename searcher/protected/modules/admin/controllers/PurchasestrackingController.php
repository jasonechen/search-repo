<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PurchasestrackingController
 *
 * @author JKP
 */
class PurchasestrackingController extends Controller
{
    public $layout='//layouts/admin_column2';
     public function actionIndex()
    {
        $model=new OrderPayment('search');
        $this->render('index',array(
			'model'=>$model,
		));
     }
    
    
}

?>

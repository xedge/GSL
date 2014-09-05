<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SpsController extends Controller{
    
    public function filters() {
        return array(
            'accessControl'
        );
    }


    public function accessRules() {
        return array(
            array('allow',
                'actions'=>array('getfloor')
                ),
            array('allow',
                'actions'=>array('viewpayment,payment'),
                'roles'=>array('*')
                ),
            array('deny',
                'actions'=>array('payment'),
                'roles'=>array('Marketing')
                ),
            array('allow',
                'roles'=>array('Marketing')
                ),
            array('deny',
                'roles'=>array('*'))
        );
    }
    
    public function actionCreate()
    {
        $model = new Order;
        $modelBuyer = new Buyer;
        if(isset($_POST['Order'])&&isset($_POST['Buyer']))
        {
            $modelBuyer->attributes = $_POST['Buyer'];
            $model->attributes = $_POST['Order'];
            $model->DATE_ORDER = date("Y-m-d H:i:s");
            $model->M_USER_ID = Yii::app()->user->id;
            $model->setID();
            $modelBuyer->save();
            $record = Buyer::model()->findByAttributes(array('NO_ID'=>$modelBuyer->NO_ID));
            $model->BUYER_idBUYER = $record->idBUYER;
            $model->BF_DATE = date("Y-m-d", strtotime($model->BF_DATE));
            if($model->save())
            {
                $model->notifyNewOrder();
                $this->redirect (array('ViewPayment'));
            }
            else
            {
                echo $model->errors[0];
            }
        }
        $this->render('create',array('model'=>$model,'buyer'=>$modelBuyer));
    }
    
    public function actionIndex()
    {
        $model = Order::model()->findAll();
        $this->render('index',array('model'=>$model));
    }


    
    public function actionGetfloor($towerId)
    {
        header('Content-type: application/json');
        
        $floor = Floor::model()->findAllByAttributes(array('TOWER_ID'=>$towerId));
        echo CJSON::encode($floor);
        
        Yii::app()->end();
    }
    
    public function actionGetroom($floorid)
    {
        header('Content-type: application/json');
        $rooms = Room::model()->findAllByAttributes(array('FLOOR_ID'=>$floorid),
                'STATUS="Available"');
        echo CJSON::encode($rooms);
        
        Yii::app()->end();
    }
    
    public function actionViewPayment()
    {
        $model = Order::model()->findAll(array('order'=>'DATE_ORDER desc'));
        $this->render('viewAll',array('model'=>$model));
    }
    
    public function actionPayment($orderId)
    {
        $model = Order::model()->findByPk($orderId);
        if(isset($_POST['Order']))
        {
            $model->attributes = $_POST['Order'];
            $model->AP1_DATE = date("Y-m-d", strtotime($model->AP1_DATE));
            $model->AP_DATE_BEGIN = date("Y-m-d", strtotime($model->AP_DATE_BEGIN));
            $model->AP_DATE_END = date("Y-m-d", strtotime($model->AP_DATE_END));
            if($model->RM_PT_ID==3)
            {
                $model->RM_INSTALLMENT_DATE_BEGIN = date("Y-m-d", strtotime($model->RM_INSTALLMENT_DATE_BEGIN));
                $model->RM_INSTALLMENT_DATE_ENG = date("Y-m-d", strtotime($model->RM_INSTALLMENT_DATE_ENG));
            }
            else
            {
                $model->RM_PAYMENT_DATE = date("Y-m-d", strtotime($model->RM_PAYMENT_DATE));
            }
            
            if($model->save())
            {
                $this->redirect(array('viewpayment'));
            }
        }
        $this->render('payment',array('model'=>$model));
    }
    public function actionDetail($orderId)
    {
        $model = Order::model()->findByPk($orderId);
        $this->render('detail',array('model'=>$model));
    }
    
    public function actionApprove($orderId)
    {
        $model = Order::model()->findByPk($orderId);
        $model->approve();
        $model->notifyApproval();
        $this->redirect(array('viewpayment'));
    }
    
    public function actionCancel($orderId)
    {
        $model = Order::model()->findByPk($orderId);
        $model->cancel();
        $this->redirect(array('viewpayment'));
    }
}
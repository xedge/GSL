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
                'roles'=>array('Admin')
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
            $model->DATE_ORDER = date("Y-m-d");
            $model->M_USER_ID = Yii::app()->user->id;
            $model->setID();
            $modelBuyer->save();
            $record = Buyer::model()->findByAttributes(array('NO_ID'=>$modelBuyer->NO_ID));
            $model->BUYER_idBUYER = $record->idBUYER;
            if($model->save())
            {
                $mail=new YiiMailer();
                $mail->setFrom('dummypengguna@gmail.com','Dummy Dum');
                $criteria = new CDbCriteria;
                $criteria->select ='EMAIL_ADDRESS';
                $criteria->compare('UT_ID', '1',FALSE,'OR');
                $criteria->compare('UT_ID', '2',FALSE,'OR');
                $criteria->compare('UT_ID', '3',FALSE,'OR');
                $record = User2::model()->findAll($criteria);
                foreach ($record as $email)
                {
                    $mail->setTo($email->EMAIL_ADDRESS);
                    $mail->setSubject('New Order');
                    $mail->setBody('Simple message');
                    $mail->send();
                }
                $this->redirect (array('detail','id'=>$model));
            }
        }
        $this->render('create',array('model'=>$model,'buyer'=>$modelBuyer));
    }
    
    public function actionIndex()
    {
        $model = Order::model()->findAll();
        $this->render('index',array('model'=>$model));
    }


    public function actionDetail($id)
    {
        $model = Order::model()->findByPk($id);
        $this->render('detail',array('model'=>$model));
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
            if($model->save())
            {
                $this->redirect(array('viewpayment'));
            }
        }
        $this->render('payment',array('model'=>$model));
    }
}
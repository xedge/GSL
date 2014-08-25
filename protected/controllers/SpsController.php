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
                'roles'=>array('Marketing')
                ),
            array('deny',
                'roles'=>array('*'))
        );
    }
    
    public function actionCreate()
    {
        $model = new Order;
        if(isset($_POST['Order']))
        {
            $model->attributes = $_POST['Order'];
            $model->DATE_ORDER = date("Y-m-d");
            $model->M_USER_ID = Yii::app()->user->id;
            $model->ORDER_ID = '1233434';
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
        $this->render('create',array('model'=>$model));
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
}
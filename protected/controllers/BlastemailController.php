<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BlastemailController extends Controller{
    
    public function filters() {
        return array(
            'accessControl'
        );
    }
    
    public function accessRules() {
        return array(
            array('allow',
                'roles'=>array('Admin')
                ),
            array('deny',
                'roles'=>array('*')
                )
        );
    }
    
    public function actionIndex()
    {
        $model = new EmailBody;
        if(isset($_POST['EmailBody']))
        {
            $model->attributes = $_POST['EmailBody'];
            $model->blasEmail();
        }
        $model = new EmailBody;
        $this->render('index',array('model'=>$model));
    }
}
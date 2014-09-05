<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BuyerController extends Controller
{
    public function filters(){
        return array(
            'accessControl'
        );
    }
    
    public function accessRules() {
        return array(
            array('allow',
                'actions'=>array('index'),
                'roles'=>array('Marketing Manager')
                ),
            array('allow',
                'roles'=>array('Marketing')
                ),
            array('deny',
                'roles'=>array('*')),
        );
    }
    
    public function actionCreate()
    {
        $model = new Buyer;
        if(isset($_POST['Buyer']))
        {
            $model->attributes = $_POST['Buyer'];
            if($model->save())
                $this->redirect(array('detail','id'=>$model->idBUYER));
        }
        $this->render('create',array('model'=>$model));
    }
    
    public function actionDetail($id)
    {
        $model = Buyer::model()->findByPk($id);
        $this->render('detail',array('model'=>$model));
    }
    
    public function actionUpdate($id)
    {
        $model = Buyer::model()->findByPk($id);
        $modelEdited = new Buyer;
        if(isset($_POST['Buyer']))
        {
            $modelEdited->idBUYER = $model->idBUYER;
            $model = $_POST['Buyer'];
            $model->idBUYER = $modelEdited->idBUYER;
            if($model->save())
            {
                $this->redirect(array('detail','id'=>$model->idBUYER));
            }
        }
        $this->render('update',array('model'=>$model));
    }
    
    public function actionManage()
    {
        $model = Buyer::model()->findAll();
        $this->render('manage',array('model'=>$model));
    }
    
    public function actionIndex()
    {
        $model = User2::model()->findByPk(Yii::app()->user->id);
        $this->render('index',array('model'=>$model));
    }
}
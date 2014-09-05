<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class masterstockController extends Controller{
    
    public function filters() {
        return array(
            'accessControl'
        );
    }
    
    public function actionIndex()
    {
        $Stock = new Stock;
        $this->render('index',array('model'=>$Stock));
    }
    
    public function actiongetRoom()
    {
        header('Content-type: application/json');
        $model = new Stock;
        echo CJSON::encode($model->getRoom(1));
         Yii::app()->end();
    }
    
    public function accessRules() {
        return array(array(
            'allow',
            'roles'=>array('Admin')
        ));
    }
    
    public function actionDetail($roomid)
    {
        $record = Room::model()->findByPk($roomid);
        $this->renderPartial('detail',array('model'=>$record));
    }
    
    public function actionSold($roomid)
    {
        $record = Room::model()->findByPk($roomid);
        $record->STATUS = 'SOLD';
        $record->save();
        $this->redirect(array('masterstock/index'));
    }
    
    public function actionCancel($roomid)
    {
        $record = Room::model()->findByPk($roomid);
        $record->STATUS = 'Available';
        $record->save();
        $this->redirect(array('masterstock/index'));
    }
}
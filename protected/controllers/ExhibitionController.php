<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ExhibitionController extends Controller{
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
    
    public function actionCreateEx()
    {
        $exh = new Exhibition;
        if(isset($_POST['Exhibition']))
        {
            $exh->attributes = $_POST['Exhibition'];
            $exh->CREATOR_USER_ID = Yii::app()->user->id;
            if($exh->save())
            {
                $this->redirect('index');
            }
        }
        
        $this->render('createex',array('model'=>$exh));
    }
    
    public function actionCreateExd()
    {
        $exd = new ExhibitionDetail;
        if(isset($_POST['ExhibitionDetail']))
        {
            $exd->attributes = $_POST['ExhibitionDetail'];
            $exd->SUBMITTER_ID = Yii::app()->user->id;
            if($exd->save())
            {
                $this->redirect('index');
            }
        }
        $this->render('createExd',array('model'=>$exd));
    }
    
    public function actionCreateCustomer()
    {
        $custom = new Customer;
        if(isset($_POST['Customer']))
        {
            $custom->attributes = $_POST['Customer'];
            $custom->save();
        }
        $this->render('createcus');
    }

    public function createExhibition($model)
    {
        $exhibit = new Exhibition;
        $exhibit->attributes = $model;
        return $exhibit->save();
    }
    
    public function createExhibitionDetail($model)
    {
        $exd = new ExhibitionDetail;
        $exd->attributes = $model;
        
        return $exd->save();
    }
    
    public function actionGetexhibition()
    {
         header('Content-type: application/json');
         $exh = Exhibition::model()->findAll();
         echo CJSON::encode($exh);
         Yii::app()->end();
    }
    
    public function actionGetexhibitionDetail($exhid)
    {
         header('Content-type: application/json');
         $id = Yii::app()->user->id;
         $exd = ExhibitionDetail::model()->findAllByAttributes(array('EXHIBITION_EX_ID'=>$exhid,'SUBMITTER_ID'=>$id));
         echo CJSON::encode($exd);
         Yii::app()->end();
    }
    
    public function actionGetcustomer($exd)
    {
         header('Content-type: application/json');
         $custom = Customer::model()->findAllByAttributes(array('EXHIBITION_DETAIL_ED_ID'=>$exd));
         echo CJSON::encode($custom);
         Yii::app()->end();
    }
}
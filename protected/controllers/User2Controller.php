<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class User2Controller extends Controller
{
    public $defaultAction = 'index';
    public function filters() {
        return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
    }
    
    public function accessRules() {
        return array(
            array('allow',
                    'actions'=>array('login'),
                    'users'=>array('*'),
                ),
            array('allow',
                    //'actions'=>array('index','create','manage','update','detail'),
                    'roles'=>array('Super Admin')
                ),
            array('deny',
                'users'=>array('*')),
        );
    }
    
    public function actionIndex()
    {
        /*
        $dataProvider=new CActiveDataProvider('User2');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
          */
        $record = LoginHist::model()->findAll();
        $this->render('loginHistory',array('model'=>$record));
    }
    
    public function actionCreate()
    {
        $model = new User2;
        
        if(isset($_POST['User2']))
        {
            $model->attributes = $_POST['User2'];
            $model->setUserID();
            if($model->save())
                $this->redirect (array('detail','id'=>$model->USER_ID));
        }
        $this->render('create',array('model'=>$model));
    }
    
    public function actionManage() {
        $model = User2::model()->findAll();
        $this->render('manageUser',array('model'=>$model));
    }
    
    public function actionUpdate($id)
    {
        $model = User2::model()->findByPk($id);
        $modelEdited = new User2;
        if(isset($_POST['User2']))
        {
            $modelEdited->USER_ID = $model->USER_ID;
            $modelEdited->UT_ID = $model->UT_ID;
            $model->attributes = $_POST['User2'];
            $model->USER_ID = $modelEdited->USER_ID;
            $model->UT_ID = $modelEdited->UT_ID;
            IF($model->save())
                $this->redirect (array('detail','id'=>$model->USER_ID));
        }
        $this->render('update',array('model'=>$model));
    }
    
    public function actionDetail($id) {
        $model = User2::model()->findByPk($id);
        $this->render('detail',array('model'=>$model));
    }
}

?>

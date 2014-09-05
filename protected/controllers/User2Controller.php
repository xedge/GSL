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
            $model->PASSWORD = CPasswordHelper::hashPassword($model->PASSWORD);
            IF($model->save())
                $this->redirect (array('detail','id'=>$model->USER_ID));
        }
        $this->render('update',array('model'=>$model));
    }
    
    public function actionDetail($id) {
        $model = User2::model()->findByPk($id);
        $this->render('detail',array('model'=>$model));
    }
    
    public function actionSetRoom()
    {
        $refloor = Floor::model()->findAll('FLOOR_NUMBER=:fl OR FLOOR_NUMBER=:fl2',
                array(
                    ':fl'=>'PH1',
                    ':fl2'=>'PH2'
                ));
        foreach ($refloor as $florr)
        {
                for($i = 1; $i < 9; $i++)
                {
                    $room = new Room;
                    $room->ROOM_NUMBER = $florr->FLOOR_NUMBER . sprintf(".%02s",$i);
                    $room->FLOOR_ID = $florr->FLOOR_ID;
                    $bol = FALSE;
                    if($i==9)
                    {
                        $room->WING_ID = 2;
                        $room->RT_ID=3;
                        
                        $room->ROOM_AREA_GROSS = 52.71;
                        $bol = TRUE;
                    }
                    $room->STATUS = 'Available';
                    if ($bol) {
                       $result = $room->save();
                       echo $result;
                    }
                }
            
        }
    }
}

?>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class LoginController extends Controller
    {
        public $defaultAction = 'login';
        public function accessRules() {
            return array(
                array('allow',
                    'actions'=>array('login'),
                    'users'=>array('*')
                    ),
            );
        }
        private function redir()
        {
            if(Yii::app()->user->roles=='Super Admin')
                {
                    $this->redirect(array('user2/index'));
                }
            else if(Yii::app()->user->roles=='Marketing')
            {
                    $this->redirect(array('buyer/index'));
            }
            else if(Yii::app()->user->roles=='Admin')
            {
                $this->redirect(array('sps/viewpayment'));
            }
                    
        }
        public function actionLogin()
        {
            if(!Yii::app()->user->isGuest)
                $this->redir();
            $model=new User2;
            if(isset($_POST['User2']))
            {
                $model->attributes=$_POST['User2'];
                if($model->login())
                {
                    $this->redir();
                }
            }
            $this->render('login',array('model'=>$model));
        }
        
        
    }
    
?>

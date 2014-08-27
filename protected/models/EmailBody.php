<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EmailBody extends CFormModel
{
    public $title;
    public $body;
    
    public function rules() {
        return array(
            array('title body','safe')
        );
    }

    public function blasEmail()
    {
        $mail=new YiiMailer();
        $mail->setFrom('dummypengguna@gmail.com','Dummy Dum');
        $criteria = new CDbCriteria;
        $criteria->select ='EMAIL_ADDRESS';
        $criteria->compare('UT_ID', '1',FALSE,'OR');
        $criteria->compare('UT_ID', '3',FALSE,'OR');
        $record = User2::model()->findAll($criteria);
        $mail->setTo(array('yanuar.valentino@gmail.com', 'x_edge@outlook.com'));
        $mail->setSubject($this->title);
        $mail->setBody($this->body);
        $mail->send();
    }
}
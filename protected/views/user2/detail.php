<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="g9">
    <h1>Detail User of <?php echo $model->USER_NAME?></h1>
    <?PHP  echo  CHtml::link('Edit',array('user2/update','id'=>$model->USER_ID),array('class'=>'btn'))?>
    <?php
        $this->widget('zii.widgets.CDetailView',array(
            'data'=>$model,
            'attributes'=>array(
                array(
                    'label' => 'User ID',
                    'type'=>'raw',
                    'value'=>  CHtml::label($model->USER_ID,'USER_ID')
                ),
                array(
                    'label'=>'User Name',
                    'type'=>'raw',
                    'value'=> CHtml::label($model->USER_NAME,'USER_NAME')
                ),
                array(
                    'label'=>'Name',
                    'type'=>'raw',
                    'value'=>  CHtml::label($model->NAME,'NAME')
                ),
                array(
                    'label'=>'Email',
                    'type'=>'raw',
                    'value'=> CHtml::label($model->EMAIL_ADDRESS,'EMAIL_ADDRESS')
                ),
                array(
                    'label'=>'User Type',
                    'type'=>'raw',
                    'value'=>  CHtml::label($model->uT->UT_NAME,'UT_NAME')
                ),
            ),
        ));
    ?>
</div>

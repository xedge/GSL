<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="g9">
    <h1>Buyer's Detail</h1>
    <?PHP  echo  CHtml::link('Edit',array('buyer/update','id'=>$model->idBUYER),array('class'=>'btn'))?>
    <?php 
        $this->widget('zii.widgets.CdetailView',array(
            'data'=>$model,
            'attributes'=>array(
                array(
                    'label' => 'Buyer ID',
                    'type' => 'raw',
                    'value' => CHtml::label($model->NO_ID, 'NO_ID')
                ),
                array(
                    'label' => 'Full Name',
                    'type' => 'raw',
                    'value' => CHtml::label($model->BUY_NAME, 'BUY_NAME')
                ),
                array(
                    'label' => 'Address Based on ID',
                    'type' => 'raw',
                    'value' => CHtml::label($model->ADDRESS_BY_ID, 'ADDRESS_BY_ID')
                ),
                array(
                    'label'=> 'Address',
                    'type' => 'raw',
                    'value' => CHtml::label($model->ADDRESS, 'ADDRESS')
                ),
                array(
                    'label' => 'Phone Number',
                    'type' => 'raw',
                    'value' => CHtml::label($model->PHONE_NUM, 'PHONE_NUM')
                ),
                array(
                    'label' => 'Mobile Number',
                    'type' => 'raw',
                    'value' => CHtml::label($model->HP_NUM, 'HP_NUM')
                ),
                array(
                    'label' => 'Fax Number',
                    'type' => 'raw',
                    'value' => CHtml::label($model->FAX_NUM, 'FAX_NUM')
                )
            )
        ));
    ?>
</div>
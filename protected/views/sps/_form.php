<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$form = $this->beginWidget('CActiveForm',array('id' => 'form',
        'enableAjaxValidation'=>false));
?>
<fieldset>
    <section>
        <?php echo $form->labelEx($model, 'Buyer ID')?>
        <div><?php echo CHtml::dropDownList('Order[BUYER_idBUYER]',$model->BUYER_idBUYER ,array('Buyer'=>$model->getAllBuyer()))?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Tower') ?>
        <div><?php echo CHtml::dropDownList('Tower', 'tower', array('Tower'=>$model->getAllTower()))?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Floor') ?>
        <div><?php echo CHtml::dropDownList('Floor', 'floor', array('Floor Num'=>$model->getAllFloor()))?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Room Num')?>
        <div><?php echo $form->textField($model,'ROOM_ROOM_ID')?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Price')?>
        <div>
            <?php echo $form->textField($model,'PRICE')?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model, 'DISCOUNT') ?>
        <div>
            <?php echo $form->textField($model,'DISCOUNT')?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Payment Type')?>
        <div>
            <?php echo CHtml::dropDownList('Order[PT_ID]', $model->PT_ID, $model->getAllPayment()) ?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Booking Fee') ?>
        <div>
            <?php echo $form->textField($model,'BOOKING_FEE') ?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Booking Payment') ?>
        <div>
            <?php echo CHtml::dropDownList('Order[BF_PT_ID]', $model->BF_PT_ID, $model->getAllPayment()) ?>
           <!-- <?php echo $form->labelEx($model,'date') ?>
            <?php echo $form->textField($model,'BF_DATE',array('id'=>'date','class'=>'date hasDatepicker'))?>-->
        </div>
    </section>
    <section>
        <div><button class="fr submit">
                <?php
                if($model->isNewRecord)
                    echo 'Create';
                else
                    echo 'Save'
                ?>
            </button></div>
    </section>
</fieldset>

<?php $this->endWidget();
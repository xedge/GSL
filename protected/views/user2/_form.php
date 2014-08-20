<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$form = $this->beginWidget('CActiveForm',array(
    'id'=>'form',
    'enableAjaxValidation'=>false,
)); ?>
<fieldset>
    <label>User</label>
    <section>
        <?php echo $form->labelEx($model,'USER_NAME'); ?>
        <div><?php echo $form->textField($model,'USER_NAME');?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'PASSWORD');?>
        <div><?php echo $form->passwordField($model,'PASSWORD');?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'NAME');?>
        <div><?php echo $form->textField($model,'NAME')?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'EMAIL_ADDRESS'); ?>
        <div><?php echo $form->textField($model,'EMAIL_ADDRESS');?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'UT_ID'); ?>
        <div><?php echo CHtml::dropDownList('User2[UT_ID]', $model->UT_ID, array('User Type'=>$model->getAllUT()))?></div>
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
<?php $this->endWidget(); ?>

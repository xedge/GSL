<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$form = $this->beginWidget('CActiveForm',array('id'=>'form',
        'enableAjaxValidation'=>FALSE));
?>
<fieldset>
    <label>Buyer</label>
    <section>
        <?php echo $form->labelEx($model,'ID Number');?>
        <div><?php echo $form->textField($model,'NO_ID')?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Full Name')?>
        <div><?php echo $form->textField($model,'BUY_NAME') ?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Address Based on ID') ?>
        <div><?php echo $form->textField($model,'ADDRESS_BY_ID') ?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Address')?>
        <div><?php echo $form->textField($model,'ADDRESS') ?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Phone Number')?>
        <div><?php echo $form->textField($model,'PHONE_NUM') ?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Mobile Number')?>
        <div><?php echo $form->textField($model,'HP_NUM') ?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Fax Number')?>
        <div><?php echo $form->textField($model,'FAX_NUM') ?></div>
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
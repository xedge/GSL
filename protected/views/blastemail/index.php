<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="g12">
    <?php $form = $this->beginWidget('CActiveForm',array('id' => 'form',
        'enableAjaxValidation'=>false));?>
    <fieldset>
        <label>Send Notification</label>
        <section>
            <?php echo $form->labelEx($model,'title');?>
            <div>
                <?php echo $form->textField($model,'title')?>
            </div>
        </section>
        <section>
            <?php echo $form->labelEx($model,'body')?>
            <div>
                <?php echo $form->textArea($model,'body')?>
            </div>
        </section>
        <section>
        <div><button class="fr submit">
                Send
            </button></div>
        </section>
    </fieldset>
</div>
<?php $this->endWidget();
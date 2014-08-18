<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    <fieldset>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
        <section>
            <?php echo $form->labelEx($model,'NAMA'); ?>
            <div><?php echo $form->textField($model,'NAMA',array('size'=>45,'maxlength'=>45)); ?></div>
            <?php echo $form->error($model,'NAMA'); ?>
        </section>
            
        <section>
            <?php echo $form->labelEx($model,'KTP'); ?>
            <div><?php echo $form->textField($model,'KTP',array('size'=>45,'maxlength'=>45)); ?></div>
            <?php echo $form->error($model,'KTP'); ?>
        </section>
        <section>
            <?php echo $form->labelEx($model,'ALAMAT_KTP'); ?>
            <div><?php echo $form->textArea($model,'ALAMAT_KTP',array('size'=>200,'maxlength'=>200)); ?></div>
            <?php echo $form->error($model,'ALAMAT KTP'); ?>
        </section>
    
        <section>
            <?php echo $form->labelEx($model,'ALAMAT_KORESPONDEN'); ?>
            <div><?php echo $form->textArea($model,'ALAMAT_KORESPONDEN',array('size'=>200,'maxlength'=>200)); ?></div>
            <?php echo $form->error($model,'ALAMAT KORESPONDEN'); ?>
        </section>
    
        <section>
            <?php echo $form->labelEx($model,'HP'); ?>
            <div><?php echo $form->textField($model,'HP',array('size'=>45,'maxlength'=>45)); ?></div>
            <?php echo $form->error($model,'HP/PHONE'); ?>
        </section>
    
        <section>
            <?php echo $form->labelEx($model,'FAX'); ?>
            <div><?php echo $form->textField($model,'FAX',array('size'=>45,'maxlength'=>45)); ?></div>
            <?php echo $form->error($model,'FAX'); ?>
        </section>

        
        <section>
            <div><button class="fr submit" value="Create">Submit</button></div>
            <div><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
        </section>
    </fieldset>
    
<?php $this->endWidget(); ?>

</div><!-- form -->
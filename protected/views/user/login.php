<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<header>
    <div id="logo">
        
    </div>
</header>
<section id="content">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'loginform',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?><fieldset>
            <label>Login</label>

            <section>
                <?php echo $form->labelEx($model,'Username'); ?>
                <?php echo $form->textField($model,'Username'); ?>
            </section>
            
            <section>
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password'); ?>
            </section>
            <section>
		<?php echo CHtml::submitButton('Login'); ?>
            </section>
        </fieldset>
<?php $this->endWidget(); ?>
</section>
<?php 
    $this->layout = '//layouts/login';
    ?>


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
    <?php $form=$this->beginWidget('CActiveForm',array(
        'id'=>'loginform',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    ));
    ?>
    <fieldset>
        <label>Login</label>
        <section>
            <?php echo $form->labelEx($model,'USER_NAME');?>
            <div><?php echo $form->textField($model,'USER_NAME');?></div>
        </section>
        <section>
            <?php echo $form->labelEx($model,'PASSWORD'); ?>
            <div><?php echo $form->passwordField($model,'PASSWORD'); ?></div>
        </section>
        <section>
            <div><button class="fr submit">Login</button></div>
        </section>
    </fieldset>
        <?php $this->endWidget(); ?>
</section>
<?php 
    $this->layout = '//layouts/login';
    ?>
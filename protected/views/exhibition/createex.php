<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$form = $this->beginWidget('CActiveForm',array(
    'id' => 'form',
    'enableAjaxValidation'=>false,
));?>
<h1>Create Exhibition</h1>

<fieldset>
    
    <section>
        <?php echo $form->labelEx($model,'Name')?>
        <div><?php echo $form->textField($model,'EX_NAME')?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Location')?>
        <div><?php echo $form->textField($model,'LOCATION')?></div>
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
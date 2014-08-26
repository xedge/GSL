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
<script type="text/javascript">
    $(function(){
        $("#ExhibitionDetail_DATE").wl_Date();
        $("#ExhibitionDetail_DATE").wl_Date(
                "option","dateFormat",
                "yy-mm-dd"
                );
    })
</script>
<h1>Create Exhibition Detail</h1>

<fieldset>
    
    <section>
        <?php echo $form->labelEx($model,'Exhibition')?>
        <div><?php echo CHtml::dropDownList('ExhibitionDetail[EXHIBITION_EX_ID]', $model->EXHIBITION_EX_ID, $model->getAllExhibition())?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Date')?>
        <div><?php echo $form->textField($model,'DATE',array('class'=>'date'))?></div>
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
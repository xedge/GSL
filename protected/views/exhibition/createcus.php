<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$form = $this->beginWidget('CActiveForm',array('id' => 'form',
        'enableAjaxValidation'=>false));
?>
<script type="text/javascript">
    $(function(){
        set();
        $("#Exhibition").change(function(){
            set();
        })
    })
    function set()
    {
        var $dropdown = $('#Exhibition');
        $.getJSON("index.php?r=exhibition/getexhibitionDetail&exhid="+$dropdown.val(),function(data){
            var $exd = $('#Customer_EXHIBITION_DETAIL_ED_ID');
            $exd.empty();
            $.each(data,function(index,val){
                $exd.append(
                        "<option value="+val.ED_ID+">"+
                        val.DATE+"</option>"
                        );
            });
        });
    }
</script>
<h1>Create Customer</h1>
<fieldset>
    <section>
        <?php echo $form->labelEx($model,'Exhibition')?>
        <div>
            <?php echo CHtml::dropDownList('Exhibition', '', array('Event'=>$model->getAllExhibition()))?>
            <?php echo CHtml::link('Create New',array('exhibition/createex'),array('class'=>'btn'))?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Exhibition Detail')?>
        <div><?php echo CHtml::dropDownList('Customer[EXHIBITION_DETAIL_ED_ID]', '', array(''))?>
            <?php echo CHtml::link('Create New',array('exhibition/createexd'),array('class'=>'btn'))?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Customer Name')?>
        <div><?php echo $form->textField($model,'CUST_NAME')?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Customer Phone')?>
        <div><?php echo $form->textField($model,'PHONE_NUM')?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Customer Type')?>
        <div><?php ECHO CHtml::dropDownList('Customer[CUSTOMER_TYPE_CT_ID]', '', array('Prospect'=>$model->getAllType())) ?></div>
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
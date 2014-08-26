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
        $("#date").wl_Date();
        $("#date").wl_Date(
                "option","dateFormat",
                "yy-mm-dd"
                );
        $("#Tower").change(function(){
            var $dropdown = $(this);
            $.getJSON("index.php?r=sps/getfloor&towerId="+$dropdown.val(),function(data){
                var $floor = $("#Floor");
                $floor.empty();
                $.each(data,function(index,val){
                    $floor.append("<option value="+val.FLOOR_ID+">"
                            +val.FLOOR_NUMBER+"</option>"
                            );
                });
            });
            
        }
                );
        $("#Floor").change(function(){
            var $dropdown = $(this);
            $.getJSON("index.php?r=sps/getroom&floorid="+$dropdown.val(),function(data){
                var $room = $("#Order_ROOM_ROOM_ID");
                $room.empty();
                $.each(data,function(index,val){
                    $room.append("<option value="+val.ROOM_ID+">"+
                            val.ROOM_NUMBER+
                            "</option>");
                });
            });
        });
    });
    function set()
    {
        var $dropdown = $("#Tower");
        $.getJSON("index.php?r=sps/getfloor&towerId="+$dropdown.val(),function(data){
                var $floor = $("#Floor");
                $floor.empty();
                $.each(data,function(index,val){
                    $floor.append("<option value="+val.FLOOR_ID+">"
                            +val.FLOOR_NUMBER+"</option>"
                            );
                });
            })
    }
</script>
<fieldset>
    <label>Buyer</label>
    <section>
        <?php echo $form->labelEx($buyer,'ID Number');?>
        <div><?php echo $form->textField($buyer,'NO_ID')?></div>
    </section>
    <section>
        <?php echo $form->labelEx($buyer,'Full Name')?>
        <div><?php echo $form->textField($buyer,'BUY_NAME') ?></div>
    </section>
    <section>
        <?php echo $form->labelEx($buyer,'Address Based on ID') ?>
        <div><?php echo $form->textField($buyer,'ADDRESS_BY_ID') ?></div>
    </section>
    <section>
        <?php echo $form->labelEx($buyer,'Address')?>
        <div><?php echo $form->textField($buyer,'ADDRESS') ?></div>
    </section>
    <section>
        <?php echo $form->labelEx($buyer,'Phone Number')?>
        <div><?php echo $form->textField($buyer,'PHONE_NUM') ?></div>
    </section>
    <section>
        <?php echo $form->labelEx($buyer,'Mobile Number')?>
        <div><?php echo $form->textField($buyer,'HP_NUM') ?></div>
    </section>
    <section>
        <?php echo $form->labelEx($buyer,'Fax Number')?>
        <div><?php echo $form->textField($buyer,'FAX_NUM') ?></div>
    </section>
</fieldset>
<fieldset>
    <label>Order</label>
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
        <div><?php echo CHtml::dropDownList('Order[ROOM_ROOM_ID]', '', array(''))?></div>
            <!--<?php echo $form->textField($model,'ROOM_ROOM_ID')?></div>-->
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
            <?php echo $form->labelEx($model,'date') ?>
            <?php echo $form->textField($model,'BF_DATE',array('id'=>'date','class'=>'date'))?>
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
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
         $("#cek").hide();
        $("#cc").hide();
        $("#date").wl_Date();
        $("#date").wl_Date(
                "option","dateFormat",
                "dd-mm-yy"
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
        $("#DSC").on("input",function(){
            var $perc = $(this).val();
            var price = unformatnumber( $("#Order_PRICE").val());
            var orderDiscount = $perc * price /100;
            $("#Order_DISCOUNT").val('Rp '+formatNumber(orderDiscount,0,2,true));
            var pad = price -orderDiscount;
            $("#pad").val('Rp '+formatNumber(pad,0,2,true));
        });
        $("#Order_DISCOUNT").on("input",function(){
            var dsc = $(this).val();
            var price = unformatnumber( $("#Order_PRICE").val());
            $("#DSC").val(dsc/price*100);
            $("#pad").val('Rp '+formatNumber(price-dsc,0,2,true));
        })
        
        $("#Order_BF_PT_ID").change(function(){
           var $val=$(this).val();
           if($val=='1')
           {
               $("#cek").hide();
               $("#cc").hide();
           }
           else if($val=='5')
           {
               $("#cc").hide();
               $("#cek").show();
           }
           else
           {
               $("#cc").show();
               $("#cek").hide();
           }
        });
        $('input[readonly]').css("background-color","gray");
        $('input[readonly]').css("color","white");
        $('form').submit(function(){
            $('.money').each(function(){
            $(this).val(unformatnumber($(this).val()));
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
    function setPriceformat()
    {
        var s = $('#Order_PRICE').val();
        $('#Order_PRICE').val('Rp '+formatNumber(s,0,2,true) );
    }
    
    function setBookingFee()
    {
        var s = $("#Order_BOOKING_FEE").val();
        $('#Order_BOOKING_FEE').val('Rp '+formatNumber(s,0,2,true) );
    }
    
    function setDiscount()
    {
        var dsc = $("#Order_DISCOUNT").val();
        var price = unformatnumber( $("#Order_PRICE").val());
        $("#Order_DISCOUNT").val('Rp '+formatNumber(dsc,0,2,true));
        $("#DSC").val(dsc/price*100);
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
            <?php echo $form->textField($model,'PRICE',array('onchange'=>'setPriceformat()','class'=>'money'))?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model, 'DISCOUNT %') ?>
        <div>
            <?php echo CHtml::textField('DSC','',array('class'=>'g1'));
                echo CHtml::label('%','asdsd', array('class'=>'g1')); 
                echo $form->textField($model,'DISCOUNT',array('class'=>'g4 money','onchange'=>'setDiscount()'))?>
        </div>
    </section>
    <section>
        <?php echo CHtml::label('Price after Disc','PADL') ?>
        <div>
             <?php   echo CHtml::textField('pad','',array('class'=>'g4 money','readonly'=>'true'))?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Payment Type')?>
        <div>
            <?php echo CHtml::dropDownList('Order[PT_ID]', $model->PT_ID, $model->getPayment()) ?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Booking Fee') ?>
        <div>
            <?php echo $form->textField($model,'BOOKING_FEE',array('class'=>'money','onchange'=>'setBookingFee()')) ?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Booking Payment') ?>
        <div>
            <div class="g2">
            <?php echo CHtml::dropDownList('Order[BF_PT_ID]', $model->BF_PT_ID, $model->getBFPayment()) ?>
            </div>
            <div id="cek" hidden="true" class="g10">
                <?php echo $form->labelEx($model,'Bank',array('class'=>'g1'))?>
                <?php echo $form->textField($model,'BF_CHECK_BANK',array('class'=>'g3'))?>
                <?php echo $form->labelEx($model,'No',array('class'=>'g1'))?>
                <?php echo $form->textField($model,'BF_CHECK_NO',array('class'=>'g3'))?>
            </div>
            <div id="cc" hidden="true" class="g10">
                <?php echo $form->labelEx($model,'No',array('class'=>'g1'))?>
                <?php echo $form->textField($model,'BF_CC_NO',array('class'=>'g3'))?>
            </div>
            <div id="tunai" class="g10">
                <?php echo $form->labelEx($model,'date',array('class'=>'g1')) ?>
                <?php echo $form->textField($model,'BF_DATE',array('id'=>'date','class'=>'g3'))?>
            </div>
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
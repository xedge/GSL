<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$form = $this->beginWidget('CActiveForm',array('id' => 'form',
        'enableAjaxValidation'=>false));
$priceafterdisc = $model->PRICE - $model->DISCOUNT;
?>
<script type="text/javascript">
    $(function(){
        $('.date').wl_Date();
        $('.date').wl_Date(
                "option","dateFormat",
                "yy-mm-dd"
                );
        $('.Ang').hide();
        $('#Order_RM_COST').prop('readonly',true);
        $('#DPC').on("input",function(){
            setDownPayment();
        });
        $('#DPT').on("input",function(){
            setDownPayment();
        })
        $('#PTC').on("input",function(){
            var perc = $(this).val();
            var totalCost = $('#AD').val();
            var remain = perc *totalCost / 100;
            $('#Order_INSTALLMENT_PRICE').val(remain);
        });
        $('#Order_RM_PERCENT').on("input",function(){
            var perc = $(this).val();
            var totalCost = $('#AD').val();
            var payment = perc * totalCost /100;
            $('#Order_RM_COST').val(payment);
        })
        $("#Order_RM_INSTALLMENT_TIMES").on("input",function(){
            var times = $(this).val();
            var totalCost = $('#AD').val();
             $('#Order_RM_COST').val(totalCost/times);
        })
        $('#Order_RM_PT_ID').change(function(){
            var type = $(this).val();
            if(type=='3')
            {
                $('.Ang').show();
                $('#Order_RM_PAYMENT_DATE, #Rmdate').hide();
                $('.notAng').hide();
                $('#Order_RM_COST').val('');
            }
            else
            {
                $('.Ang').hide();
                $('#Order_RM_PAYMENT_DATE, #Rmdate').show();
                 $('.notAng').show();
            }
        })
    });
    function setDownPayment()
    {
      var times = $('#Order_ADVANCE_PAYMENT_TIMES').val();
      var perc = $('#DPC').val();
      var totalCost = $('#AD').val();
      var totalDP = perc * totalCost / 100 ;
      $('#Order_ADVANCE_PAYMENT_FEE').val(totalDP);
      var DPCost = totalDP/times;
      $('#Order_ADVANCE_PAYMENT_1').val(DPCost-$('#Order_BOOKING_FEE').val());
      $('#Order_ADVANCE_PAYMENT').val(DPCost);
    };
    function setPaymentnonInstall()
    {
    }
</script>
<fieldset>
    <label>Order</label>
    <section>
        <?php echo $form->labelEx($model,'Tower') ?>
        <div><?php echo CHtml::textField('Tower',$model->rOOMROOM->fLOOR->tOWER->TOWER_NAME,array('readonly'=>true))?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Floor') ?>
        <div><?php echo CHtml::textField('Floor',$model->rOOMROOM->fLOOR->FLOOR_NUMBER,array('readonly'=>true))?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Room Num')?>
        <div><?php echo CHtml::textField('Order[]', $model->rOOMROOM->ROOM_NUMBER, array('readonly'=>true))?></div>
        <?php echo CHtml::hiddenField('Order[ROOM_ROOM_ID]',$model->ROOM_ROOM_ID,array('display'=>'none'))?>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Room Area (Gross)')?>
        <div>
            <?php echo CHtml::textField('Order[asd]',$model->rOOMROOM->ROOM_AREA_GROSS,  array('readonly'=>true))?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model, 'Room Area (Nett)')?>
        <div>
            <?php echo CHtml::textField('Order[Area]',$model->rOOMROOM->ROOM_AREA_NETT)?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Price')?>
        <div>
            <?php echo $form->textField($model,'PRICE',array('readonly'=>true))?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model, 'DISCOUNT') ?>
        <div>
            <?php echo $form->textField($model,'DISCOUNT',array('readonly'=>true))?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model, 'Price after Discount') ?>
        <div>
            <?php echo CHtml::textField('AD',$priceafterdisc,array('readonly'=>true))?>
        </div>
    </section>
    
</fieldset>
<fieldset>
    <label>Payment</label>
    <section>
        <?php echo $form->labelEx($model,'Payment Type')?>
        <div>
            <?php echo CHtml::textField('PT_NAME', $model->pT->PT_NAME, array('readonly'=>true)) ?>
            <?php echo CHtml::hiddenField('Order[PT_ID]', $model->PT_ID) ?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Booking Fee') ?>
        <div>
            <?php echo $form->textField($model,'BOOKING_FEE',array('readonly'=>true)) ?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Booking Payment') ?>
        <div>
            <?php echo CHtml::textField('BF_PT_ID', $model->bFPT->PT_NAME, array('readonly'=>true,'class'=>'g2')) ?>
            <?php echo CHtml::hiddenField('Order[BF_PT_ID]', $model->BF_PT_ID) ?>
            <?php echo $form->labelEx($model,'date',array('class'=>'g1')) ?>
            <?php echo $form->textField($model,'BF_DATE',array('readonly'=>TRUE,'class'=>'g2'))?>
        </div>
    </section>
</fieldset>
<fieldset>
    <label>Down Payment</label>
    <section>
        <?php echo $form->labelEx($model,'Down Payment Times')?>
        <div><?php echo CHtml::textField('Order[ADVANCE_PAYMENT_TIMES]')?></div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Down Payment Cost %') ?>
        <div>
            <?php echo CHtml::textField('DPC','',array('class'=>'g1'))?>
            <?php echo CHtml::textField('Order[ADVANCE_PAYMENT_FEE]','',array('class'=>'g2','readonly'=>true))?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'First Down Payment')?>
        <div>
            <?php echo CHtml::textField('Order[ADVANCE_PAYMENT_1]','',array('readonly'=>true,'class'=>'g3'))?>
            <?php echo $form->labelEx($model,'date') ?>
            <?php echo CHtml::textField('Order[AP1_DATE]','',array('class'=>'date'))?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Rest of Down Payment')?>
        <div>
            <?php echo CHtml::textField('Order[ADVANCE_PAYMENT]','',array('readonly'=>true,'class'=>'g3'))?>
            <?php echo $form->labelEx($model,'Date Begin') ?>
            <?php echo CHtml::textField('Order[AP_DATE_BEGIN]','',array('class'=>'date'))?>
            <?php echo $form->labelEx($model,'Date End') ?>
            <?php echo CHtml::textField('Order[AP_DATE_END]','',array('class'=>'date'))?>
        </div>
    </section>
</fieldset>
<fieldset>
    <label>Rest of Payment</label>
    <section>
       <?php echo $form->labelEx($model,'Payment Type')?>
        <div>
            <?php echo CHtml::dropDownList('Order[RM_PT_ID]', '', $model->getRMPayment(),array('class'=>'g2'))?>
            <?php echo CHtml::textField('Order[RM_PERCENT]','',array('class'=>'g1 notAng'));
                echo CHtml::label('%','lbl',array('class'=>'g1 notAng') ); 
                echo $form->labelEx($model,'Payment times',array('class'=>'g2 Ang'));
            echo $form->textField($model,'RM_INSTALLMENT_TIMES',array('class'=>'g5 Ang'));
                ?>
        </div>
    </section>
    <section>
        <?php echo $form->labelEx($model,'Remaining Payment')?>
        <div>
            <?php echo $form->textField($model,'RM_COST',array('class'=>'g3'))?>
            <?php echo CHtml::label('Date', 'Rmdate',array('class'=>'g1'));
            echo CHtml::textField('Order[RM_PAYMENT_DATE]', '',array('class'=>'date'));
            echo CHtml::label('Date Begin', 'Rmdate1',array('class'=>'g1 Ang'));
            echo CHtml::textField('Order[RM_INSTALLMENT_DATE_BEGIN]','',array('class'=>'date Ang g3'));
            echo CHtml::label('Date End', 'Rmdate2',array('class'=>'g1 Ang'));
            echo CHtml::textField('Order[RM_INSTALLMENT_DATE_END]','',array('class'=>'date Ang g3'));
                    ?>
        </div>
    </section>
</fieldset>
<fieldset>
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
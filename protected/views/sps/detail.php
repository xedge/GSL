<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
</script>
<h1>Order Detail</h1>
<div class="g12">
    <h1 align="center"> ID :<?php echo $model->ORDER_ID?></h1>
</div>
<div class="g6 accord">
    <h2>Buyer</h2>
    <div class="g12">
        <?php echo CHtml::label('Full Name', 'BUYER_NAMEL',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->bUYERIdBUYER->BUY_NAME, 'BUYER_NAME',  array('class'=>'g5'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('ID', 'IDL',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->bUYERIdBUYER->NO_ID, 'BUYER_ID',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Address By id', 'BUYER_ADDR_IDL',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->bUYERIdBUYER->ADDRESS_BY_ID, 'BUYER_ADDR_ID',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Address', 'BUYER_ADDR',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->bUYERIdBUYER->ADDRESS_BY_ID, 'ADDRESS',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Phone Number', 'pnl',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->bUYERIdBUYER->PHONE_NUM, 'BUYER_PN',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Mobile Number', 'mnl',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->bUYERIdBUYER->HP_NUM, 'BUYER_HPN',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Fax Number', 'fnl',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->bUYERIdBUYER->FAX_NUM, 'BUYER_FN',  array('class'=>'g7'))
        ?>
    </div>
</div>
<div class="g6">
    <h2>Order</h2>
    <div class="g12">
        <?php echo CHtml::label('TOWER', 'twl',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->rOOMROOM->fLOOR->tOWER->TOWER_NAME, 'TWN',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Floor', 'twl',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->rOOMROOM->fLOOR->FLOOR_NUMBER, 'FN',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Room Number', 'twl',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->rOOMROOM->ROOM_NUMBER, 'RN',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Area', 'twl',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->rOOMROOM->ROOM_AREA_GROSS, 'RN',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Price', 'PRICEL',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label('Rp. '.number_format($model->PRICE,2,',','.'), 'PRICE',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Discount', 'dscl',array('class'=>'g3'));
            echo CHtml::label($model->DISCOUNT/$model->PRICE*100 . '%','DSCP',array('class'=>'g1'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label('Rp. '.number_format($model->DISCOUNT,2,',','.'), 'DISCOUNT',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Price after Disc.', 'padl',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label('Rp. '.number_format($model->PRICE-$model->DISCOUNT,2,',','.'), 'pad',  array('class'=>'g7'))
        ?>
    </div>
</div>
<div class="g12">
    <h2>Payment</h2>
    <div class="g12">
        <?php echo CHtml::label('Payment Type', 'ptl',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label($model->pT->PT_NAME, 'pt',  array('class'=>'g7'))
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Booking Fee', 'BFL',array('class'=>'g4'));
            echo CHtml::label(':','',array('class'=>'g1'));
            echo CHtml::label('RP. '. number_format( $model->BOOKING_FEE,2,',','.'), 'BF',  array('class'=>'g7'));
            echo '<div class="g5"></div>';
            echo CHtml::label($model->bFPT->PT_NAME, 'BF_PT',array('class'=>'g2'));
            echo CHtml::label('Date', 'dbfpt',array('class'=>'g2'));
            echo CHtml::label(': '.$model->BF_DATE, 'dbf',array('class'=>'g3'));
        ?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('Total Down Payment','DP',array('class'=>'g4'));
            echo CHtml::label(':', '',array('class'=>'g1'));
            echo CHtml::label($model->ADVANCE_PAYMENT_FEE/($model->PRICE-$model->DISCOUNT) * 100 . '%', "DPF",array('class'=>'g2'));
            echo CHtml::label('Rp. '.  number_format($model->ADVANCE_PAYMENT_FEE,2,',','.'),'DPF',array('class'=>'g5'));
        ?>
    </div>
    <div class="g12">
        <?php 
            echo CHtml::label('1st Down Payment', 'FDP',array('class'=>'g4'));
            echo CHtml::label(':', '',array('class'=>'g1'));
            echo CHtml::label('Rp. '. number_format($model->ADVANCE_PAYMENT_1,0,',','.'), 'FPDV',array('class'=>'g3'));
            echo CHtml::label('Date ', '',array('class'=>'g1'));
            echo CHtml::label(': '. $model->AP1_DATE, 'FPDVD',array('class'=>'g3'));
        ?>
    </div>
</div>
<div>
     <?php if(Yii::app()->user->roles=='Marketing Manager' && $model->ORDER_STATUS==NULL) {
     echo CHtml::link('Approve',array('sps/approve','orderId'=>$model->ORDER_ID),array('class'=>'btn'));
     }
     else if(Yii::app()->user->roles=='Marketing Manager' && $model->ORDER_STATUS=='Approved')
     {
         echo CHtml::link('Cancel',array('sps/cancel','orderId'=>$model->ORDER_ID),array('class'=>'btn'));
     }
     ?>
</div>

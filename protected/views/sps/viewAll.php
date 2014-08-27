<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script type="text/javascript">
    $(function(){
        $('#tabel').dataTable();
    })
</script>
<div class="g12">
    <h1>Order List</h1>
    
    <table id="tabel">
        <thead>
            <tr>
                <th>
                    Order ID
                </th>
                <th>
                    Order Date
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($model as $record){?>
            <tr>
                <td>
                    <?php echo $record->ORDER_ID?>
                </td>
                <td>
                    <?php echo $record->DATE_ORDER ?>
                </td>
                <td>
                    <?php echo CHtml::link('Detail',array('sps/detail','orderId'=>$record->ORDER_ID),array('class'=>'btn'))?>
                    <?php if (Yii::app()->user->roles=='Admin' && empty($record->REMAINING_BF))
                        echo CHtml::link('Payment',array('sps/payment','orderId'=>$record->ORDER_ID),array('class'=>'btn'))?>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
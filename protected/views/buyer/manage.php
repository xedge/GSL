<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="g12">
    <h1>Manage Buyer</h1>
    
    <table class="datatable">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Full Name
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($model as $record) {?>
            <tr class="gradeA">
                <td style="vertical-align:middle">
                    <?php echo $record->NO_ID ?>
                </td>
                <td style="vertical-align:middle">
                    <?php echo $record->BUY_NAME?>
                </td>
                <td>
                    <?php echo CHtml::link('',array('buyer/detail','id'=>$record->idBUYER),array('class'=>' btn i_document')) ?>
                    <?php echo CHtml::link('',array('buyer/update','id'=>$record->idBUYER),array('class'=>' btn i_pencil')) ?>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
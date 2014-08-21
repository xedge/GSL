<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="g12">
    <h1>Manage User</h1>
    
    <table class="datatable">
        <thead>
            <tr>
                <th>
                    User Id
                </th>
                <th>
                    User Name
                </th>
                <th>
                    User Type
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($model as $record){?>
            <tr class="gradeA">
                <td style="vertical-align:middle">
                    <?php echo $record->USER_ID ?>
                </td>
                <td style="vertical-align:middle">
                    <?php echo $record->USER_NAME?>
                </td>
                <td style="vertical-align:middle">
                    <?php echo $record->uT->UT_NAME ?>
                </td>
                <td>
                    <?php echo CHtml::link('',array('user2/update','id'=>$record->USER_ID),array('class'=>' btn i_pencil')) ?>
                    <?php echo CHtml::link('',array('user2/detail','id'=>$record->USER_ID),array('class'=>' btn i_document')) ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

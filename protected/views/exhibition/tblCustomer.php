<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<table id="custable">
    <thead>
        <tr>
            <th>
                Customer Name
            </th>
            <th>
                Customer Phone
            </th>
            <th>
                Customer Status
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model as $record) {?>
        <tr>
            <td>
                <?php echo $record->CUST_NAME ?>
            </td>
            <td>
                <?php echo $record->PHONE_NUM ?>
            </td>
            <td>
                <?php echo $record->cUSTOMERTYPECT->CT_NAME ?>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
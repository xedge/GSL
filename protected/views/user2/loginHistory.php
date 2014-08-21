<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="g12">
    <h1>Login History</h1>
    
    <table class="datatable">
        <thead>
            <tr>
                <th>
                    User Name
                </th>
                <th>
                    Name
                </th>
                <th>
                    Date
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model as $record){?>
            <tr class="gradeA">
                <td>
                    <?php echo $record->uSERUSER->USER_NAME?>
                </td>
                <td>
                    <?php echo $record->uSERUSER->NAME?>
                </td>
                <td>
                    <?php echo $record->DATE?>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
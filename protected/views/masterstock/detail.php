<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3>Room No. <?php echo $model->ROOM_NUMBER?></h3>
<?php echo CHtml::label('Status', 'stsLbl')?> : <?php echo CHtml::label($model->STATUS, 'Lbl')?> 
<br/>

<?php if($model->STATUS=='SOLD')
{    
    echo CHtml::link ('Cancel',array('masterstock/cancel&&roomid='.$model->ROOM_ID),array('class'=>'btn'));
}
else
{
    echo CHtml::link('Sell',array('masterstock/sold&&roomid='.$model->ROOM_ID),array('class'=>'btn'));
}
        ?>



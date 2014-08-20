<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->USER_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSWORD')); ?>:</b>
	<?php echo CHtml::encode($data->PASSWORD); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('UT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->getRelated('uT')->UT_NAME); ?>
	<br />

</div>
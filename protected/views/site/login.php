<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<script type="text/javascript">
$(document).ready(function(){
    $("input").uniform();
})
</script>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'loginform',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	
        <fieldset>
            <label>Login</label>
              <p class="note">Fields with <span class="required">*</span> are required.</p>
<p>Please fill out the following form with your login credentials:</p>

            <section>
        	<?php echo $form->labelEx($model,'username'); ?>
                <div>
		<?php echo $form->textField($model,'username'); ?>
                </div>
		<?php echo $form->error($model,'username'); ?>
            </section>
            
            <section>
		<?php echo $form->labelEx($model,'password'); ?>
                <div>
		<?php echo $form->passwordField($model,'password'); ?>
                    <?php echo $form->error($model,'password'); ?>
		<p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p>
                </div>
		
                <div>
		<?php echo $form->checkBox($model,'rememberMe'); ?>
                
                    <?php echo $form->label($model,'rememberMe'); ?>
                </div>
            </section>
            <section>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
            </section>
        </fieldset>
<?php $this->endWidget(); ?>
</div><!-- form -->

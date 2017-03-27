<div id="loginContainer" style="
    margin: auto;
    margin-top: 200px;
    width: 30%;
    border: 3px solid #C9E0ED;
    padding: 10px;">

<h1 style="text-align: center;">Formularz logowania</h1>

<div class="form" id="loginForm" style="margin-left: 20px;">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Pola z <span class="required">*</span> są wymagane.</p>

	<div class="row" style="padding: 10px;">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row" style="padding: 10px;">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe" style="padding: 10px;">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons" style="padding: 10px;">
		<?php echo CHtml::submitButton('Zaloguj'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>

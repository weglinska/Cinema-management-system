<?php
/* @var $this SalaController */
/* @var $model Sala */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sala-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola z <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sala_id'); ?>
		<?php echo $form->textField($model,'sala_id'); ?>
		<?php echo $form->error($model,'sala_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pietro'); ?>
		<?php echo $form->textField($model,'pietro'); ?>
		<?php echo $form->error($model,'pietro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'liczba_siedzen'); ?>
		<?php echo $form->textField($model,'liczba_siedzen'); ?>
		<?php echo $form->error($model,'liczba_siedzen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rzedy'); ?>
		<?php echo $form->textField($model,'rzedy'); ?>
		<?php echo $form->error($model,'rzedy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kolumny'); ?>
		<?php echo $form->textField($model,'kolumny'); ?>
		<?php echo $form->error($model,'kolumny'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
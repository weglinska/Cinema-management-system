<?php
/* @var $this FilmController */
/* @var $model Film */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'film-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola z <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tytul'); ?>
		<?php echo $form->textField($model,'tytul',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'tytul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'premiera'); ?>
		<?php echo $form->textField($model,'premiera'); ?>
		<?php echo $form->error($model,'premiera'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gatunek'); ?>
		<?php echo $form->textField($model,'gatunek',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'gatunek'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rezyser'); ?>
		<?php echo $form->textField($model,'rezyser',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'rezyser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'czas_trwania'); ?>
		<?php echo $form->textField($model,'czas_trwania'); ?>
		<?php echo $form->error($model,'czas_trwania'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
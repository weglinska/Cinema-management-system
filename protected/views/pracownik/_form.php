<?php
/* @var $this PracownikController */
/* @var $model Pracownik */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pracownik-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola z <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'imie'); ?>
		<?php echo $form->textField($model,'imie',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'imie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nazwisko'); ?>
		<?php echo $form->textField($model,'nazwisko',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'nazwisko'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
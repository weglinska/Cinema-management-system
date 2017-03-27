<?php
/* @var $this SalaController */
/* @var $model Sala */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'sala_id'); ?>
		<?php echo $form->textField($model,'sala_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pietro'); ?>
		<?php echo $form->textField($model,'pietro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'liczba_siedzen'); ?>
		<?php echo $form->textField($model,'liczba_siedzen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rzedy'); ?>
		<?php echo $form->textField($model,'rzedy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kolumny'); ?>
		<?php echo $form->textField($model,'kolumny'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Szukaj'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
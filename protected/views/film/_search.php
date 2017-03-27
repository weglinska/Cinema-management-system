<?php
/* @var $this FilmController */
/* @var $model Film */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'film_id'); ?>
		<?php echo $form->textField($model,'film_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tytul'); ?>
		<?php echo $form->textField($model,'tytul',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'premiera'); ?>
		<?php echo $form->textField($model,'premiera'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gatunek'); ?>
		<?php echo $form->textField($model,'gatunek',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rezyser'); ?>
		<?php echo $form->textField($model,'rezyser',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'czas_trwania'); ?>
		<?php echo $form->textField($model,'czas_trwania'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Szukaj'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
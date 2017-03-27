<?php
/* @var $this BiletSprzedawcaController */
/* @var $model BiletSprzedawca */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'bilet_id'); ?>
		<?php echo $form->textField($model,'bilet_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'znizka'); ?>
		<?php echo $form->textField($model,'znizka'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cena'); ?>
		<?php echo $form->textField($model,'cena'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tytul'); ?>
		<?php echo $form->textField($model,'tytul',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data'); ?>
		<?php echo $form->textField($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'godzina'); ?>
		<?php echo $form->textField($model,'godzina'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->label($model,'numer_sali'); ?>
		<?php echo $form->textField($model,'numer_sali'); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'rzad'); ?>
		<?php echo $form->textField($model,'rzad'); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'miejsce'); ?>
		<?php echo $form->textField($model,'miejsce'); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'sprzedawca'); ?>
		<?php echo $form->textField($model,'sprzedawca'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Szukaj'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
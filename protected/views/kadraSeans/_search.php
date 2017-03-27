<?php
/* @var $this KadraSeansController */
/* @var $model KadraSeans */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'data'); ?>
		<?php echo $form->textField($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'godzina'); ?>
		<?php echo $form->textField($model,'godzina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sala_id'); ?>
		<?php echo $form->textField($model,'sala_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tytul'); ?>
		<?php echo $form->textField($model,'tytul',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'column_3d'); ?>
		<?php echo $form->textField($model,'column_3d'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sprzatacz'); ?>
		<?php echo $form->textField($model,'sprzatacz',array('size'=>40,'maxlength'=>40)); ?>
	</div>
        
        <div class="row">
		<?php echo $form->label($model,'kontroler'); ?>
		<?php echo $form->textField($model,'kontroler',array('size'=>40,'maxlength'=>40)); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'operator'); ?>
		<?php echo $form->textField($model,'operator',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Szukaj'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
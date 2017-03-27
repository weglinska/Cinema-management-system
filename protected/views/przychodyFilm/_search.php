<?php
/* @var $this PrzychodyFilmController */
/* @var $model PrzychodyFilm */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'od'); ?>
		<?php echo $form->dateField($model,'od'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'do'); ?>
		<?php echo $form->dateField($model,'do'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Generuj'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
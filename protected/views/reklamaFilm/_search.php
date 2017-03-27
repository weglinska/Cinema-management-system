<?php
/* @var $this ReklamaFilmController */
/* @var $model ReklamaFilm */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

        <div class="row">
		<?php echo $form->label($model,'tytul'); ?>
		<?php echo $form->textField($model,'tytul',array('size'=>40,'maxlength'=>40)); ?>
	</div>
    
	<div class="row">
		<?php echo $form->label($model,'reklamowany_produkt'); ?>
		<?php echo $form->textField($model,'reklamowany_produkt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wydawca'); ?>
		<?php echo $form->textField($model,'wydawca'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Szukaj'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
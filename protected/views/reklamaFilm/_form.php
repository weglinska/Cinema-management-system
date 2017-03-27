<?php
/* @var $this ReklamaFilmController */
/* @var $model ReklamaFilm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reklamaFilm-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
)); ?>

	<p class="note">Pola z <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
		<?php echo $form->labelEx($model,'tytul'); ?>
		<?php 
                      $models = Film::model()->findAll(array('order' => 'tytul'));      // retrieve the models from db
                      $list = CHtml::listData($models,'film_id', 'tytul');              // format models as $key=>$value with listData
                      if(empty($model->tytul)){
                          echo $form->dropDownList($model, 'tytul', $list, array('empty' => '(Wybierz film)'));
                      }
                      else{
                          $film=Film::model()->findByAttributes(array('tytul'=>$model->tytul), 'tytul=:tytul', array(':tytul'=>$model->tytul));
                          echo $form->dropDownList($model, 'tytul', $list, array('options' => array($film['film_id']=>array('selected'=>true))));
                      }
                ?>
		<?php echo $form->error($model,'tytul'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'reklamowany_produkt'); ?>
		<?php echo $form->textField($model,'reklamowany_produkt'); ?>
		<?php echo $form->error($model,'reklamowany_produkt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wydawca'); ?>
		<?php echo $form->textField($model,'wydawca'); ?>
		<?php echo $form->error($model,'wydawca'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
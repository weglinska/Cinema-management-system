<?php
/* @var $this BiletSprzedawcaController */
/* @var $model BiletSprzedawca */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'biletSprzedawca-form',
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
		<?php echo $form->labelEx($model,'znizka'); ?>
		<?php echo $form->dropDownList($model, 'znizka', array(false => 'Nie', true => 'Tak')); ?>
		<?php echo $form->error($model,'znizka'); ?>
	</div>
      
        <div class="row">
		<?php echo $form->labelEx($model,'seans_id'); ?>
		<?php 
                      $list=Seans::model()->getAllForDropDownList();
                      //$models = Film::model()->findAll(array('order' => 'seans'));      // retrieve the models from db
                      //$list = CHtml::listData($models,'film_id', 'tytul');              // format models as $key=>$value with listData
                      if(empty($model->tytul)){
                          echo $form->dropDownList($model, 'seans_id', $list, array('empty' => '(Wybierz seans)'));
                      }
                      else{
                          $film_id = Film::model()->getFilmId($model->tytul);
                          $seans=Seans::model()->findByAttributes(
                                array('film_id'=>$film_id, 'data'=>$model->data, 'godzina'=>$model->godzina, 'sala_id'=>$model->numer_sali),
                                'film_id=:pfilm_id AND data=:pdata AND godzina=:pgodzina AND sala_id=:pnumer_sali',
                                array(':pfilm_id'=>$film_id, ':pdata'=>$model->data, ':pgodzina'=>$model->godzina, ':pnumer_sali'=>$model->numer_sali));
                          echo $form->dropDownList($model, 'seans_id', $list, array('options' => array($seans['seans_id']=>array('selected'=>true))));
                      }
                ?>
		<?php echo $form->error($model,'tytul'); ?>
	</div>
           
        <div class="row">
		<?php echo $form->labelEx($model,'rzad'); ?>
		<?php echo $form->numberField($model,'rzad'); ?>
		<?php echo $form->error($model,'rzad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'miejsce'); ?>
		<?php echo $form->numberField($model,'miejsce'); ?>
		<?php echo $form->error($model,'miejsce'); ?>
	</div>
  
        <div class="row">
		<?php echo $form->labelEx($model,'sprzedawca'); ?>
		<?php 
                      $models = Pracownik::model()->findAll(array('order' => 'nazwisko'));      // retrieve the models from db
                      $list = CHtml::listData($models,'pracownik_id', 'nazwisko');              // format models as $key=>$value with listData
                      if(empty($model->sprzedawca)){
                          echo $form->dropDownList($model, 'sprzedawca', $list, array('empty' => '(Wybierz osobę sprzątającą)'));
                      }
                      else{
                          $pracownik=Pracownik::model()->findByAttributes(array('nazwisko'=>$model->sprzedawca), 'nazwisko=:nazwisko', array(':nazwisko'=>$model->sprzedawca));
                          echo $form->dropDownList($model, 'sprzedawca', $list, array('options' => array($pracownik['pracownik_id']=>array('selected'=>true))));
                      }
                ?>
		<?php echo $form->error($model,'sprzedawca'); ?>
	</div>
     
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
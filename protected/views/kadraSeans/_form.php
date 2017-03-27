<?php
/* @var $this KadraSeansController */
/* @var $model KadraSeans */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kadraSeans-form',
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
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->dateField($model,'data'); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'godzina'); ?>
		<?php echo $form->timeField($model,'godzina'); ?>
		<?php echo $form->error($model,'godzina'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sala_id'); ?>
		<?php 
                      $models = Sala::model()->findAll(array('order' => 'sala_id'));      // retrieve the models from db
                      $list = CHtml::listData($models,'sala_id', 'sala_id');              // format models as $key=>$value with listData
                      echo $form->dropDownList($model, 'sala_id', $list, array('empty' => '(Wybierz salę)'));
                ?>
		<?php echo $form->error($model,'sala_id'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'column_3d'); ?>
		<?php echo $form->dropDownList($model, 'column_3d', array(false => 'Nie', true => 'Tak')); ?>
		<?php echo $form->error($model,'column_3d'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sprzatacz'); ?>
		<?php 
                      $models = Pracownik::model()->findAll(array('order' => 'nazwisko'));      // retrieve the models from db
                      $list = CHtml::listData($models,'pracownik_id', 'nazwisko');              // format models as $key=>$value with listData
                      if(empty($model->sprzatacz)){
                          echo $form->dropDownList($model, 'sprzatacz', $list, array('empty' => '(Wybierz osobę sprzątającą)'));
                      }
                      else{
                          $pracownik=Pracownik::model()->findByAttributes(array('nazwisko'=>$model->sprzatacz), 'nazwisko=:nazwisko', array(':nazwisko'=>$model->sprzatacz));
                          echo $form->dropDownList($model, 'sprzatacz', $list, array('options' => array($pracownik['pracownik_id']=>array('selected'=>true))));
                      }
                ?>
		<?php echo $form->error($model,'sprzatacz'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'kontroler'); ?>
		<?php 
                      $models = Pracownik::model()->findAll(array('order' => 'nazwisko'));      // retrieve the models from db
                      $list = CHtml::listData($models,'pracownik_id', 'nazwisko');              // format models as $key=>$value with listData
                      if(empty($model->kontroler)){
                          echo $form->dropDownList($model, 'kontroler', $list, array('empty' => '(Wybierz kontrolera)'));
                      }
                      else{
                          $pracownik=Pracownik::model()->findByAttributes(array('nazwisko'=>$model->kontroler), 'nazwisko=:nazwisko', array(':nazwisko'=>$model->kontroler));
                          echo $form->dropDownList($model, 'kontroler', $list, array('options' => array($pracownik['pracownik_id']=>array('selected'=>true))));
                      }
                ?>
		<?php echo $form->error($model,'kontroler'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'operator'); ?>
		<?php 
                      $models = Pracownik::model()->findAll(array('order' => 'nazwisko'));      // retrieve the models from db
                      $list = CHtml::listData($models,'pracownik_id', 'nazwisko');              // format models as $key=>$value with listData
                      if(empty($model->operator)){
                          echo $form->dropDownList($model, 'operator', $list, array('empty' => '(Wybierz operatora)'));
                      }
                      else{
                          $pracownik=Pracownik::model()->findByAttributes(array('nazwisko'=>$model->operator), 'nazwisko=:nazwisko', array(':nazwisko'=>$model->operator));
                          echo $form->dropDownList($model, 'operator', $list, array('options' => array($pracownik['pracownik_id']=>array('selected'=>true))));
                      }
                ?>
		<?php echo $form->error($model,'operator'); ?>
                
                <?php 
                //echo CHtml::dropDownList('operatorzy', $category, $list, array('empty' => '(Select a category)'));
                 ?>
                
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
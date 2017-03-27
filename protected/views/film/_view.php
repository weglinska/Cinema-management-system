<?php
/* @var $this FilmController */
/* @var $data Film */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('film_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->film_id), array('view', 'id'=>$data->film_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tytul')); ?>:</b>
	<?php echo CHtml::encode($data->tytul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('premiera')); ?>:</b>
	<?php echo CHtml::encode($data->premiera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gatunek')); ?>:</b>
	<?php echo CHtml::encode($data->gatunek); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rezyser')); ?>:</b>
	<?php echo CHtml::encode($data->rezyser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('czas_trwania')); ?>:</b>
	<?php echo CHtml::encode($data->czas_trwania); ?>
	<br />


</div>
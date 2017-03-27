<?php
/* @var $this SalaController */
/* @var $data Sala */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sala_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sala_id), array('view', 'id'=>$data->sala_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pietro')); ?>:</b>
	<?php echo CHtml::encode($data->pietro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('liczba_siedzen')); ?>:</b>
	<?php echo CHtml::encode($data->liczba_siedzen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rzedy')); ?>:</b>
	<?php echo CHtml::encode($data->rzedy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kolumny')); ?>:</b>
	<?php echo CHtml::encode($data->kolumny); ?>
	<br />


</div>
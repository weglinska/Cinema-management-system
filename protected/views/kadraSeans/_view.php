<?php
/* @var $this KadraSeansController */
/* @var $data KadraSeans */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('godzina')); ?>:</b>
	<?php echo CHtml::encode($data->godzina); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('sala_id')); ?>:</b>
	<?php echo CHtml::encode($data->sala_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tytul')); ?>:</b>
	<?php echo CHtml::encode($data->tytul); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('column_3d')); ?>:</b>
	<?php echo CHtml::encode(empty($data->column_3d) ? 'Nie' : 'Tak'); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('sprzatacz')); ?>:</b>
	<?php echo CHtml::encode($data->sprzatacz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontroler')); ?>:</b>
	<?php echo CHtml::encode($data->kontroler); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('operator')); ?>:</b>
	<?php echo CHtml::encode($data->operator); ?>
	<br />


</div>
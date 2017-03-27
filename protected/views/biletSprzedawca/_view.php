<?php
/* @var $this BiletSprzedawcaController */
/* @var $data BiletSprzedawca */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bilet_id')); ?>:</b>
	<?php echo CHtml::encode($data->bilet_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('znizka')); ?>:</b>
	<?php echo CHtml::encode($data->znizka); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('cena')); ?>:</b>
	<?php echo CHtml::encode($data->cena); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tytul')); ?>:</b>
	<?php echo CHtml::encode($data->tytul); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('godzina')); ?>:</b>
	<?php echo CHtml::encode($data->godzina); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('numer_sali')); ?>:</b>
	<?php echo CHtml::encode($data->numer_sali); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('rzad')); ?>:</b>
	<?php echo CHtml::encode($data->rzad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miejsce')); ?>:</b>
	<?php echo CHtml::encode($data->miejsce); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('sprzedawca')); ?>:</b>
	<?php echo CHtml::encode($data->sprzedawca); ?>
	<br />


</div>
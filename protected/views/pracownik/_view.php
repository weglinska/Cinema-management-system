<?php
/* @var $this PracownikController */
/* @var $data Pracownik */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pracownik_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pracownik_id), array('view', 'id'=>$data->pracownik_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imie')); ?>:</b>
	<?php echo CHtml::encode($data->imie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nazwisko')); ?>:</b>
	<?php echo CHtml::encode($data->nazwisko); ?>
	<br />


</div>
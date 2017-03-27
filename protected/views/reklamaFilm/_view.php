<?php
/* @var $this ReklamaFilmController */
/* @var $data ReklamaFilm */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tytul')); ?>:</b>
	<?php echo CHtml::encode($data->tytul); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('reklamowany_produkt')); ?>:</b>
	<?php echo CHtml::encode($data->reklamowany_produkt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wydawca')); ?>:</b>
	<?php echo CHtml::encode($data->wydawca); ?>
	<br />


</div>
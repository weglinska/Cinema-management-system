<?php
/* @var $this PrzychodyFilmController */
/* @var $data PrzychodyFilm */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tytul')); ?>:</b>
	<?php echo CHtml::encode($data->tytul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('przychod')); ?>:</b>
	<?php echo CHtml::encode($data->przychod); ?>
	<br />


</div>
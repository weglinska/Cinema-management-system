<?php
/* @var $this BiletSprzedawcaController */
/* @var $model BiletSprzedawca */

$this->breadcrumbs=array(
	'Sprzedane bilety'=>array('index'),
	'Dodaj',
);

$this->menu=array(
	array('label'=>'Lista biletów', 'url'=>array('index')),
	array('label'=>'Zarządzanie biletami', 'url'=>array('admin')),
);
?>

<h1>Dodaj bilet</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
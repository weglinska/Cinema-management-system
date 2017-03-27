<?php
/* @var $this BiletSprzedawcaController */
/* @var $model BiletSprzedawca */

$this->breadcrumbs=array(
	'Sprzedane bilety'=>array('index'),
	//$model->film_id=>array('view','id'=>$model->film_id),
	'Aktualizuj',
);

$this->menu=array(
	array('label'=>'Lista biletów', 'url'=>array('index')),
	array('label'=>'Dodaj bilet', 'url'=>array('create')),
	//array('label'=>'Widok seansu', 'url'=>array('view', 'id'=>$model->film_id)),
	array('label'=>'Zarządzaj biletami', 'url'=>array('admin')),
);
?>

<h1>Aktualizuj seans </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
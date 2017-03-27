<?php
/* @var $this KadraSeansController */
/* @var $model KadraSeans */

$this->breadcrumbs=array(
	'Seanse'=>array('index'),
	//$model->film_id=>array('view','id'=>$model->film_id),
	'Aktualizuj',
);

$this->menu=array(
	array('label'=>'Lista seansów', 'url'=>array('index')),
	array('label'=>'Dodaj seans', 'url'=>array('create')),
	//array('label'=>'Widok seansu', 'url'=>array('view', 'id'=>$model->film_id)),
	array('label'=>'Zarządzaj seansami', 'url'=>array('admin')),
);
?>

<h1>Aktualizuj seans </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
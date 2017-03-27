<?php
/* @var $this KadraSeansController */
/* @var $model KadraSeans */

$this->breadcrumbs=array(
	'Seanse'=>array('index'),
	'Dodaj',
);

$this->menu=array(
	array('label'=>'Lista seansów', 'url'=>array('index')),
	array('label'=>'Zarządzanie seansami', 'url'=>array('admin')),
);
?>

<h1>Dodaj seans</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this SalaController */
/* @var $model Sala */

$this->breadcrumbs=array(
	'Sale'=>array('index'),
	'Dodaj',
);

$this->menu=array(
	array('label'=>'Lista sal', 'url'=>array('index')),
	array('label'=>'Zarządzaj salami', 'url'=>array('admin')),
);
?>

<h1>Dodaj salę</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
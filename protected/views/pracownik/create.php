<?php
/* @var $this PracownikController */
/* @var $model Pracownik */

$this->breadcrumbs=array(
	'Pracownicy'=>array('index'),
	'Dodaj',
);

$this->menu=array(
	array('label'=>'Lista pracowników', 'url'=>array('index')),
	array('label'=>'Zarządzaj pracownikami', 'url'=>array('admin')),
);
?>

<h1>Dodaj pracownika</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
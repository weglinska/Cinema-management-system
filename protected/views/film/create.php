<?php
/* @var $this FilmController */
/* @var $model Film */

$this->breadcrumbs=array(
	'Filmy'=>array('index'),
	'Dodaj',
);

$this->menu=array(
	array('label'=>'Lista filmów', 'url'=>array('index')),
	array('label'=>'Zarządzaj filmami', 'url'=>array('admin')),
);
?>

<h1>Dodaj film</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
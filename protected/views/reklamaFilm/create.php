<?php
/* @var $this ReklamaFilmController */
/* @var $model ReklamaFilm */

$this->breadcrumbs=array(
	'Reklamy'=>array('index'),
	'Dodaj',
);

$this->menu=array(
	array('label'=>'Lista reklam', 'url'=>array('index')),
	array('label'=>'Zarządzanie reklamami', 'url'=>array('admin')),
);
?>

<h1>Dodaj reklamę</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
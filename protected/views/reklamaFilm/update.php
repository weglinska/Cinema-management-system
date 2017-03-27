<?php
/* @var $this ReklamaFilmController */
/* @var $model ReklamaFilm */

$this->breadcrumbs=array(
	'Reklamy'=>array('index'),
	//$model->film_id=>array('view','id'=>$model->film_id),
	'Aktualizuj',
);

$this->menu=array(
	array('label'=>'Lista reklam', 'url'=>array('index')),
	array('label'=>'Dodaj reklamę', 'url'=>array('create')),
	//array('label'=>'Widok seansu', 'url'=>array('view', 'id'=>$model->film_id)),
	array('label'=>'Zarządzaj reklamami', 'url'=>array('admin')),
);
?>

<h1>Aktualizuj reklamę </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
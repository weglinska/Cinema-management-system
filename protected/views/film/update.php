<?php
/* @var $this FilmController */
/* @var $model Film */

$this->breadcrumbs=array(
	'Filmy'=>array('index'),
	$model->film_id=>array('view','id'=>$model->film_id),
	'Edycja',
);

$this->menu=array(
	array('label'=>'Lista filmów', 'url'=>array('index')),
	array('label'=>'Dodaj film', 'url'=>array('create')),
	array('label'=>'Widok filmu', 'url'=>array('view', 'id'=>$model->film_id)),
	array('label'=>'Zarządzaj filmami', 'url'=>array('admin')),
);
?>

<h1>Aktualizuj film <?php echo $model->film_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
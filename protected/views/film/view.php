<?php
/* @var $this FilmController */
/* @var $model Film */

$this->breadcrumbs=array(
	'Filmy'=>array('index'),
	$model->film_id,
);

$this->menu=array(
	array('label'=>'Lista filmów', 'url'=>array('index')),
	array('label'=>'Dodaj film', 'url'=>array('create')),
	array('label'=>'Aktualizuj film', 'url'=>array('update', 'id'=>$model->film_id)),
	array('label'=>'Usuń film', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->film_id),'confirm'=>'Jesteś pewien że chcesz usunąć ten element?')),
	array('label'=>'Zarządzaj filmami', 'url'=>array('admin')),
);
?>

<h1>Widok filmu #<?php echo $model->film_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'film_id',
		'tytul',
		'premiera',
		'gatunek',
		'rezyser',
		'czas_trwania',
	),
)); ?>

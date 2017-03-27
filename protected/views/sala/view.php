<?php
/* @var $this SalaController */
/* @var $model Sala */

$this->breadcrumbs=array(
	'Sale'=>array('index'),
	$model->sala_id,
);

$this->menu=array(
	array('label'=>'Lista sal', 'url'=>array('index')),
	array('label'=>'Dodaj salę', 'url'=>array('create')),
	array('label'=>'Edytuj selę', 'url'=>array('update', 'id'=>$model->sala_id)),
	array('label'=>'Usuń salę', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sala_id),'confirm'=>'Jesteś pewien że chcesz usunąć ten element?')),
	array('label'=>'Zarządzaj salami', 'url'=>array('admin')),
);
?>

<h1>Widok sali #<?php echo $model->sala_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sala_id',
		'pietro',
		'liczba_siedzen',
		'rzedy',
		'kolumny',
	),
)); ?>

<?php
/* @var $this SalaController */
/* @var $model Sala */

$this->breadcrumbs=array(
	'Sale'=>array('index'),
	$model->sala_id=>array('view','id'=>$model->sala_id),
	'Edytuj',
);

$this->menu=array(
	array('label'=>'Lista sal', 'url'=>array('index')),
	array('label'=>'Dodaj salę', 'url'=>array('create')),
	array('label'=>'Widok sali', 'url'=>array('view', 'id'=>$model->sala_id)),
	array('label'=>'Zarządzaj salami', 'url'=>array('admin')),
);
?>

<h1>Edytuj salę <?php echo $model->sala_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
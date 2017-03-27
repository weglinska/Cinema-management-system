<?php
/* @var $this KadraSeansController */
/* @var $model KadraSeans */

$this->breadcrumbs=array(
	'Seanse'=>array('index'),
	$model->tytul." ".$model->data." ".$model->godzina." Sala ".$model->sala_id,
);

$this->menu=array(
	array('label'=>'Lista seansów', 'url'=>array('index')),
	array('label'=>'Dodaj seans', 'url'=>array('create')),
	array('label'=>'Aktualizuj seans', 'url'=>array('update', "data"=>$model->data, "godzina"=>$model->godzina, "sala_id"=>$model->sala_id, "tytul"=>$model->tytul, "column_3d"=>$model->column_3d)),
	array('label'=>'Usuń seans', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete',"data"=>$model->data, "godzina"=>$model->godzina, "sala_id"=>$model->sala_id, "tytul"=>$model->tytul, "column_3d"=>$model->column_3d),'confirm'=>'Jesteś pewien że chcesz usunąć ten element?')),
	array('label'=>'Zarządzaj seansami', 'url'=>array('admin')),
);
?>

<h1>Widok seansu</h1>

<?php $updatedModel = $model;
      $updatedModel->column_3d = $model->column_3d?"Tak":"Nie";$this->widget('zii.widgets.CDetailView', array(
	'data'=>$updatedModel,
	'attributes'=>array(
		'data',
		'godzina',
		'sala_id',
		'tytul',
		'column_3d',
		'sprzatacz',
                'kontroler',
                'operator',
	),
)); ?>

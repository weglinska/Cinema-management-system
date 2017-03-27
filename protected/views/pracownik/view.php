<?php
/* @var $this PracownikController */
/* @var $model Pracownik */

$this->breadcrumbs=array(
	'Pracownicy'=>array('index'),
	$model->pracownik_id,
);

$this->menu=array(
	array('label'=>'Lista pracowników', 'url'=>array('index')),
	array('label'=>'Dodaj pracownika', 'url'=>array('create')),
	array('label'=>'Edytuj pracownika', 'url'=>array('update', 'id'=>$model->pracownik_id)),
	array('label'=>'Usuń pracownika', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pracownik_id),'confirm'=>'Jesteś pewien że chcesz usunąć ten element?')),
	array('label'=>'Zarządzaj pracownikami', 'url'=>array('admin')),
);
?>

<h1>Widok pracownika #<?php echo $model->pracownik_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pracownik_id',
		'imie',
		'nazwisko',
	),
)); ?>

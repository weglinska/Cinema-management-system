<?php
/* @var $this KadraSeansController */

$this->breadcrumbs=array(
	'Seanse',
);

$this->menu=array(
	array('label'=>'Dodaj seans', 'url'=>array('create')),
	array('label'=>'Zarządzaj seansami', 'url'=>array('admin')),
);
?>

<h1>Seanse</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
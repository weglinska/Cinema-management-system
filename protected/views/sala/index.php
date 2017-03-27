<?php
/* @var $this SalaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sale',
);

$this->menu=array(
	array('label'=>'Dodaj salę', 'url'=>array('create')),
	array('label'=>'Zarządzaj salą', 'url'=>array('admin')),
);
?>

<h1>Sale</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

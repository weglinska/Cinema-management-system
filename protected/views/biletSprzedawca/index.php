<?php
/* @var $this BiletSprzedawcaController */

$this->breadcrumbs=array(
	'Sprzedane bilety',
);

$this->menu=array(
	array('label'=>'Dodaj bilet', 'url'=>array('create')),
	array('label'=>'Zarządzaj biletami', 'url'=>array('admin')),
);
?>

<h1>Sprzedane bilety</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<?php
/* @var $this PracownikController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pracownicy',
);

$this->menu=array(
	array('label'=>'Dodaj pracownika', 'url'=>array('create')),
	array('label'=>'Zarządzaj pracownikami', 'url'=>array('admin')),
);
?>

<h1>Pracownicy</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

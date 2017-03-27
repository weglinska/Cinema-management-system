<?php
/* @var $this FilmController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Filmy',
);

$this->menu=array(
	array('label'=>'Dodaj film', 'url'=>array('create')),
	array('label'=>'Zarządzaj filmami', 'url'=>array('admin')),
);
?>

<h1>Filmy</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

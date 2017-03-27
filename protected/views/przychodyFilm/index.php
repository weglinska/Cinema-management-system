<?php
/* @var $this PrzychodyFilmController */

$this->breadcrumbs=array(
	'Raporty',
);

$this->menu=array(
	//array('label'=>'Dodaj seans', 'url'=>array('create')),
	array('label'=>'Generuj raport', 'url'=>array('admin')),
);
?>


<h1>Przychody</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
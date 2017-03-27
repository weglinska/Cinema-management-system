<?php
/* @var $this ReklamaFilmController */

$this->breadcrumbs=array(
	'Reklamy',
);

$this->menu=array(
	array('label'=>'Dodaj reklamę', 'url'=>array('create')),
	array('label'=>'Zarządzaj reklamami', 'url'=>array('admin')),
);
?>
<h1>Reklamy</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

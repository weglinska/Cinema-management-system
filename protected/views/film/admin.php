<?php
/* @var $this FilmController */
/* @var $model Film */

$this->breadcrumbs=array(
	'Filmy'=>array('index'),
	'Zarządzaj',
);

$this->menu=array(
	array('label'=>'Lista filmów', 'url'=>array('index')),
	array('label'=>'Dodaj film', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#film-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj filmami</h1>

<p>
Możliwe jest opcjonalne wprowadzenie operatora porównania (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
lub <b>=</b>) na początku każdej z wprowadzonych wartości wyszukiwania w celu określenia jak porównanie powinno zostać wykonane.
</p>

<?php echo CHtml::link('Zaawansowane wyszukiwanie','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'film-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'film_id',
		'tytul',
		'premiera',
		'gatunek',
		'rezyser',
		'czas_trwania',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

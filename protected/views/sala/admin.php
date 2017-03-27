<?php
/* @var $this SalaController */
/* @var $model Sala */

$this->breadcrumbs=array(
	'Sale'=>array('index'),
	'Zarządzaj',
);

$this->menu=array(
	array('label'=>'Lista sal', 'url'=>array('index')),
	array('label'=>'Dodaj salę', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sala-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj salami</h1>

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
	'id'=>'sala-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'sala_id',
		'pietro',
		'liczba_siedzen',
		'rzedy',
		'kolumny',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

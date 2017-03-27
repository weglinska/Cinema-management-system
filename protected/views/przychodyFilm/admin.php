<?php
/* @var $this PrzychodyFilmController */
/* @var $model PrzychodyFilm */

$this->breadcrumbs=array(
	'Raporty'=>array('index'),
	'Generuj',
);

$this->menu=array(
	array('label'=>'Przychody', 'url'=>array('index')),
	//array('label'=>'Dodaj seans', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "$('.search-form').show();
/*$('.search-button').click(function(){
	$('.search-form').show();
	return false;
});*/
$('.search-form form').submit(function(){
	$('#przychodyFilm-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Generuj raport</h1>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'przychodyFilm-grid',
	'dataProvider'=>$model->getReportData(),//$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                    'header' => 'Tytuł',
                    'name' => 'tytul',
                    'filter'=>false,
                ),
                array(
                    'header' => 'Sprzedane bilety',
                    'name' => 'sprzedane_bilety',
                    'filter'=>false,
                ),
                array(
                    'header' => 'Przychód',
                    'name' => 'przychod',
                    'filter'=>false,
                ),
	),
)); ?>

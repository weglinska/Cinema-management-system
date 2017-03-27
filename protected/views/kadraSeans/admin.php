<?php
/* @var $this KadraSeansController */
/* @var $model KadraSeans */

$this->breadcrumbs=array(
	'Seanse'=>array('index'),
	'Zarządzaj',
);

$this->menu=array(
	array('label'=>'Lista seansów', 'url'=>array('index')),
	array('label'=>'Dodaj seans', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kadraSeans-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj seansami</h1>

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
	'id'=>'kadraSeans-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'data',
		'godzina',
		'sala_id',
		'tytul',
                array(            
                    'name'=>'column_3d',
                    'value'=>'$data->column_3d ? "Tak" : "Nie"',
                ),
		'sprzatacz',
                'kontroler',
                'operator',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}{update}{delete}',
                        'deleteConfirmation'=>"Jesteś pewien że chcesz usunąć ten element?",
                        'buttons'=>array
                        (
                            'view' => array
                            (
                                'label'=>'Widok',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                                'url'=>'Yii::app()->createUrl("kadraSeans/view", array("data"=>$data->data, "godzina"=>$data->godzina, "sala_id"=>$data->sala_id, "tytul"=>$data->tytul, "column_3d"=>$data->column_3d))',
                            ),
                            'update' => array
                            (
                                'label'=>'Aktualizuj',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
                                'url'=>'Yii::app()->createUrl("kadraSeans/update", array("data"=>$data->data, "godzina"=>$data->godzina, "sala_id"=>$data->sala_id, "tytul"=>$data->tytul, "column_3d"=>$data->column_3d))',
                            ),
                            'delete' => array
                            (
                                'label'=>'Usuń',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                                'url'=>'Yii::app()->createUrl("kadraSeans/delete", array("data"=>$data->data, "godzina"=>$data->godzina, "sala_id"=>$data->sala_id, "tytul"=>$data->tytul, "column_3d"=>$data->column_3d))',
                            ),

                        ),
		),
	),
)); ?>

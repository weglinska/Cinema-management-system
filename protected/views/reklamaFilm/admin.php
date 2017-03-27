<?php
/* @var $this ReklamaFilmController */
/* @var $model ReklamaFilm */

$this->breadcrumbs=array(
	'Reklamy'=>array('index'),
	'Zarządzaj',
);

$this->menu=array(
	array('label'=>'Lista reklam', 'url'=>array('index')),
	array('label'=>'Dodaj reklamę', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reklamaFilm-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj reklamami</h1>

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
	'id'=>'reklamaFilm-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tytul',
		'reklamowany_produkt',
		'wydawca',
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
                                'url'=>'Yii::app()->createUrl("reklamaFilm/view", array("tytul"=>$data->tytul, "reklamowany_produkt"=>$data->reklamowany_produkt, "wydawca"=>$data->wydawca))',
                            ),
                            'update' => array
                            (
                                'label'=>'Aktualizuj',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
                                'url'=>'Yii::app()->createUrl("reklamaFilm/update", array("tytul"=>$data->tytul, "reklamowany_produkt"=>$data->reklamowany_produkt, "wydawca"=>$data->wydawca))',
                            ),
                            'delete' => array
                            (
                                'label'=>'Usuń',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                                'url'=>'Yii::app()->createUrl("reklamaFilm/delete", array("tytul"=>$data->tytul, "reklamowany_produkt"=>$data->reklamowany_produkt, "wydawca"=>$data->wydawca))',
                            ),

                        ),
		),
	),
)); ?>

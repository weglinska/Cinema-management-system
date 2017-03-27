<?php
/* @var $this BiletSprzedawcaController */
/* @var $model BiletSprzedawca */

$this->breadcrumbs=array(
	'Sprzedane bilety'=>array('index'),
	'Zarządzaj',
);

$this->menu=array(
	array('label'=>'Lista biletów', 'url'=>array('index')),
	array('label'=>'Dodaj bilet', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#biletSprzedawca-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj sprzedanymi biletami</h1>

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
	'id'=>'biletSprzedawca-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'bilet_id',
		array(            
                    'name'=>'znizka',
                    'value'=>'$data->znizka ? "Tak" : "Nie"',
                ),
		'cena',
		'tytul',
                'data',
		'godzina',
                'numer_sali',
                'rzad',
                'miejsce',
                'sprzedawca',
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
                                'url'=>'Yii::app()->createUrl("biletSprzedawca/view", array("bilet_id"=>$data->bilet_id, "znizka"=>$data->znizka, "cena"=>$data->cena, "tytul"=>$data->tytul, "data"=>$data->data, "godzina"=>$data->godzina, "numer_sali"=>$data->numer_sali, "rzad"=>$data->rzad, "miejsce"=>$data->miejsce, "sprzedawca"=>$data->sprzedawca))',
                            ),
                            'update' => array
                            (
                                'label'=>'Aktualizuj',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
                                'url'=>'Yii::app()->createUrl("biletSprzedawca/update", array("bilet_id"=>$data->bilet_id, "znizka"=>$data->znizka, "cena"=>$data->cena, "tytul"=>$data->tytul, "data"=>$data->data, "godzina"=>$data->godzina, "numer_sali"=>$data->numer_sali, "rzad"=>$data->rzad, "miejsce"=>$data->miejsce, "sprzedawca"=>$data->sprzedawca))',
                            ),
                            'delete' => array
                            (
                                'label'=>'Usuń',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                                'url'=>'Yii::app()->createUrl("biletSprzedawca/delete", array("bilet_id"=>$data->bilet_id))',
                            ),

                        ),
		),
	),
)); ?>

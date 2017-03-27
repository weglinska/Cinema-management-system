<?php
/* @var $this ReklamaFilmController */
/* @var $model ReklamaFilm */

$this->breadcrumbs=array(
	'Reklamy'=>array('index'),
	$model->tytul." / ".$model->reklamowany_produkt." / ".$model->wydawca,
);

$this->menu=array(
	array('label'=>'Lista reklam', 'url'=>array('index')),
	array('label'=>'Dodaj reklamę', 'url'=>array('create')),
	array('label'=>'Aktualizuj reklamę', 'url'=>array('update', "tytul"=>$model->tytul, "reklamowany_produkt"=>$model->reklamowany_produkt, "wydawca"=>$model->wydawca)),
	array('label'=>'Usuń reklamę', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', "tytul"=>$model->tytul, "reklamowany_produkt"=>$model->reklamowany_produkt, "wydawca"=>$model->wydawca),'confirm'=>'Jesteś pewien że chcesz usunąć ten element?')),
	array('label'=>'Zarządzaj reklamami', 'url'=>array('admin')),
);
?>

<h1>Widok reklamy</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tytul',
		'reklamowany_produkt',
		'wydawca',
	),
)); ?>

<?php
/* @var $this BiletSprzedawcaController */
/* @var $model BiletSprzedawca */

$this->breadcrumbs=array(
	'Sprzedane bilety'=>array('index'),
	$model->bilet_id,
);

$this->menu=array(
	array('label'=>'Lista biletów', 'url'=>array('index')),
	array('label'=>'Dodaj bilet', 'url'=>array('create')),
	array('label'=>'Aktualizuj bilet', 'url'=>array('update', "bilet_id"=>$model->bilet_id, "znizka"=>$model->znizka, "cena"=>$model->cena, "tytul"=>$model->tytul, "data"=>$model->data, "godzina"=>$model->godzina, "numer_sali"=>$model->numer_sali, "rzad"=>$model->rzad, "miejsce"=>$model->miejsce, "sprzedawca"=>$model->sprzedawca)),
	array('label'=>'Usuń bilet', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete',"bilet_id"=>$model->bilet_id, "znizka"=>$model->znizka, "cena"=>$model->cena, "tytul"=>$model->tytul, "data"=>$model->data, "godzina"=>$model->godzina, "numer_sali"=>$model->numer_sali, "rzad"=>$model->rzad, "miejsce"=>$model->miejsce, "sprzedawca"=>$model->sprzedawca),'confirm'=>'Jesteś pewien że chcesz usunąć ten element?')),
	array('label'=>'Zarządzaj biletami', 'url'=>array('admin')),
);
?>

<h1>Widok biletu</h1>

<?php $updatedModel = $model;
      $updatedModel->znizka = $model->znizka?"Tak":"Nie";
      $this->widget('zii.widgets.CDetailView', array(
	'data'=>$updatedModel,
	'attributes'=>array(
		'bilet_id',
		'znizka',
		'cena',
		'tytul',
		'data',
		'godzina',
                'numer_sali',
                'rzad',
                'miejsce',
                'sprzedawca',
	),
)); ?>

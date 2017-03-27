<?php
/* @var $this PracownikController */
/* @var $model Pracownik */

$this->breadcrumbs=array(
	'Pracownicy'=>array('index'),
	$model->pracownik_id=>array('view','id'=>$model->pracownik_id),
	'Edycja',
);

$this->menu=array(
	array('label'=>'Lista pracowników', 'url'=>array('index')),
	array('label'=>'Dodaj pracownika', 'url'=>array('create')),
	array('label'=>'Widok pracownika', 'url'=>array('view', 'id'=>$model->pracownik_id)),
	array('label'=>'Zarządzaj pracownikami', 'url'=>array('admin')),
);
?>

<h1>Edytuj pracownika <?php echo $model->pracownik_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
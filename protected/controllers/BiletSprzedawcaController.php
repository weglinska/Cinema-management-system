<?php

class BiletSprzedawcaController extends Controller
{       
        /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        
        /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
	public function actionIndex()
	{
		//$this->render('index');
                $dataProvider=new CActiveDataProvider('BiletSprzedawca');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($bilet_id, $znizka, $cena, $tytul, $data, $godzina, $numer_sali, $rzad, $miejsce, $sprzedawca)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($bilet_id, $znizka, $cena, $tytul, $data, $godzina, $numer_sali, $rzad, $miejsce, $sprzedawca),
		));
	}
        
        /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new BiletSprzedawca;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BiletSprzedawca']))
		{
			$model->attributes=$_POST['BiletSprzedawca'];
                        $model->seans_id= $_POST['BiletSprzedawca']['seans_id'];
			if($model->validate() && $model->saveBiletSprzedawca()){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
                        }
                }

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        /**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BiletSprzedawca('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BiletSprzedawca']))
			$model->attributes=$_GET['BiletSprzedawca'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($bilet_id, $znizka, $cena, $tytul, $data, $godzina, $numer_sali, $rzad, $miejsce, $sprzedawca)
	{
		$model=$this->loadModel($bilet_id, $znizka, $cena, $tytul, $data, $godzina, $numer_sali, $rzad, $miejsce, $sprzedawca);
                $model->isNewRecord = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BiletSprzedawca']))
		{
			$model->attributes=$_POST['BiletSprzedawca'];
                        $model->seans_id= $_POST['BiletSprzedawca']['seans_id'];
			if($model->validate() && $model->updateBiletSprzedawca($bilet_id)){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        /**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($bilet_id)
	{
                $model=new BiletSprzedawca;
                
                $model->deleteBiletSprzedawca($bilet_id);
                
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
        
        /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Film the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($bilet_id, $znizka, $cena, $tytul, $data, $godzina, $numer_sali, $rzad, $miejsce, $sprzedawca)
	{       
                $seans_id=Seans::model()->getSeansId($numer_sali, $tytul, $godzina, $data);
                
                $model=new BiletSprzedawca;
                $model->bilet_id = $bilet_id;
                $model->znizka = $znizka;
                $model->cena = $cena;
                $model->tytul = $tytul;   
                $model->data = $data;
                $model->godzina = $godzina;
                $model->numer_sali = $numer_sali;
                $model->rzad = $rzad;
                $model->miejsce = $miejsce;
                $model->sprzedawca = $sprzedawca;
                $model->seans_id = $seans_id;
                
                if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
<?php

class ReklamaFilmController extends Controller
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
                $dataProvider=new CActiveDataProvider('ReklamaFilm');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($tytul, $reklamowany_produkt, $wydawca)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($tytul, $reklamowany_produkt, $wydawca),
		));
	}
        
        /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ReklamaFilm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReklamaFilm']))
		{
			$model->attributes=$_POST['ReklamaFilm'];
			if($model->validate() && $model->saveReklamaFilm()){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
                                //$this->actionIndex(); //$this->redirect(array('view','id'=>$model->pracownik_id));
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
		$model=new ReklamaFilm('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReklamaFilm']))
			$model->attributes=$_GET['ReklamaFilm'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($tytul, $reklamowany_produkt, $wydawca)
	{
		$model=$this->loadModel($tytul, $reklamowany_produkt, $wydawca);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReklamaFilm']))
		{
			$model->attributes=$_POST['ReklamaFilm'];
			if($model->validate() && $model->updateReklamaFilm($tytul, $reklamowany_produkt, $wydawca)){
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
	public function actionDelete($tytul, $reklamowany_produkt, $wydawca)
	{
                $model=new ReklamaFilm;
                
                $model->deleteReklamaFilm($tytul, $reklamowany_produkt, $wydawca);
                
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
	public function loadModel($tytul, $reklamowany_produkt, $wydawca)
	{
                $model=ReklamaFilm::model()->findByAttributes(
                        array('tytul'=>$tytul,'reklamowany_produkt'=>$reklamowany_produkt, 'wydawca'=>$wydawca),
                        'tytul=:tytul AND reklamowany_produkt=:reklamowany_produkt AND wydawca=:wydawca',
                        array(':tytul'=>$tytul, ':reklamowany_produkt'=>$reklamowany_produkt, ':wydawca'=>$wydawca));
		
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
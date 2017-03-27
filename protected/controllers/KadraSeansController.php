<?php

class KadraSeansController extends Controller
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
                $dataProvider=new CActiveDataProvider('KadraSeans');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($data, $godzina, $sala_id, $tytul, $column_3d)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($data, $godzina, $sala_id, $tytul, $column_3d),
		));
	}
        
        /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new KadraSeans;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['KadraSeans']))
		{
			$model->attributes=$_POST['KadraSeans'];
			if($model->validate() && $model->saveKadraSeans()){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
                                //$this->actionIndex(); //$this->redirect(array('view','id'=>$model->pracownik_id));
                        }
                }

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($data, $godzina, $sala_id, $tytul, $column_3d)
	{
		$model=$this->loadModel($data, $godzina, $sala_id, $tytul, $column_3d);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['KadraSeans']))
		{
			$model->attributes=$_POST['KadraSeans'];
			if($model->validate() && $model->updateKadraSeans($data, $godzina, $sala_id, $tytul, $column_3d)){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        /**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new KadraSeans('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['KadraSeans']))
			$model->attributes=$_GET['KadraSeans'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        /**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($data, $godzina, $sala_id, $tytul, $column_3d)
	{
                $model=new KadraSeans;
                
                $model->deleteKadraSeans($data, $godzina, $sala_id, $tytul, $column_3d);
                
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
	public function loadModel($data, $godzina, $sala_id, $tytul, $column_3d)
	{
		//$model=Film::model()->findByPk($id);
                //$film_id=KadraSeans::model()->getFilmId($tytul);
                $model=KadraSeans::model()->findByAttributes(
                        array('data'=>$data,'godzina'=>$godzina, 'sala_id'=>$sala_id, 'tytul'=>$tytul/*, 'column_3d'=>empty($column_3d)?false:true*/),
                        'data=:data AND godzina=:godzina AND sala_id=:sala_id AND tytul=:tytul',//, AND column_3d=:column_3d',
                        array(':data'=>$data, ':godzina'=>$godzina, ':sala_id'=>$sala_id, ':tytul'=>$tytul/*, ':column_3d'=>$column_3d*/));//empty($column_3d)?false:true
		
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
        /**
	 * Performs the AJAX validation.
	 * @param Sala $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kadraSeans-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
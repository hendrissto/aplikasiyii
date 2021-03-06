<?php

class JualResepController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/apoteker';

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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id, $data)
	{
		$model=$this->loadModel($id);

		$pasien=Yii::app()->db->createCommand()
					->select()
					->from('jual_resep jr')
					->join('periksa_pasien pp','pp.id_periksa = jr.id_periksa')
					->join('pasien p','p.no_rm = pp.no_rm')
					->where('pp.id_periksa=:id_periksa', array(':id_periksa'=>$data))
					->queryAll();
		$res = Yii::app()->db->createCommand()
					->select()
					->from('resep r')
					->join('obat o','r.id_obat = o.id_obat')
					->where('r.id_periksa=:id_periksa', array(':id_periksa'=>$data))
					->queryAll();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['JualResep']))
		{
			$model->attributes=$_POST['JualResep'];
			$model->status_resep='sudah diserahkan';
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_jual_resep));
		}

		$this->render('create',array(
			'model'=>$model, 'res'=>$res
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['JualResep']))
		{
			$model->attributes=$_POST['JualResep'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_jual_resep));
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
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=Yii::app()->db->createCommand()
					->select()
					->from('jual_resep jr')
					->join('periksa_pasien pp','pp.id_periksa = jr.id_periksa')
					->join('pasien p','p.no_rm = pp.no_rm')
					->queryAll();
		$this->render('index',array(
			'jual_resep'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new JualResep('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['JualResep']))
			$model->attributes=$_GET['JualResep'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return JualResep the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=JualResep::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param JualResep $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='jual-resep-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class PeriksaPasienController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/dokter';

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
				'actions'=>array('index','view','hasil'),
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
	public function actionCreate()
	{
		$model=new PeriksaPasien;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PeriksaPasien']))
		{
			$model->attributes=$_POST['PeriksaPasien'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_periksa));
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PeriksaPasien']))
		{
			$model->attributes=$_POST['PeriksaPasien'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_periksa));
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
		$command = Yii::app()->db->createCommand()
					->select()
					->from('periksa_pasien p')
					->join('pasien ps','p.no_rm = ps.no_rm')
					->queryAll();
					
		$this->render('index',array(
			'dataProvider'=>$command,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PeriksaPasien('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PeriksaPasien']))
			$model->attributes=$_GET['PeriksaPasien'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PeriksaPasien the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PeriksaPasien::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PeriksaPasien $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='periksa-pasien-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionHasil($oid)
	{
		$c = Yii::app()->db->createCommand()
					->select()
					->from('periksa_pasien pp')
					->join('pasien p','p.no_rm=pp.no_rm')
					->where('pp.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryRow();
		
		$tindakan = Yii::app()->db->createCommand()
					->select()
					->from('tindakan_pasien tp')
					->join('tindakan tn','tn.id_tindakan = tp.id_tindakan')
					->join('tarif_tindakan tt','tt.id_tindakan = tn.id_tindakan')
					->join('periksa_pasien pp','pp.id_periksa = tp.id_periksa')
					->where('tp.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryAll();
		
		$resep = Yii::app()->db->createCommand()
					->select()
					->from('resep r')
					->join('obat o','r.id_obat = o.id_obat')
					->where('r.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryAll();

		$periksa = Yii::app()->db->createCommand()
					->select()
					->from('pemeriksaan')
					->where('id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryRow();	
											
					
		$this->render('hasil',array(
			 'tindakan'=>$tindakan, 'pasien'=>$c, 'resep'=>$resep, 'periksa'=>$periksa
		));

	}
}

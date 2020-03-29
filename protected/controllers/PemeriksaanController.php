<?php

class PemeriksaanController extends Controller
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
				'actions'=>array('index','view','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
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
	public function actionCreate($oid)
	{
		$model=new Pemeriksaan;
		$c = Yii::app()->db->createCommand()
					->select()
					->from('periksa_pasien pp')
					->join('pasien p','p.no_rm=pp.no_rm')
					->where('pp.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryRow();
		$pemer = Yii::app()->db->createCommand()
					->select()
					->from('pemeriksaan p')
					->join('periksa_pasien pp','pp.id_periksa = p.id_periksa')
					->where('p.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryAll();

		if(isset($_POST['Pemeriksaan']))
		{
			$model->attributes=$_POST['Pemeriksaan'];
			$model->id_periksa=$oid;
			if($model->save())
				$this->redirect(array('/pemeriksaan/create/oid/'.$oid,'id'=>$model->id_pemeriksaan));
		}

		$this->render('create',array(
			'model'=>$model, 'pasien'=>$c, 'pemer' => $pemer
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id, $data)
	{
		$model=$this->loadModel($id);
		$c = Yii::app()->db->createCommand()
					->select()
					->from('periksa_pasien pp')
					->join('pasien p','p.no_rm=pp.no_rm')
					->where('pp.id_periksa=:id_periksa', array(':id_periksa'=>$data))
					->queryRow();
		$pemer = Yii::app()->db->createCommand()
					->select()
					->from('pemeriksaan p')
					->join('periksa_pasien pp','pp.id_periksa = p.id_periksa')
					->where('p.id_periksa=:id_periksa', array(':id_periksa'=>$data))
					->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pemeriksaan']))
		{
			$model->attributes=$_POST['Pemeriksaan'];
			if($model->save())
				$this->redirect(array('/pemeriksaan/create/oid/'.$oid,'id'=>$model->id_pemeriksaan, 
				'pasien'=>$c, 'pemer' => $pemer));
		}

		$this->render('update',array(
			'model'=>$model, 'pasien'=>$c, 'pemer' => $pemer
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id, $data)
	{
		$pemer = Yii::app()->db->createCommand()
					->select()
					->from('pemeriksaan p')
					->join('periksa_pasien pp','pp.id_periksa = p.id_periksa')
					->where('p.id_periksa=:id_periksa', array(':id_periksa'=>$data))
					->queryAll();
		try {

			$this->loadModel($id)->delete();
	
			return $this->redirect('index.php?r=pemeriksaan/create/oid/'.$data, array('pemer'=> $pemer));
	
		} catch(CDbException $e) {
	
			echo 'Please remove this category from articles to delete this category.';
	
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pemeriksaan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pemeriksaan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pemeriksaan']))
			$model->attributes=$_GET['Pemeriksaan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pemeriksaan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pemeriksaan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pemeriksaan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pemeriksaan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

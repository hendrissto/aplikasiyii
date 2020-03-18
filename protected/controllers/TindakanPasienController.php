<?php

class TindakanPasienController extends Controller
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
				'actions'=>array('index','view','hapustindakan'),
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
		$c = Yii::app()->db->createCommand()
					->select()
					->from('periksa_pasien pp')
					->join('pasien p','p.no_rm=pp.no_rm')
					->where('pp.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryRow();
						

		$model=new TindakanPasien;

		$tind = Yii::app()->db->createCommand()
				->select()
				->from('tindakan_pasien tp')
				->join('tindakan tn','tn.id_tindakan = tp.id_tindakan')
				->join('tarif_tindakan tt','tt.id_tindakan = tn.id_tindakan')
				->join('periksa_pasien pp','pp.id_periksa = tp.id_periksa')
				->where('tp.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
				->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TindakanPasien']))
		{
			$id_p = Yii::app()->db->createCommand('select max(id_tindakan_pasien) as id_tindakan_pasien from tindakan_pasien')
				->queryRow();
			if($id_p['id_tindakan_pasien'] == null){
				$model->id_tindakan_pasien = 1;
			}else{
				$model->id_tindakan_pasien = $id_p['id_tindakan_pasien'] + 1;
			}
			$model->attributes=$_POST['TindakanPasien'];
			$model->id_periksa=$oid;

			$a = Yii::app()->db->createCommand()
					->select('')
					->from('tindakan')
					->where('id_tindakan=:id_tindakan', array(':id_tindakan'=>$_POST['TindakanPasien']['id_tindakan']))
					->queryAll();
			$t = Yii::app()->db->createCommand()
					->select()
					->from('tagihan')
					->where('id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryAll();
			
			
			
			if($t != null){
				$tambah_tagihan=Tagihan::model()->findByPk($t['0']['no_tagihan']);
				$tambah_tagihan->bayar_tagihan = $a['0']['harga'] + $t['0']['bayar_tagihan'];
				$tambah_tagihan->id_periksa = $oid;
				$tambah_tagihan->status = "belum lunas";
				$tambah_tagihan->save();
			}else{
				$tagihan = new Tagihan;
				$tagihan->bayar_tagihan = $a['0']['harga'];
				$tagihan->id_periksa = $oid;
				$tagihan->status = "belum lunas";
				$tagihan->save();
			}										
			
			
			$command = Yii::app()->db->createCommand('select id_tindakan, nama_tindakan from tindakan')
					->queryAll();
			if($model->save())
				Yii::app()->user->setFlash('success', "Data Berhasil Disimpan");
				$this->redirect('index.php?r=tindakanPasien/create/oid/'.$oid, array('id'=>$model->id_tindakan_pasien, 
				'id_tindakan_pasien'=>$model->id_tindakan_pasien, 'tindakan'=> $tind));
		}
		
		$this->render('create',array(
			'model'=>$model, 'pasien'=>$c, 'tindakan'=> $tind
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

		if(isset($_POST['TindakanPasien']))
		{
			$model->attributes=$_POST['TindakanPasien'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_tindakan_pasien));
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
	public function actionDelete($id_tindakan_pasien)
	{
		$this->loadModel($id_tindakan_pasien)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TindakanPasien');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TindakanPasien('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TindakanPasien']))
			$model->attributes=$_GET['TindakanPasien'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TindakanPasien the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TindakanPasien::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TindakanPasien $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tindakan-pasien-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionHapusTindakan($id_tindakan_pasien) {
		if (TindakanPasien::model()->deleteByPk($id_tindakan_pasien)) {
			$this->redirect(array('tindakanPasien'));
		} else {
			throw new CHttpException(404, 'Data gagal dihapus');
		}
	}
}

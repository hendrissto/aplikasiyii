<?php

class TagihanController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/kasir';

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
				'actions'=>array('create','update','cetak'),
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
	public function actionCreate($oid)
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
					->join('periksa_pasien pp','pp.id_periksa = tp.id_periksa')
					->where('tp.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryAll();
		
		$resep = Yii::app()->db->createCommand()
					->select()
					->from('resep r')
					->join('obat o','r.id_obat = o.id_obat')
					->where('r.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryAll();

		$cek_bayar = Yii::app()->db->createCommand('select max(id_pembayaran) as id_pembayaran from pembayaran')
						->queryRow();					
		
		$ml=Tagihan::model()->find('id_periksa=:id_periksa', array(':id_periksa'=>$oid));
		if(isset($_POST['Tagihan']))
		{	
			$bayar = new Pembayaran;
			if($cek_bayar == null){
				$bayar->id_pembayaran = 1;	
			}
			$bayar->id_pembayaran = $cek_bayar['id_pembayaran'] + 1;
			$bayar->tgl_pembayaran = Yii::app()->Date->now();
			$bayar->total_pembayaran = $_POST['Tagihan']['bayar_tagihan'];
			$bayar->id_periksa = $oid;
			$bayar->save();
			$ml->bayar_pasien=$_POST['Tagihan']['bayar_tagihan'];
			$ml->status_bayar = "lunas";
			if($ml->save())
			Yii::app()->user->setFlash('success', "Data Berhasil Disimpan");
				$this->redirect(array('index','id'=>$ml->no_tagihan));
		}

		$this->render('create',array(
			'ml'=>$ml, 'tindakan'=>$tindakan, 'pasien'=>$c, 'resep'=>$resep
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

		if(isset($_POST['Tagihan']))
		{
			$model->attributes=$_POST['Tagihan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->no_tagihan));
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
					->from('tagihan t')
					->join('periksa_pasien pp','pp.id_periksa = t.id_periksa')
					->join('pasien p','p.no_rm = pp.no_rm')
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
		$model=new Tagihan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tagihan']))
			$model->attributes=$_GET['Tagihan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tagihan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tagihan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tagihan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tagihan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionBayar()
	{
		$command = Yii::app()->db->createCommand()
					->select()
					->from('tagihan t')
					->join('tindakan_pasien tp','t.id_periksa = tp.id_periksa')
					->join('periksa_pasien pp','pp.id_periksa = t.id_periksa')
					->join('pasien p','p.no_rm = pp.no_rm')
					->join('tarif_tindakan tt','tt.id_tindakan = tp.id_tindakan')
					->join('tindakan tn','tn.id_tindakan = tp.id_tindakan')
					->queryAll();
					
		$this->render('bayar',array(
			'dataProvider'=>$command,
		));
	}

	public function actionCetak($oid)
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

		$bayar = Yii::app()->db->createCommand()
					->select()
					->from('tagihan')
					->queryAll();
		$cek_bayar = Yii::app()->db->createCommand('select max(id_pembayaran) as id_pembayaran from pembayaran')
						->queryRow();					
		
		$ml=Tagihan::model()->find('id_periksa=:id_periksa', array(':id_periksa'=>$oid));
		if(isset($_POST['Tagihan']))
		{	
			$bayar = new Pembayaran;
			if($cek_bayar == null){
				$bayar->id_pembayaran = 1;	
			}
			$bayar->id_pembayaran = $cek_bayar['id_pembayaran'] + 1;
			$bayar->tgl_pembayaran = Yii::app()->Date->now();
			$bayar->total_pembayaran = $_POST['Tagihan']['bayar_tagihan'];
			$bayar->id_periksa = $oid;
			$bayar->save();
			$ml->bayar_pasien=$_POST['Tagihan']['bayar_tagihan'];
			$ml->status = "lunas";
			if($ml->save())
			Yii::app()->user->setFlash('success', "Data Berhasil Disimpan");
				$this->redirect(array('index','id'=>$ml->no_tagihan));
		}

		$this->render('cetak',array(
			'ml'=>$ml, 'tindakan'=>$tindakan, 'pasien'=>$c, 'resep'=>$resep, 'bayar'=>$bayar
		));
	}
}

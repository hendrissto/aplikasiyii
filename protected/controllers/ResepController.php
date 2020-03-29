<?php

class ResepController extends Controller
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
		$c = Yii::app()->db->createCommand()
					->select()
					->from('periksa_pasien pp')
					->join('pasien p','p.no_rm=pp.no_rm')
					->where('pp.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryRow();
		$model=new Resep;

		$res = Yii::app()->db->createCommand()
					->select()
					->from('resep r')
					->join('obat o','r.id_obat = o.id_obat')
					->where('r.id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryAll();

		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Resep']))
		{	
			$a = Yii::app()->db->createCommand()
					->select('')
					->from('obat')
					->where('id_obat=:id_obat', array(':id_obat'=>$_POST['Resep']['id_obat']))
					->queryAll();
			$t = Yii::app()->db->createCommand()
					->select()
					->from('tagihan')
					->where('id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryAll();
			

			if($t != null){
				
				$tambah_tagihan=Tagihan::model()->findByPk($t['0']['no_tagihan']);
				$tambah_tagihan->bayar_tagihan = ($a['0']['harga'] * $_POST['Resep']['jumlah']) + $t['0']['bayar_tagihan'];
				$tambah_tagihan->id_periksa = $oid;
				$tambah_tagihan->status_bayar = "belum lunas";
				$tambah_tagihan->save();
			}else{
				$tagihan = new Tagihan;
				$tagihan->bayar_tagihan = $a['0']['harga'] * $_POST['Resep']['jumlah'];
				$tagihan->id_periksa = $oid;
				$tagihan->status_bayar = "belum lunas";
				$tagihan->save();
			}

			$per = PeriksaPasien::model()->findByPk($oid);
			$per->status= "sudah periksa";
			$per->save();

			$rp = Yii::app()->db->createCommand()
					->select()
					->from('jual_resep')
					->where('id_periksa=:id_periksa', array(':id_periksa'=>$oid))
					->queryAll();

			if($rp == null){
				$res = new JualResep;
				$res->id_periksa= $oid;
				$res->status_resep= "belum diserahkan";
				$res->save();
			}
			

			$model->attributes=$_POST['Resep'];
			$model->id_periksa=$oid;
			if($model->save())
				$this->redirect(array('/resep/create/oid/'.$oid,'id'=>$model->kode_resep));
		}

		$this->render('create',array(
			'model'=>$model, 'pasien'=>$c, 'res' => $res
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

		if(isset($_POST['Resep']))
		{
			$model->attributes=$_POST['Resep'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->kode_resep));
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
	public function actionDelete($id, $data)
	{
		$res = Yii::app()->db->createCommand()
					->select()
					->from('resep r')
					->join('obat o','r.id_obat = o.id_obat')
					->where('r.id_periksa=:id_periksa', array(':id_periksa'=>$data))
					->queryAll();
		try {

			$this->loadModel($id)->delete();
	
			return $this->redirect('index.php?r=resep/create/oid/'.$data, array('res'=> $res));
	
		} catch(CDbException $e) {
	
			echo 'Please remove this category from articles to delete this category.';
	
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Resep');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Resep('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Resep']))
			$model->attributes=$_GET['Resep'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Resep the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Resep::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Resep $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='resep-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

	class PegawaiController extends Controller
	{
		public $layout = '//layouts/admin';
		
		
		public function filters()
		{
			return array(
				'accessControl', 
				'postOnly + delete',
			);
		}
		
		public function accessRules()
		{
			return array(
				
				array('allow', 
					'actions'=>array('create','update' , 'hapus','index'),
					'users'=>array('@'),
				),
				
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
        }
        
        public function actionHome()
		{
			$model=new Pegawai();

			$this->render('home',array(
				'model'=>$model
			));
		}
		
		public function actionIndex()
		{
			$model=new Pegawai();

			$this->render('index',array(
				'model'=>$model
			));
		}
		
		public function actionCreate()
		{
			$model = new Pegawai;
		
			if(isset($_POST['Pegawai']))
			{
				$model->attributes = $_POST['Pegawai'];
				if($model->save())
				{
					Yii::app()->user->setFlash('success' , 'Data telah disimpan!');
					$this->redirect(array('index'));
				}
			}
			$this->render('_form' , array('model' => $model));
		}
		
		public function actionUpdate($oid)
		{
			$model = $this->loadModel($oid);
			if(isset($_POST['Pegawai']))
			{
				$model->attributes = $_POST['Pegawai'];
				if($model->save())
				{
					Yii::app()->user->setFlash('success' , 'Data telah diedit!');
					$this->redirect(array('index'));
				}
			}
			$this->render('_form' , array('model' => $model));
		}
		
		public function actionHapus($oid , $token)
		{
				$cek = inc::enkrip($oid); // enkrip id agar sama dengan token
				if($cek == $token)  //cek dulu sama apa engga token sama id
				{
					
					try								// kenapa di try dulu , soal nya pake foreign key , kalo ada id ini  yang terkait sama table lain ga bisa didelete , kalo ga di try dulu pasti error keluar nya :)
					{
						$model = $this->loadModel($oid);
						if($model->delete())
						{
							Yii::app()->user->setFlash('success' , 'Data telah dihapus!');
							$this->redirect(array('index'));
						}
					}catch (Exception $e){
							Yii::app()->user->setFlash('danger' , 'Data gagal dihapus! data ini masih digunakan dengan data lain');
							$this->redirect(array('index'));
					}
				}else{
					throw new CHttpException(404, 'Halaman tidak ditemukan!');
				}
		
		}
		
		public function loadModel($id)
		{
			$model=Pegawai::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}
		
		protected function performAjaxValidation($model)
		{
			if(isset($_POST['ajax']) && $_POST['ajax']==='tes-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
		}
	}
<?php
/* @var $this PasienController */
/* @var $model Pasien */



$this->menu=array(
	array('label'=>'List Pasien', 'url'=>array('index')),
	array('label'=>'Manage Pasien', 'url'=>array('admin')),
);
?>

<h1>Pendaftaran Pasien</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
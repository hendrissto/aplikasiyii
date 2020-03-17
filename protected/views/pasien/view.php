<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	$model->no_identitas,
);

$this->menu=array(
	array('label'=>'List Pasien', 'url'=>array('index')),
	array('label'=>'Create Pasien', 'url'=>array('create')),
	array('label'=>'Update Pasien', 'url'=>array('update', 'id'=>$model->no_identitas)),
	array('label'=>'Delete Pasien', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->no_identitas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pasien', 'url'=>array('admin')),
);
?>

<h1>View Pasien #<?php echo $model->no_identitas; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'no_identitas',
		'nama_pasien',
		'alamat_pasien',
		'no_telp',
		'tgl_lahir',
	),
)); ?>

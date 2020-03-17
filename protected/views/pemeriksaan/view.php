<?php
/* @var $this PemeriksaanController */
/* @var $model Pemeriksaan */

$this->breadcrumbs=array(
	'Pemeriksaans'=>array('index'),
	$model->id_pemeriksaan,
);

$this->menu=array(
	array('label'=>'List Pemeriksaan', 'url'=>array('index')),
	array('label'=>'Create Pemeriksaan', 'url'=>array('create')),
	array('label'=>'Update Pemeriksaan', 'url'=>array('update', 'id'=>$model->id_pemeriksaan)),
	array('label'=>'Delete Pemeriksaan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pemeriksaan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pemeriksaan', 'url'=>array('admin')),
);
?>

<h1>View Pemeriksaan #<?php echo $model->id_pemeriksaan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pemeriksaan',
		'keluhan',
		'riwayat_keluarga',
		'riwayat_obat',
		'periksa_fisik',
		'tekanan_darah',
		'suhu_tubuh',
		'detak_jantung',
	),
)); ?>

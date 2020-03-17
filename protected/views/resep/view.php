<?php
/* @var $this ResepController */
/* @var $model Resep */

$this->breadcrumbs=array(
	'Reseps'=>array('index'),
	$model->kode_resep,
);

$this->menu=array(
	array('label'=>'List Resep', 'url'=>array('index')),
	array('label'=>'Create Resep', 'url'=>array('create')),
	array('label'=>'Update Resep', 'url'=>array('update', 'id'=>$model->kode_resep)),
	array('label'=>'Delete Resep', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->kode_resep),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Resep', 'url'=>array('admin')),
);
?>

<h1>View Resep #<?php echo $model->kode_resep; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'kode_resep',
		'tgl_resep',
		'id_obat',
		'jumlah',
	),
)); ?>

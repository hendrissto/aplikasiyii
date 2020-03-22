<?php
/* @var $this JualResepController */
/* @var $model JualResep */

$this->breadcrumbs=array(
	'Jual Reseps'=>array('index'),
	$model->id_jual_resep,
);

$this->menu=array(
	array('label'=>'List JualResep', 'url'=>array('index')),
	array('label'=>'Create JualResep', 'url'=>array('create')),
	array('label'=>'Update JualResep', 'url'=>array('update', 'id'=>$model->id_jual_resep)),
	array('label'=>'Delete JualResep', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_jual_resep),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JualResep', 'url'=>array('admin')),
);
?>

<h1>View JualResep #<?php echo $model->id_jual_resep; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_jual_resep',
		'id_periksa',
	),
)); ?>

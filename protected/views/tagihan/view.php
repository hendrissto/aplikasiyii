<?php
/* @var $this TagihanController */
/* @var $model Tagihan */

$this->breadcrumbs=array(
	'Tagihans'=>array('index'),
	$model->no_tagihan,
);

$this->menu=array(
	array('label'=>'List Tagihan', 'url'=>array('index')),
	array('label'=>'Create Tagihan', 'url'=>array('create')),
	array('label'=>'Update Tagihan', 'url'=>array('update', 'id'=>$model->no_tagihan)),
	array('label'=>'Delete Tagihan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->no_tagihan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tagihan', 'url'=>array('admin')),
);
?>

<h1>View Tagihan #<?php echo $model->no_tagihan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'no_tagihan',
		'tgl_tagihan',
		'total_tagihan',
	),
)); ?>

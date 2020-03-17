<?php
/* @var $this PeriksaPasienController */
/* @var $model PeriksaPasien */

$this->breadcrumbs=array(
	'Periksa Pasiens'=>array('index'),
	$model->id_periksa,
);

$this->menu=array(
	array('label'=>'List PeriksaPasien', 'url'=>array('index')),
	array('label'=>'Create PeriksaPasien', 'url'=>array('create')),
	array('label'=>'Update PeriksaPasien', 'url'=>array('update', 'id'=>$model->id_periksa)),
	array('label'=>'Delete PeriksaPasien', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_periksa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PeriksaPasien', 'url'=>array('admin')),
);
?>

<h1>View PeriksaPasien #<?php echo $model->id_periksa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_periksa',
		'no_rm',
		'id_tindakan',
		'id_reseptur',
	),
)); ?>

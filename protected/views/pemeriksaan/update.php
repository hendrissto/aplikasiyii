<?php
/* @var $this PemeriksaanController */
/* @var $model Pemeriksaan */

$this->breadcrumbs=array(
	'Pemeriksaans'=>array('index'),
	$model->id_pemeriksaan=>array('view','id'=>$model->id_pemeriksaan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pemeriksaan', 'url'=>array('index')),
	array('label'=>'Create Pemeriksaan', 'url'=>array('create')),
	array('label'=>'View Pemeriksaan', 'url'=>array('view', 'id'=>$model->id_pemeriksaan)),
	array('label'=>'Manage Pemeriksaan', 'url'=>array('admin')),
);
?>

<h1>Update Pemeriksaan <?php echo $model->id_pemeriksaan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
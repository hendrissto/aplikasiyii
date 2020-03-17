<?php
/* @var $this ResepController */
/* @var $model Resep */

$this->breadcrumbs=array(
	'Reseps'=>array('index'),
	$model->kode_resep=>array('view','id'=>$model->kode_resep),
	'Update',
);

$this->menu=array(
	array('label'=>'List Resep', 'url'=>array('index')),
	array('label'=>'Create Resep', 'url'=>array('create')),
	array('label'=>'View Resep', 'url'=>array('view', 'id'=>$model->kode_resep)),
	array('label'=>'Manage Resep', 'url'=>array('admin')),
);
?>

<h1>Update Resep <?php echo $model->kode_resep; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
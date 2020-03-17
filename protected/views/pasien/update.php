<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	$model->no_identitas=>array('view','id'=>$model->no_identitas),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pasien', 'url'=>array('index')),
	array('label'=>'Create Pasien', 'url'=>array('create')),
	array('label'=>'View Pasien', 'url'=>array('view', 'id'=>$model->no_identitas)),
	array('label'=>'Manage Pasien', 'url'=>array('admin')),
);
?>

<h1>Update Pasien <?php echo $model->no_identitas; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
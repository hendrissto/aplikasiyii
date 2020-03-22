<?php
/* @var $this JualResepController */
/* @var $model JualResep */

$this->breadcrumbs=array(
	'Jual Reseps'=>array('index'),
	$model->id_jual_resep=>array('view','id'=>$model->id_jual_resep),
	'Update',
);

$this->menu=array(
	array('label'=>'List JualResep', 'url'=>array('index')),
	array('label'=>'Create JualResep', 'url'=>array('create')),
	array('label'=>'View JualResep', 'url'=>array('view', 'id'=>$model->id_jual_resep)),
	array('label'=>'Manage JualResep', 'url'=>array('admin')),
);
?>

<h1>Update JualResep <?php echo $model->id_jual_resep; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
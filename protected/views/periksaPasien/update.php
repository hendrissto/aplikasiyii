<?php
/* @var $this PeriksaPasienController */
/* @var $model PeriksaPasien */

$this->breadcrumbs=array(
	'Periksa Pasiens'=>array('index'),
	$model->id_periksa=>array('view','id'=>$model->id_periksa),
	'Update',
);

$this->menu=array(
	array('label'=>'List PeriksaPasien', 'url'=>array('index')),
	array('label'=>'Create PeriksaPasien', 'url'=>array('create')),
	array('label'=>'View PeriksaPasien', 'url'=>array('view', 'id'=>$model->id_periksa)),
	array('label'=>'Manage PeriksaPasien', 'url'=>array('admin')),
);
?>

<h1>Update PeriksaPasien <?php echo $model->id_periksa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
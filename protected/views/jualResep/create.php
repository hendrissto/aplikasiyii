<?php
/* @var $this JualResepController */
/* @var $model JualResep */

$this->breadcrumbs=array(
	'Jual Reseps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JualResep', 'url'=>array('index')),
	array('label'=>'Manage JualResep', 'url'=>array('admin')),
);
?>

<h1>Create JualResep</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
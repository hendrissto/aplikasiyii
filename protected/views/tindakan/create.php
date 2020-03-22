<?php
/* @var $this TindakanController */
/* @var $model Tindakan */



$this->menu=array(
	array('label'=>'List Tindakan', 'url'=>array('index')),
	array('label'=>'Manage Tindakan', 'url'=>array('admin')),
);
?>

<h1>Create Tindakan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
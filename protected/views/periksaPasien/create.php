<?php
/* @var $this PeriksaPasienController */
/* @var $model PeriksaPasien */


$this->menu=array(
	array('label'=>'List PeriksaPasien', 'url'=>array('index')),
	array('label'=>'Manage PeriksaPasien', 'url'=>array('admin')),
);
?>

<h1>Create PeriksaPasien</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
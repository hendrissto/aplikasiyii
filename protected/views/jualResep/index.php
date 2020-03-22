<?php
/* @var $this JualResepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jual Reseps',
);

$this->menu=array(
	array('label'=>'Create JualResep', 'url'=>array('create')),
	array('label'=>'Manage JualResep', 'url'=>array('admin')),
);
?>

<h1>Jual Reseps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

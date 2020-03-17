<?php
/* @var $this TindakanPasienController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tindakan Pasiens',
);

$this->menu=array(
	array('label'=>'Create TindakanPasien', 'url'=>array('create')),
	array('label'=>'Manage TindakanPasien', 'url'=>array('admin')),
);
?>

<h1>Tindakan Pasien</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

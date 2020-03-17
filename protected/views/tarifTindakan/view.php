<?php
/* @var $this TarifTindakanController */
/* @var $model TarifTindakan */

$this->breadcrumbs=array(
	'Tarif Tindakans'=>array('index'),
	$model->id_tarif_tindakan,
);

$this->menu=array(
	array('label'=>'List TarifTindakan', 'url'=>array('index')),
	array('label'=>'Create TarifTindakan', 'url'=>array('create')),
	array('label'=>'Update TarifTindakan', 'url'=>array('update', 'id'=>$model->id_tarif_tindakan)),
	array('label'=>'Delete TarifTindakan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tarif_tindakan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TarifTindakan', 'url'=>array('admin')),
);
?>

<h1>View TarifTindakan #<?php echo $model->id_tarif_tindakan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tarif_tindakan',
		'nama_pasien',
		'harga',
	),
)); ?>

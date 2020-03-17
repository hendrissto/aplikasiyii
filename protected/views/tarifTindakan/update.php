<?php
/* @var $this TarifTindakanController */
/* @var $model TarifTindakan */

$this->breadcrumbs=array(
	'Tarif Tindakans'=>array('index'),
	$model->id_tarif_tindakan=>array('view','id'=>$model->id_tarif_tindakan),
	'Update',
);

$this->menu=array(
	array('label'=>'List TarifTindakan', 'url'=>array('index')),
	array('label'=>'Create TarifTindakan', 'url'=>array('create')),
	array('label'=>'View TarifTindakan', 'url'=>array('view', 'id'=>$model->id_tarif_tindakan)),
	array('label'=>'Manage TarifTindakan', 'url'=>array('admin')),
);
?>

<h1>Update TarifTindakan <?php echo $model->id_tarif_tindakan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
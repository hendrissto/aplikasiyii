<?php
/* @var $this TarifTindakanController */
/* @var $model TarifTindakan */

$this->breadcrumbs=array(
	'Tarif Tindakans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TarifTindakan', 'url'=>array('index')),
	array('label'=>'Manage TarifTindakan', 'url'=>array('admin')),
);
?>

<h1>Create TarifTindakan</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</script>
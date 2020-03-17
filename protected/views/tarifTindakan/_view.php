<?php
/* @var $this TarifTindakanController */
/* @var $data TarifTindakan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tarif_tindakan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tarif_tindakan), array('view', 'id'=>$data->id_tarif_tindakan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->id_tindakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />


</div>
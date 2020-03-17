<?php
/* @var $this TindakanPasienController */
/* @var $data TindakanPasien */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tindakan_pasien')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tindakan_pasien), array('view', 'id'=>$data->id_tindakan_pasien)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periksa')); ?>:</b>
	<?php echo CHtml::encode($data->id_periksa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->id_tindakan); ?>
	<br />


</div>
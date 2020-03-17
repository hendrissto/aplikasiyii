<?php
/* @var $this PeriksaPasienController */
/* @var $data PeriksaPasien */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periksa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_periksa), array('view', 'id'=>$data->id_periksa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_rm')); ?>:</b>
	<?php echo CHtml::encode($data->no_rm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->id_tindakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_reseptur')); ?>:</b>
	<?php echo CHtml::encode($data->id_reseptur); ?>
	<br />


</div>
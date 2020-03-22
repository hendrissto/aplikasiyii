<?php
/* @var $this JualResepController */
/* @var $data JualResep */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jual_resep')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_jual_resep), array('view', 'id'=>$data->id_jual_resep)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periksa')); ?>:</b>
	<?php echo CHtml::encode($data->id_periksa); ?>
	<br />


</div>
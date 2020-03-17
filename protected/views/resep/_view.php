<?php
/* @var $this ResepController */
/* @var $data Resep */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_resep')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kode_resep), array('view', 'id'=>$data->kode_resep)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_resep')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_resep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_obat')); ?>:</b>
	<?php echo CHtml::encode($data->id_obat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah); ?>
	<br />


</div>
<?php
/* @var $this PemeriksaanController */
/* @var $data Pemeriksaan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pemeriksaan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pemeriksaan), array('view', 'id'=>$data->id_pemeriksaan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keluhan')); ?>:</b>
	<?php echo CHtml::encode($data->keluhan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('riwayat_keluarga')); ?>:</b>
	<?php echo CHtml::encode($data->riwayat_keluarga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('riwayat_obat')); ?>:</b>
	<?php echo CHtml::encode($data->riwayat_obat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periksa_fisik')); ?>:</b>
	<?php echo CHtml::encode($data->periksa_fisik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tekanan_darah')); ?>:</b>
	<?php echo CHtml::encode($data->tekanan_darah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suhu_tubuh')); ?>:</b>
	<?php echo CHtml::encode($data->suhu_tubuh); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('detak_jantung')); ?>:</b>
	<?php echo CHtml::encode($data->detak_jantung); ?>
	<br />

	*/ ?>

</div>
<?php
/* @var $this PegawaiController */
/* @var $data Pegawai */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pegawai')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pegawai), array('view', 'id'=>$data->id_pegawai)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pegawai')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pegawai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_pegawai')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_pegawai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_telepon')); ?>:</b>
	<?php echo CHtml::encode($data->no_telepon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->jabatan); ?>
	<br />


</div>
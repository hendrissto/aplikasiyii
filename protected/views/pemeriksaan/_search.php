<?php
/* @var $this PemeriksaanController */
/* @var $model Pemeriksaan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pemeriksaan'); ?>
		<?php echo $form->textField($model,'id_pemeriksaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keluhan'); ?>
		<?php echo $form->textArea($model,'keluhan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'riwayat_keluarga'); ?>
		<?php echo $form->textArea($model,'riwayat_keluarga',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'riwayat_obat'); ?>
		<?php echo $form->textArea($model,'riwayat_obat',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'periksa_fisik'); ?>
		<?php echo $form->textArea($model,'periksa_fisik',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tekanan_darah'); ?>
		<?php echo $form->textArea($model,'tekanan_darah',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suhu_tubuh'); ?>
		<?php echo $form->textArea($model,'suhu_tubuh',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detak_jantung'); ?>
		<?php echo $form->textArea($model,'detak_jantung',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
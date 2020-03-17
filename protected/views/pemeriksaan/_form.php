<?php
/* @var $this PemeriksaanController */
/* @var $model Pemeriksaan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pemeriksaan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pemeriksaan'); ?>
		<?php echo $form->textField($model,'id_pemeriksaan'); ?>
		<?php echo $form->error($model,'id_pemeriksaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keluhan'); ?>
		<?php echo $form->textArea($model,'keluhan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keluhan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'riwayat_keluarga'); ?>
		<?php echo $form->textArea($model,'riwayat_keluarga',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'riwayat_keluarga'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'riwayat_obat'); ?>
		<?php echo $form->textArea($model,'riwayat_obat',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'riwayat_obat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periksa_fisik'); ?>
		<?php echo $form->textArea($model,'periksa_fisik',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'periksa_fisik'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tekanan_darah'); ?>
		<?php echo $form->textArea($model,'tekanan_darah',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tekanan_darah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suhu_tubuh'); ?>
		<?php echo $form->textArea($model,'suhu_tubuh',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'suhu_tubuh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detak_jantung'); ?>
		<?php echo $form->textArea($model,'detak_jantung',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detak_jantung'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
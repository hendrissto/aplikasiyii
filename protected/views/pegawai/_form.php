<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pegawai-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pegawai'); ?>
		<?php echo $form->textField($model,'id_pegawai'); ?>
		<?php echo $form->error($model,'id_pegawai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_pegawai'); ?>
		<?php echo $form->textField($model,'nama_pegawai',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'nama_pegawai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_pegawai'); ?>
		<?php echo $form->textField($model,'alamat_pegawai',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'alamat_pegawai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_telepon'); ?>
		<?php echo $form->textField($model,'no_telepon'); ?>
		<?php echo $form->error($model,'no_telepon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jabatan'); ?>
		<?php echo $form->dropDownList($model, 'jabatan', $model->getTypeOptions()); ?>
		<?php echo $form->error($model,'jabatan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
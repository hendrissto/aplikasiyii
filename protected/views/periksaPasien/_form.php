<?php
/* @var $this PeriksaPasienController */
/* @var $model PeriksaPasien */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'periksa-pasien-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_periksa'); ?>
		<?php echo $form->textField($model,'id_periksa'); ?>
		<?php echo $form->error($model,'id_periksa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_rm'); ?>
		<?php echo $form->textField($model,'no_rm'); ?>
		<?php echo $form->error($model,'no_rm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tindakan'); ?>
		<?php echo $form->textField($model,'id_tindakan'); ?>
		<?php echo $form->error($model,'id_tindakan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_reseptur'); ?>
		<?php echo $form->textField($model,'id_reseptur'); ?>
		<?php echo $form->error($model,'id_reseptur'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
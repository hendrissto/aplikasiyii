<?php
/* @var $this JualResepController */
/* @var $model JualResep */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jual-resep-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_jual_resep'); ?>
		<?php echo $form->textField($model,'id_jual_resep'); ?>
		<?php echo $form->error($model,'id_jual_resep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_periksa'); ?>
		<?php echo $form->textField($model,'id_periksa'); ?>
		<?php echo $form->error($model,'id_periksa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
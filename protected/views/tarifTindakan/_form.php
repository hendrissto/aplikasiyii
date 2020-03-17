<?php
/* @var $this TarifTindakanController */
/* @var $model TarifTindakan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tarif-tindakan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tarif_tindakan'); ?>
		<?php echo $form->textField($model,'id_tarif_tindakan'); ?>
		<?php echo $form->error($model,'id_tarif_tindakan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tindakan'); ?>
		<?php echo $form->dropDownList($model, 'id_tindakan', $model->getTypeOptions()); ?>
		<?php echo $form->error($model,'id_tindakan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harga'); ?>
		<?php echo $form->textField($model,'harga'); ?>
		<?php echo $form->error($model,'harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
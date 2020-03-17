<?php
/* @var $this TagihanController */
/* @var $model Tagihan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tagihan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'no_tagihan')->textInput(['value'=>$team->name]); ?>
		<?php echo $form->textField($model,'no_tagihan'); ?>
		<?php echo $form->error($model,'no_tagihan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_tagihan'); ?>
		<?php echo $form->textField($model,'tgl_tagihan',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'tgl_tagihan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_tagihan'); ?>
		<?php echo $form->textField($model,'total_tagihan'); ?>
		<?php echo $form->error($model,'total_tagihan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
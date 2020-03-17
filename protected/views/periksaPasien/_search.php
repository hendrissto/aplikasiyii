<?php
/* @var $this PeriksaPasienController */
/* @var $model PeriksaPasien */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_periksa'); ?>
		<?php echo $form->textField($model,'id_periksa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_rm'); ?>
		<?php echo $form->textField($model,'no_rm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tindakan'); ?>
		<?php echo $form->textField($model,'id_tindakan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_reseptur'); ?>
		<?php echo $form->textField($model,'id_reseptur'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
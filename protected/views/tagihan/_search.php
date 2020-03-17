<?php
/* @var $this TagihanController */
/* @var $model Tagihan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'no_tagihan'); ?>
		<?php echo $form->textField($model,'no_tagihan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_tagihan'); ?>
		<?php echo $form->textField($model,'tgl_tagihan',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_tagihan'); ?>
		<?php echo $form->textField($model,'total_tagihan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
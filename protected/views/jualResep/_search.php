<?php
/* @var $this JualResepController */
/* @var $model JualResep */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_jual_resep'); ?>
		<?php echo $form->textField($model,'id_jual_resep'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_periksa'); ?>
		<?php echo $form->textField($model,'id_periksa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
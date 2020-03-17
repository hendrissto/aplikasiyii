<?php
/* @var $this ResepController */
/* @var $model Resep */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resep-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
        <?php echo $form->labelEx($model,'tgl_resep'); ?>
        <?php //echo $form->textField($model,'tgl_resep');
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'=>'Resep[tgl_resep]',
            'value'=>$model->tgl_resep,
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'yy-mm-dd',
            ),
        ));

        ?>
        <?php echo $form->error($model,'tgl_resep'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_obat'); ?>
		<?php echo $form->dropDownList($model, 'id_obat', $model->getTypeOptions()); ?>
		<?php echo $form->error($model,'id_obat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah'); ?>
		<?php echo $form->textField($model,'jumlah'); ?>
		<?php echo $form->error($model,'jumlah'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
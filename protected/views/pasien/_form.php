<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
?>

<div style="margin-left: 10px;"class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pasien-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'no_identitas'); ?>
		<?php echo $form->textField($model,'no_identitas'); ?>
		<?php echo $form->error($model,'no_identitas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_pasien'); ?>
		<?php echo $form->textField($model,'nama_pasien',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nama_pasien'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'jenis_kelamin'); ?>
		<?php echo $form->dropDownList($model, 'jenis_kelamin', $model->getTypeOptions()); ?>
		<?php echo $form->error($model,'jenis_kelamin'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'alamat_pasien'); ?>
		<?php echo $form->textField($model,'alamat_pasien',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'alamat_pasien'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_telp'); ?>
		<?php echo $form->textField($model,'no_telp'); ?>
		<?php echo $form->error($model,'no_telp'); ?>
	</div>

	<div class=”row”>
        <?php echo $form->labelEx($model,'tgl_lahir'); ?>
        <?php //echo $form->textField($model,'tgl_lahir');
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'=>'Pasien[tgl_lahir]',
            'value'=>$model->tgl_lahir,
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'yy-mm-dd',
            ),
        ));

        ?>
        <?php echo $form->error($model,'tgl_lahir'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
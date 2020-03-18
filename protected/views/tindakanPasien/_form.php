<?php
/* @var $this TindakanPasienController */
/* @var $model TindakanPasien */
/* @var $form CActiveForm */
?>

<div style="margin-left:10px;" class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tindakan-pasien-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class=”row”>
        <?php echo $form->labelEx($model,'tanggal'); ?>
        <?php //echo $form->textField($model,'tanggal');
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'=>'TindakanPasien[tanggal]',
            'value'=>$model->tanggal,
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'yy-mm-dd',
            ),
        ));

        ?>
        <?php echo $form->error($model,'tanggal'); ?>
    </div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'id_tindakan'); ?>
		<?php echo $form->dropDownList($model, 'id_tindakan', $model->getTypeOptions()); ?>
		<?php echo $form->error($model,'id_tindakan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
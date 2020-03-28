<?php
/* @var $this PemeriksaanController */
/* @var $model Pemeriksaan */
/* @var $form CActiveForm */
?>

<div class="data">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pemeriksaan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	
<div>
	<div width="200px;">
		<?php echo $form->labelEx($model,'keluhan'); ?>
		<?php echo $form->textArea($model,'keluhan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keluhan'); ?>
	</div>
	<div width="100px;">
		<?php echo $form->labelEx($model,'riwayat_keluarga'); ?>
		<?php echo $form->textArea($model,'riwayat_keluarga',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'riwayat_keluarga'); ?>
	</div>
</div>
	<div>
		<?php echo $form->labelEx($model,'riwayat_obat'); ?>
		<?php echo $form->textArea($model,'riwayat_obat',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'riwayat_obat'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'periksa_fisik'); ?>
		<?php echo $form->textArea($model,'periksa_fisik',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'periksa_fisik'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'tekanan_darah'); ?>
		<?php echo $form->textArea($model,'tekanan_darah',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tekanan_darah'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'suhu_tubuh'); ?>
		<?php echo $form->textArea($model,'suhu_tubuh',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'suhu_tubuh'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'detak_jantung'); ?>
		<?php echo $form->textArea($model,'detak_jantung',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detak_jantung'); ?>
	</div>
	<div>
        <?php echo $form->labelEx($model,'tanggal_pemeriksaan'); ?>
        <?php //echo $form->textField($model,'tanggal_pemeriksaan');
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'=>'Pemeriksaan[tanggal_pemeriksaan]',
            'value'=>$model->tanggal_pemeriksaan,
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'yy-mm-dd',
            ),
        ));

        ?>
        <?php echo $form->error($model,'tanggal_pemeriksaan'); ?>
	</div>
	<div>
		<?php echo $form->labelEx($model,'dokter'); ?>
		<?php echo $form->dropDownList($model, 'dokter', $model->getTypeOptions()); ?>
		<?php echo $form->error($model,'dokter'); ?>
	</div>
	

	<div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<style>
  
    .data {
    -webkit-column-width: 400px;
    -moz-column-width: 400px;
	column-width: 400px;
	margin-left:20px;
  }
  
</style>
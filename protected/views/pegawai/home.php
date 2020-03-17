
<?php
	foreach(Yii::app()->user->getFlashes() as $key => $val)
	{
		echo "
			<div class = '$key' id = '$key'>$val</div>
		";
	}
?>


<div>
	<?php echo CHtml::link('Tambah Data' , array('create')); ?>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nama_pegawai',
		
	),
)); ?>

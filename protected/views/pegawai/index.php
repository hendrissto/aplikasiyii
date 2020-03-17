
<?php
	foreach(Yii::app()->user->getFlashes() as $key => $val)
	{
		echo "
			<div class = '$key' id = '$key'>$val</div>
		";
	}
?>

<?php
/* @var $this PasienController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pegawai',
);

$this->menu=array(
	array('label'=>'Create Pegawai', 'url'=>array('create')),
	array('label'=>'Manage Pegawai', 'url'=>array('admin')),
);
?>



<a href="index.php?r=pegawai/create"><img style="width:50px; height:50px;" src="images/tambah.png"></img></a>
<br>
<h>Tambah</h>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tes-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		'id_pegawai',
		'nama_pegawai',
		'alamat_pegawai',
		'no_telepon',
		'username',
		'jabatan',
	),
)); ?>

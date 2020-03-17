<?php
/* @var $this ObatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Obats',
);

$this->menu=array(
	array('label'=>'Create Obat', 'url'=>array('create')),
	array('label'=>'Manage Obat', 'url'=>array('admin')),
);
?>

<h1>Obat</h1>
<a href="index.php?r=obat/create"><img style="width:50px; height:50px;" src="images/tambah.png"></img></a>
<br>
<h>Tambah</h>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tes-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_obat',
		'nama_obat',
		'harga',
		
	),
)); ?>

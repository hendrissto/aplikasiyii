<?php
/* @var $this TindakanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tindakans',
);

$this->menu=array(
	array('label'=>'Create Tindakan', 'url'=>array('create')),
	array('label'=>'Manage Tindakan', 'url'=>array('admin')),
);
?>

<h1>Tindakans</h1>
<a href="index.php?r=tindakan/create"><img style="width:50px; height:50px;" src="images/tambah.png"></img></a>
<br>
<h>Tambah</h>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tes-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_tindakan',
		'nama_tindakan',
		'harga',
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{hapus}',
			'buttons' => array(
				'update' => array(
					'url' => 'inc::root_url("/update/oid/id_tindakan")'
				),
			'hapus' => array(
				'url' => 'inc::root_url("/delete/oid/")',
				'imageUrl' => Yii::app()->baseUrl."/images/delete.png",
				'options' => array('onclick' => 'return confirm("Anda yakin menghapus data ini ?")')
			)
		)
		)
		
	),
)); ?>



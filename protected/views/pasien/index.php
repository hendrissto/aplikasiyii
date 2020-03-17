<?php
/* @var $this PasienController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pasiens',
);

$this->menu=array(
	array('label'=>'Create Pasien', 'url'=>array('create')),
	array('label'=>'Manage Pasien', 'url'=>array('admin')),
);
?>

<h1>Pasien</h1>
<div>
<a href="index.php?r=pasien/create"><img style="width:50px; height:50px;" src="images/tambah.png"></img></a>
<br>
<h>Tambah</h>
</div>
<?php
	foreach(Yii::app()->user->getFlashes() as $key => $val)
	{
		echo "
            <div style='border:1px; background-color: #1E90FF; color: white; font-size:25px; padding-top: 5px;
            padding-bottom: 5px;' 
            class = '$key' id = '$key'>$val</div>
		";
	}
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'tes-grid',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
			'no_identitas',
			'nama_pasien',
			'tgl_lahir',
			'alamat_pasien',
			'no_telp',
			array(
				'class'=>'CButtonColumn',
				'template' => '{update}{hapus}',
				'buttons' => array(
					'update' => array(
						'url' => 'inc::root_url("/update/oid/$data->no_identitas")'
					),
				'hapus' => array(
					'url' => 'inc::root_url("/delete/oid/$data->no_identitas/token/".inc::enkrip($data->no_identitas)."")',
					'imageUrl' => Yii::app()->baseUrl."/images/delete.png",
					'options' => array('onclick' => 'return confirm("Anda yakin menghapus data ini ?")')
				)
			)
		),
		),
)); ?>



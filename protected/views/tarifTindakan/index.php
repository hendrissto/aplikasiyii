<?php
/* @var $this TarifTindakanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tarif Tindakans',
);

$this->menu=array(
	array('label'=>'Create TarifTindakan', 'url'=>array('create')),
	array('label'=>'Manage TarifTindakan', 'url'=>array('admin')),
);
?>

<h1>Tarif Tindakan</h1>
<?php echo CHtml::link('Tambah Data' , array('create')); ?>


<table class="table table-bordered table-striped">
    <thead>
        <tr align="center">
            <td>No RM</td>
            <td>Nama Pasien</td>
            <td>Bayar</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataProvider as $team): ?>
            <tr>
                <td><?= $team['id_tindakan'] ?></td>
                <td><?= $team['nama_tindakan'] ?></td>
				<td><?= $team['harga'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
/* @var $this ResepController */
/* @var $model Resep */

$this->breadcrumbs=array(
	'Reseps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Resep', 'url'=>array('index')),
	array('label'=>'Manage Resep', 'url'=>array('admin')),
);
?>

<h1>Create Resep</h1>
<table>
<tr>

    <td>Nama Pasien: <?php echo $pasien['nama_pasien'];?><td>
    <td style="width: 100px;"></td>
    <td>Alamat: <?php echo $pasien['alamat_pasien'];?><td>
</tr>
<tr>

    <td>No RM: <?php echo $pasien['no_rm'];?><td>
    <td style="width: 100px;"></td>
    <td>No Telepon: <?php echo $pasien['no_telp'];?><td>
</tr>
<tr>

    <td>Tanggal Lahir: <?php echo $pasien['tgl_lahir'];?><td>
</tr>
</table>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
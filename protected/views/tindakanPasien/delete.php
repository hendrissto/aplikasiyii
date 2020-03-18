<?php
/* @var $this TindakanPasienController */
/* @var $model TindakanPasien */

$this->breadcrumbs=array(
	'Tindakan Pasiens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TindakanPasien', 'url'=>array('index')),
	array('label'=>'Manage TindakanPasien', 'url'=>array('admin')),
);
?>

<h1>Create Tindakan Pasien</h1>
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
<h1>Tindakan</h1>
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

<table class="table table-bordered">
<thead>
<tr>
    <td style="width:100px;">Tanggal</td>
    <td style="width:150px;">Nama Tindakan</td>
    <td style="width:10px;">Harga</td>
    <td style="width:10px;">Aksi</td>
</tr>
</thead>


<?php $total_harga=0; foreach ($tindakan as $ml) : ?>
            <tr>
                <td><?php echo $ml['tanggal']; ?></td>
                <td><?php echo $ml['nama_tindakan']; ?></td>
                <td><?php echo $ml['harga']; ?></td>
                <td><?php echo CHtml::link('<img style="width:20px; height:20px;" src="images/delete.png"></img>' , array('/tindakanPasien/delete/oid/'.$ml['id_tindakan_pasien'])); ?></td>
                <?php $total_harga=$total_harga + $ml['harga'];?>
            </tr>
            <?php endforeach; ?>
<tr>
    <td></td>
    <td>Total</td>
    <td><?php echo $total_harga;?></td>
<tbody>
<tr>

</table>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
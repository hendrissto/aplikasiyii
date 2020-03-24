<?php
/* @var $this PasienController */
/* @var $dataProvider CActiveDataProvider */

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
<table class="table table-bordered">
<thead>
<tr>
	<td style="width:10px;">No Identitas</td>
    <td style="width:10px;">No RM</td>
    <td style="width:10px;">Nama Pasien</td>
	<td style="width:10px;">Jenis Kelamin</td>
    <td style="width:10px;">Alamat Pasien</td>
	<td style="width:10px;">No Telepon</td>
	<td style="width:10px;">Tanggal Lahir</td>
	<td style="width:10px;">Aksi</td>
</tr>
</thead>


<?php $total_harga=0; foreach ($user as $ml) : ?>
            <tr>
				<td><?php echo $ml['no_identitas']; ?></td>
				<td><?php echo $ml['no_rm']; ?></td>
                <td><?php echo $ml['nama_pasien']; ?></td>
				<td><?php echo $ml['jenis_kelamin']; ?></td>
				<td><?php echo $ml['alamat_pasien']; ?></td>
                <td><?php echo $ml['no_telp']; ?></td>
				<td><?php echo $ml['tgl_lahir']; ?></td>
                <td><?php  echo CHtml::link('<img style="width:15px; height:15px;" src="images/delete.png"></img>', '#', array('confirm' => 'Are you sure?', 'submit'=>array('delete','id'=>$ml['no_identitas']))); ?></td>
                
            </tr>
            <?php endforeach; ?>
<tr>
<tbody>
<tr>

</table>


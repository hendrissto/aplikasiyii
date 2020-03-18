
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
<table class="table table-bordered">
<thead>
<tr>
	<td class="judul">ID Pegawai</td>
    <td>Nama Pegawai</td>
    <td>Alamat</td>
	<td>No Telepon</td>
	<td>Username</td>
	<td>Jabatan</td>
	<td>Aksi</td>
</tr>
</thead>
<tbody>
<?php $total_harga_r=0; $subtotal=0;foreach ($pegawai as $model) : ?>
            <tr>
				<td><?php echo $model['id_pegawai']; ?></td>
                <td><?php echo $model['nama_pegawai']; ?></td>
                <td><?php echo $model['alamat_pegawai']; ?></td>
				<td><?php echo $model['no_telepon']; ?></td>
				<td><?php echo $model['username']; ?></td>
				<td><?php echo $model['jabatan']; ?></td>
                <td><?php  echo CHtml::link('<img style="width:15px; height:15px;" src="images/delete.png"></img>', '#', array('confirm' => 'Are you sure?', 'submit'=>array('delete','id'=>$model['id_pegawai']))); ?></td>
                
            </tr>
            <?php endforeach; ?>
<tr>
    
<tbody>
</table>
<style>
.judul{

}
</style>

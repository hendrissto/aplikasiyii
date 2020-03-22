<?php
/* @var $this ObatController */
/* @var $dataProvider CActiveDataProvider */



$this->menu=array(
	array('label'=>'Create Obat', 'url'=>array('create')),
	array('label'=>'Manage Obat', 'url'=>array('admin')),
);
?>

<h1>Obat</h1>
<a href="index.php?r=obat/create"><img style="width:50px; height:50px;" src="images/tambah.png"></img></a>
<br>
<h>Tambah</h>
<table class="table table-bordered">
<thead>
<tr>
	<td>ID Obat</td>
    <td>Nama Obat</td>
    <td>Harga</td>
	<td>Aksi</td>
</tr>
</thead>
<tbody>
<?php $total_harga_r=0; $subtotal=0;foreach ($obat as $model) : ?>
            <tr>
				<td><?php echo $model['id_obat']; ?></td>
                <td><?php echo $model['nama_obat']; ?></td>
                <td><?php echo $model['harga']; ?></td>
                <td><?php  echo CHtml::link('<img style="width:15px; height:15px;" src="images/delete.png"></img>', '#', array('confirm' => 'Are you sure?', 'submit'=>array('delete','id'=>$model['id_obat']))); ?></td>
                
            </tr>
            <?php endforeach; ?>
<tr>
    
<tbody>
</table>

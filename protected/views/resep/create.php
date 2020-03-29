<?php
/* @var $this ResepController */
/* @var $model Resep */



$this->menu=array(
	array('label'=>'List Resep', 'url'=>array('index')),
	array('label'=>'Manage Resep', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('header', array('pasien'=>$pasien)); ?>
<table class="table table-bordered">
<thead>
<tr>
    <td style="width:100px;">Tanggal</td>
    <td style="width:150px;">Nama Obat</td>
    <td style="width:10px;">Jumlah</td>
    <td style="width:10px;">Aksi</td>
</tr>
</thead>


<?php $total_harga=0; foreach ($res as $ml) : ?>
            <tr>
                <td><?php echo $ml['tgl_resep']; ?></td>
                <td><?php echo $ml['nama_obat']; ?></td>
                <td><?php echo $ml['jumlah']; ?></td>
                <td><?php  echo CHtml::link('<img style="width:15px; height:15px;" src="images/delete.png"></img>', '#', array('confirm' => 'Are you sure?', 'submit'=>array('delete','id'=>$ml['kode_resep'], 'data'=>$ml['id_periksa']))); ?></td>
                <?php $total_harga=$total_harga + $ml['harga'];?>
            </tr>
            <?php endforeach; ?>
<tr>
<tbody>
<tr>

</table>
<h1> Resep</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
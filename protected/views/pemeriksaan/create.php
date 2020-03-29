<?php
/* @var $this PemeriksaanController */
/* @var $model Pemeriksaan */



$this->menu=array(
	array('label'=>'List Pemeriksaan', 'url'=>array('index')),
	array('label'=>'Manage Pemeriksaan', 'url'=>array('admin')),
);
?>
<?php $this->renderPartial('header', array('pasien'=>$pasien)); ?>
<h1>Riwayat Pemeriksaan</h1>
<table class="table table-bordered">
<thead>
<tr>
	<td style="width:150px;">Tanggal</td>
	<td style="width:150px;">Dokter</td>
    <td style="width:10px;">Aksi</td>
</tr>
</thead>


<?php foreach ($pemer as $ml) : ?>
            <tr>
                <td><?php echo $ml['tanggal_pemeriksaan']; ?></td>
				<td><?php echo $ml['dokter']; ?></td>
				
                <td>
				<?php  echo CHtml::link('<img style="width:15px; height:15px;" src="images/edit.png"></img>', '#', array( 'submit'=>array('update','id'=>$ml['id_pemeriksaan'],'data'=>$ml['id_periksa']))); ?> | 
<?php echo CHtml::link('<img style="width:15px; height:15px;" src="images/delete.png"></img>', '#', array('confirm' => 'Are you sure?', 'submit'=>array('delete','id'=>$ml['id_pemeriksaan'],'data'=>$ml['id_periksa']))); ?></td>
                
            </tr>
            <?php endforeach; ?>
<tr>
<tbody>
<tr>

</table>
<h1>Create Pemeriksaan</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>





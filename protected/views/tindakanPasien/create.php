<?php
/* @var $this TindakanPasienController */
/* @var $model TindakanPasien */



$this->menu=array(
	array('label'=>'List TindakanPasien', 'url'=>array('index')),
	array('label'=>'Manage TindakanPasien', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('header', array('pasien'=>$pasien)); ?>
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
                <td><?php  echo CHtml::link('<img style="width:15px; height:15px;" src="images/delete.png"></img>', '#', array('confirm' => 'Are you sure?', 'submit'=>array('delete','id'=>$ml['id_tindakan_pasien'],'data'=>$ml['id_periksa']))); ?></td>
                <?php $total_harga=$total_harga + $ml['harga'];?>
            </tr>
            <?php endforeach; ?>
<tr>
<tbody>
<tr>

</table>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
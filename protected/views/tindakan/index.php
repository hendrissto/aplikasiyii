<?php
/* @var $this TindakanController */
/* @var $dataProvider CActiveDataProvider */



$this->menu=array(
	array('label'=>'Create Tindakan', 'url'=>array('create')),
	array('label'=>'Manage Tindakan', 'url'=>array('admin')),
);
?>

<h1>Tindakan</h1>
<a href="index.php?r=tindakan/create"><img style="width:50px; height:50px;" src="images/tambah.png"></img></a>
<br>
<h>Tambah</h>
</table>
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
	<td style="width:10px;">ID Tindakan</td>
    <td style="width:150px;">Nama Tindakan</td>
    <td style="width:10px;">Harga</td>
    <td style="width:10px;">Aksi</td>
</tr>
</thead>


<?php $total_harga=0; foreach ($model as $ml) : ?>
            <tr>
				<td><?php echo $ml['id_tindakan']; ?></td>
                <td><?php echo $ml['nama_tindakan']; ?></td>
                <td><?php echo $ml['harga']; ?></td>
                <td><?php  echo CHtml::link('<img style="width:15px; height:15px;" src="images/delete.png"></img>', '#', array('confirm' => 'Are you sure?', 'submit'=>array('delete','id'=>$ml['id_tindakan']))); ?></td>
                
            </tr>
            <?php endforeach; ?>
<tr>
<tbody>
<tr>

</table>



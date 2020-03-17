<?php
/* @var $this TagihanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tagihans',
);

$this->menu=array(
	array('label'=>'Create Tagihan', 'url'=>array('create')),
	array('label'=>'Manage Tagihan', 'url'=>array('admin')),
);
?>
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


<h1>Tagihans</h1>

<html>
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
                <td><?= $team['no_rm'] ?></td>
                <td><?= $team['nama_pasien'] ?></td>
                <td><?php if ($team['status'] == "lunas"){
                    echo CHtml::link('<img style="width:50px; height:50px;" src="images/cetak.png"></img>' , array('/tagihan/cetak/oid/'.$team['id_periksa']));
                }else{
                    echo CHtml::link('<img style="width:50px; height:50px;" src="images/bayar.png"></img>' , array('/tagihan/create/oid/'.$team['id_periksa']));
                }
                     ?></td>       
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
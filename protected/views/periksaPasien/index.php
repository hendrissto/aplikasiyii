<?php
/* @var $this PeriksaPasienController */
/* @var $dataProvider CActiveDataProvider */



$this->menu=array(
	array('label'=>'Create PeriksaPasien', 'url'=>array('create')),
	array('label'=>'Manage PeriksaPasien', 'url'=>array('admin')),
);
?>
<html>
<h1>Periksa Pasiens</h1>
<table class="table table-bordered table-striped">
    <thead>
        <tr align="center">
            <td>No RM</td>
            <td>Nama Pasien</td>
            <td>Tgl Lahir</td>
            <td>Status Periksa</td>
            <td>Periksa</td>
            <td>Hasil</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataProvider as $team): ?>
            <tr>
                <td><?= $team['no_rm'] ?></td>
                <td><?= $team['nama_pasien'] ?></td>
                <td><?= $team['tgl_lahir'] ?></td>
                <td><?php if ($team['status'] == "belum periksa"){?>
                        <div class="belum"><p class="tulisan">Belum Periksa</p></div>
                <?php }else if($team['status'] == "sudah pulang"){?>
                        <div class="pulang"><p class="tulisan">Sudah Pulang</p></div>
                 <?php } else{ ?>
                        <div class="sudah"><p class="tulisan">Sudah Periksa</p></div>
                 <?php } ?>
                 </td>
                 <td><?php echo CHtml::link('<img style="width:50px; height:50px;" src="images/periksa.png"></img>' , array('/pemeriksaan/create/oid/'.$team['id_periksa'])); ?></td>
                <td><?php echo CHtml::link('<img style="width:50px; height:50px;" src="images/hasil.jpg"></img>' , array('/periksaPasien/hasil/oid/'.$team['id_periksa'])); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<style>
.belum {
    width: 150px;
    height: 40px;
    border: 4px solid black;
    border-radius: 10px;
    background-color: red;
    
}
.sudah {
    width: 150px;
    height: 40px;
    border: 4px solid black;
    border-radius: 10px;
    background-color: green;   
}

.pulang {
    width: 150px;
    height: 40px;
    border: 4px solid black;
    border-radius: 10px;
    background-color: blue;
    
}

.tulisan{
    text-align: center;
    padding-top: 9px;
    color: white;
}
</style>

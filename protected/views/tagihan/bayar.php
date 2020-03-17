<?php
/* @var $this TagihanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tagihans'=>array('bayar'),
	'Bayar',
);

$this->menu=array(
	array('label'=>'Create Tagihan', 'url'=>array('bayar')),
	array('label'=>'Manage Tagihan', 'url'=>array('admin')),
);
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
                <td><?= $team['no_tagihan'] ?></td>
                <td><?= $team['nama_pasien'] ?></td>      
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
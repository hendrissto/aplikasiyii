<?php
/* @var $this TagihanController */
/* @var $model Tagihan */


    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }



?>
<?php $this->renderPartial('menu_periksapasien'); ?>
<div id="resultprint">
<h1 align="center">Hasil Pemeriksaan</h1>

<html>
<table>
<tr>

    <td>Nama Pasien: <?php echo $pasien['nama_pasien'];?><td>
    <td style="width: 300px;"></td>
    <td>Alamat: <?php echo $pasien['alamat_pasien'];?><td>
</tr>
<tr>
    <td>No RM: <?php echo $pasien['no_rm'];?><td>
    <td style="width: 300px;"></td>
    <td>No Telepon: <?php echo $pasien['no_telp'];?><td>
</tr>
<tr>
    <td>Tanggal Lahir: <?php echo $pasien['tgl_lahir'];?><td>
</tr>
</table>

<h1>Pemeriksaan</h1>
<table>
<tr>
    
    <td>Keluhan : <?php echo $periksa['keluhan'];?><td>
    <td style="width: 300px;"></td>
    <td>Riwayat Keluarga: <?php echo $periksa['riwayat_keluarga'];?><td>
</tr>
<tr>
    <td>Riwayat Obat: <?php echo $periksa['riwayat_obat'];?><td>
    <td style="width: 300px;"></td>
    <td>Periksa Fisik: <?php echo $periksa['periksa_fisik'];?><td>
</tr>
<tr>
    <td>Tekanan Darah: <?php echo $periksa['tekanan_darah'];?><td>
    <td style="width: 300px;"></td>
    <td>Suhu Tubuh: <?php echo $periksa['suhu_tubuh'];?><td>
</tr>
<tr>
    <td>Detak Jantung: <?php echo $periksa['detak_jantung'];?><td>
</tr>
</table>

<h1>Tindakan</h1>
<table class="table table-bordered">
<thead>
<tr>
    <td style="width:100px;">Tanggal</td>
    <td style="width:150px;">Nama Tindakan</td>
    <td style="width:10px;">Harga</td>
</tr>
</thead>


<?php $total_harga=0; foreach ($tindakan as $model) : ?>
            <tr>
                <td><?php echo $model['tanggal']; ?></td>
                <td><?php echo $model['nama_tindakan']; ?></td>
                <td><?php echo $model['harga']; ?></td>
                <?php $total_harga=$total_harga + $model['harga'];?>
            </tr>
            <?php endforeach; ?>
<tr>
    <td></td>
    <td>Total</td>
    <td><?php echo $total_harga;?></td>
<tbody>
<tr>

</table>

<h1>Resep</h1>
<table class="table table-bordered">
<thead>
<tr>
    <td>Tanggal</td>
    <td>Nama Obat</td>
    <td>Jumlah</td>
    <td>Harga</td>
    <td>Subtotal</td>
</tr>
</thead>
<tbody>
<?php $total_harga_r=0; $subtotal=0;foreach ($resep as $model) : ?>
            <tr>
                <td><?php echo $model['tgl_resep']; ?></td>
                <td><?php echo $model['nama_obat']; ?></td>
                <td><?php echo $model['jumlah']; ?></td>
                <td><?php echo $model['harga']; ?></td>
                <?php $subtotal=$model['harga'] * $model['jumlah'];?>
                <?php $total_harga_r=$total_harga_r + $subtotal;?>
                <td><?php echo $subtotal;?></td>
            </tr>
            <?php endforeach; ?>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td>Total</td>
    <td><?php echo $total_harga_r;?></td>
<tbody>
</table>

</div>
<div>
        <?php
$this->widget('ext.mPrint.mPrint', array(
    'title' => 'Hasil Pemeriksaan',        //the title of the document. Defaults to the HTML title
    'tooltip' => 'User Result',    //tooltip message of the print icon. Defaults to 'print'
    'text' => 'Print Results', //text which will appear beside the print icon. Defaults to NULL
    'element' => '#resultprint',      //the element to be printed.
    'exceptions' => array(     //the element/s which will be ignored
        '.summary',
        '.search-form'
    ),
    'publishCss' => true,       //publish the CSS for the whole page?
    'id' => 'resultprintid',                   
));
?>



</tbody>

<?php $this->renderPartial('footer_pp'); ?>